<?php

return [
    'uthando_session_manager' => [
        'config' => [
            'class' => 'Zend\Session\Config\SessionConfig',
            'options' => [
                'name'          => 'uthando-cms',
                'save_handler'  => 'files',
                //'cache_limiter' => 'public',
                //'save_path'     => APPLICATION_PATH . '/data/sessions',
            ],
        ],
        'storage' => 'Zend\Session\Storage\SessionArrayStorage',
        'validators' => [
            'Zend\Session\Validator\RemoteAddr',
            'Zend\Session\Validator\HttpUserAgent',
        ],
    ],
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
	            				'controller'    => 'SessionManager',
	            				'action'        => 'index',
	            			    'force-ssl'     => 'ssl'
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
									    'force-ssl'  => 'ssl'
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
	            					    'force-ssl'  => 'ssl'
	            					],
	            				],
	            			],
	            			'list' => [
	            				'type'    => 'Segment',
	            				'options' => [
	            					'route'         => '/list',
	            					'defaults'      => [
	            						'action'     => 'list',
	            					    'force-ssl'  => 'ssl'
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
	            					    'force-ssl'  => 'ssl'
	            					],
	            				],
	            			],
	            		],
            		],
            	],
            ],
        ],
    ],
    'navigation' => [
        'admin' => [
            'modules' => [
                'pages' => [
                    'session' => [
                        'label' => 'Session Manager',
                        'route' => 'admin/session',
                        'resource' => 'menu:admin',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => include __DIR__  .'/../template_map.php',
    ],
];
