<?php
return [
    'controllers' => [
        'invokables' => [
            'LaminasBugsnag\Service\Bugsnag' => 'LaminasBugsnag\Service\BugsnagService',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'LaminasBugsnag\Options\BugsnagOptions' => 'LaminasBugsnag\Options\BugsnagOptionsFactory',
        ],
    ],
];
