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
        'save_handler' => 'UthandoSessionManager\SessionSaveHandler',
        'validators' => [
            'Zend\Session\Validator\RemoteAddr',
            'Zend\Session\Validator\HttpUserAgent',
        ],
    ],
    'db' => [
        'driver'             => 'PDO_SQLITE',
        'database'           => './data/sessionTest.sqlite',
        'sqlite_constraints' => true,
    ],
];