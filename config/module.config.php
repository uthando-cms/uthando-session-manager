<?php

use UthandoSessionManager\Controller\Plugin\SessionContainer;
use UthandoSessionManager\Controller\SessionManagerConsole;
use UthandoSessionManager\Controller\SessionManagerController;
use UthandoSessionManager\Service\Factory\SessionManagerFactory;
use UthandoSessionManager\Service\Factory\SessionSaveHandlerFactory;
use UthandoSessionManager\Service\SessionManagerService;
use UthandoSessionManager\View\DecodeSession;

return [
    'controllers' => [
        'invokables' => [
            SessionManagerConsole::class => SessionManagerConsole::class,
            SessionManagerController::class => SessionManagerController::class,
        ],
    ],
    'controller_plugins' => [
        'aliases' => [
            'sessionContainer' => SessionContainer::class
        ],
        'invokables' => [
            SessionContainer::class => SessionContainer::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            SessionManagerFactory::class => SessionManagerFactory::class,
            SessionSaveHandlerFactory::class => SessionSaveHandlerFactory::class,
        ],
    ],
    'uthando_services' => [
        'invokables' => [
            SessionManagerService::class => SessionManagerService::class
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'DecodeSession' => DecodeSession::class,
        ],
        'invokables' => [
            DecodeSession::class => DecodeSession::class
        ],
    ],
    'view_manager' => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
