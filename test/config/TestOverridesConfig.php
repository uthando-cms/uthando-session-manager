<?php
return [
    'modules' => [
        'Application',
        'UthandoCommon',
        'UthandoSessionManager',
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './devmodules',
            './vendor',
        ],
        'config_glob_paths' => [
            __DIR__ . '/autoload/{,*.}{global,local}.php',
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'ModuleRouteListener' => 'Zend\Mvc\ModuleRouteListener',
        ],
        'factories' => [
            'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ],
    ],
];