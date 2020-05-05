<?php
namespace LaminasBugsnag;

use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $application        =   $e->getTarget();
        $eventManager       =   $application->getEventManager();
        $services           =   $application->getServiceManager();

        // Check if the module is enabled
        if(!$services->get('LaminasBugsnag\Options\BugsnagOptions')->getEnabled())
            return;

        $service            =   $services->get('BugsnagServiceException');
        // Register the PHP exception and error handlers
        $service->setupErrorHandlers();

        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, function ($event) use ($services, $service) {
            $exception      =   $event->getParam('exception');
            // No exception, stop the script
            if (!$exception) return;

            $service->sendException($exception);
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
