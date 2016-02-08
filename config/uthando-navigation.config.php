<?php

return [
    'navigation' => [
        'admin' => [
            'session' => [
                'label' => 'Session Manager',
                'params' => [
                    'icon' => 'fa-cog',
                ],
                'route' => 'admin/session',
                'resource' => 'menu:admin',
            ],
        ],
    ],
];
