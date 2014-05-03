<?php

return [
	'userAcl' => [
		'userRoles' => [
			'admin' => [
				'privileges' => [
					'allow' => [
                        ['controller' => 'UthandoSessionManager\Controller\SessionManager', 'action' => 'all'],
                    ],
				],
			],
		],
		'userResources' => [
			'UthandoSessionManager\Controller\SessionManager',
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
    		'session' => [
    			'label' => 'Session Manager',
    			'route' => 'admin/session',
    			'resource' => 'menu:admin',
    		],
    	],
    ],
    'view_manager' => [
        'template_map' => include __DIR__  .'/../template_map.php',
    ],
];
