<?php

use UthandoSessionManager\Controller\SessionManagerController;
use UthandoSessionManager\Controller\SettingsController;

return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                SessionManagerController::class => ['action' => 'all'],
                                SettingsController::class       => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                SessionManagerController::class,
                SettingsController::class,
            ],
        ],
    ],
];
