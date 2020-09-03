<?php
namespace LaminasBugsnag;

use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use \Bugsnag\Handler;
use \Bugsnag\Client;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getTarget();
        $eventManager= $application->getEventManager();
        $serviceManager = $application->getServiceManager();
        $bugsnagConfig = $serviceManager->get('LaminasBugsnag\Options\BugsnagOptions');
        // Check if the module is enabled
        if(!$bugsnagConfig->getEnabled())
            return;

        $bugsnagClient = Client::make($bugsnagConfig->getApiKey());
        $bugsnagClient->startSession();

        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, function ($event) use ($bugsnagClient) {
            $exception = $event->getParam('exception');
                // No exception, stop the script
                if (!$exception) return;
                // Reports unhandled exceptions
                Handler::registerWithPrevious($bugsnagClient);
                // Reports handled exceptions
                $bugsnagClient->notifyException($exception);
        });
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Laminas\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'BugsnagServiceException' =>  function($sm) {
                    $options = $sm->get('LaminasBugsnag\Options\BugsnagOptions');
                    $service = new \LaminasBugsnag\Service\BugsnagService($options);
                    return $service;
                },
            ],
        ];
    }
}
