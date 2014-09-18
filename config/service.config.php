<?php

return [
    'invokables' => [
        'UthandoSessionManager\Service\SessionManager'		=> 'UthandoSessionManager\Service\SessionManager',
    ],
    'factories' => [
        'UthandoSessionManager\SessionManager'				=> 'UthandoSessionManager\Service\Factory\SessionManagerFactory',
        'UthandoSessionManager\SessionSaveHandler'			=> 'UthandoSessionManager\Service\Factory\SessionSaveHandlerFactory',
    ],
];