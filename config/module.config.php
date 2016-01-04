<?php

return [
    'controllers' => [
        'invokables' => [
            'UthandoSessionManager\Controller\SessionManager' => 'UthandoSessionManager\Controller\SessionManagerController',
        ],
    ],
    'controller_plugins' => [
        'invokables' => [
            'SessionContainer' => 'UthandoSessionManager\Controller\Plugin\SessionContainer',
        ],
    ],
    'hydrators' => [
        'invokables' => [
            'UthandoSessionManagerSession' => 'UthandoSessionManager\Hydrator\Session',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'UthandoSessionManager\SessionManager'		=> 'UthandoSessionManager\Service\Factory\SessionManagerFactory',
            'UthandoSessionManager\SessionSaveHandler'	=> 'UthandoSessionManager\Service\Factory\SessionSaveHandlerFactory',
        ],
    ],
    'uthando_mappers' => [
        'invokables' => [
            'UthandoSessionManagerSession' => 'UthandoSessionManager\Mapper\Session',
        ],
    ],
    'uthando_models' => [
        'invokables' => [
            'UthandoSessionManagerSession' => 'UthandoSessionManager\Model\Session',
        ],
    ],
    'uthando_services' => [
        'invokables' => [
            'UthandoSessionManagerSession'	=> 'UthandoSessionManager\Service\SessionManager',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'DecodeSession' => 'UthandoSessionManager\View\DecodeSession',
        ],
    ],
    'view_manager' => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
