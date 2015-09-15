<?php
return [
    'modules' => [
        'Application',
        'UthandoAdmin',
        'UthandoSessionManager',
        'UthandoCommon',
        'UthandoThemeManager',
        'UthandoNavigation',
        'UthandoUser',
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './devmodules',
            './vendor',
        ],
        'config_glob_paths' => [
            __DIR__ . '/autoload/uthando-theme-manager.local.php',
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