<?php

use UthandoSessionManager\Controller\SessionManagerController;

return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                SessionManagerController::class => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                SessionManagerController::class,
            ],
        ],
    ],
];
