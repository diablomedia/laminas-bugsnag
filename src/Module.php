<?php

namespace LaminasBugsnag;

use Laminas\Mvc\MvcEvent;
use Laminas\Mvc\Application;

class Module
{
    public function onBootstrap(MvcEvent $e): void
    {
        /** @var Application $application */
        $application = $e->getTarget();
        $eventManager= $application->getEventManager();
        $serviceManager = $application->getServiceManager();


        /** @var Service\BugsnagService $bugsnagService */
        $bugsnagService = $serviceManager->get('BugsnagServiceException');
        $bugsnagClient = $bugsnagService->getClient();

        if ($bugsnagClient) {
            $bugsnagClient->startSession();

            $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, function ($event) use ($bugsnagClient) {
                $exception = $event->getParam('exception');

                // No exception, stop the script
                if (!$exception) {
                    return;
                }

                // Reports handled exceptions
                $bugsnagClient->notifyException($exception);
            });
        }
    }

    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig(): array
    {
        return [
            'factories' => [
                'BugsnagServiceException' =>  function ($sm) {
                    $options = $sm->get('LaminasBugsnag\Options\BugsnagOptions');
                    $service = new \LaminasBugsnag\Service\BugsnagService($options);

                    return $service;
                },
            ],
        ];
    }
}
