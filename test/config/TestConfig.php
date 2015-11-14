<?php
return [
    'modules' => [
        'Application',
        'UthandoCommon',
        'UthandoAdmin',
        'UthandoSessionManager',
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
