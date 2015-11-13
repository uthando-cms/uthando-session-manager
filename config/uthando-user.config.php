<?php

return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                'UthandoSessionManager\Controller\SessionManager' => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                'UthandoSessionManager\Controller\SessionManager',
            ],
        ],
    ],
];
