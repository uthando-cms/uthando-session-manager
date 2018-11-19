<?php

use UthandoSessionManager\Controller\SessionManagerConsole;
use UthandoSessionManager\Controller\SessionManagerController;

return [
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'session' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '/session',
                            'defaults' => [
                                '__NAMESPACE__' => 'UthandoSessionManager\Controller',
                                'controller'    => SessionManagerController::class,
                                'action'        => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'delete' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => '/delete',
                                    'defaults' => [
                                        'action'     => 'delete',
                                    ],
                                ],
                            ],
                            'view' => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'         => '/id/[:id]',
                                    'constraints'   => [
                                        //'id'		=> '\d+'
                                    ],
                                    'defaults'      => [
                                        'action'     => 'view',
                                    ],
                                ],
                            ],
                            'list' => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'         => '/list',
                                    'defaults'      => [
                                        'action'     => 'list',
                                    ],
                                ],
                            ],
                            'page' => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'         => '/page/[:page]',
                                    'constraints'   => [
                                        'page'			=> '\d+'
                                    ],
                                    'defaults'      => [
                                        'action'     => 'list',
                                        'page'       => 1,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'console' => [
        'router' => [
            'routes' => [
                'session/gc' => [
                    'options' => [
                        'route' => 'session gc',
                        'defaults' => [
                            '__NAMESPACE__' => 'UthandoSessionManager\Controller',
                            'controller' => SessionManagerConsole::class,
                            'action' => 'gc'
                        ],
                    ],
                ],
            ],
        ],
    ],
];
