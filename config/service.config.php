<?php

return [
    'factories' => [
        'UthandoSessionManager\SessionManager'				=> 'UthandoSessionManager\Service\Factory\SessionManagerFactory',
        'UthandoSessionManager\SessionSaveHandler'			=> 'UthandoSessionManager\Service\Factory\SessionSaveHandlerFactory',
    ],
];