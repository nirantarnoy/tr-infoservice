<?php
return [
    'all' => [
        'type' => 2,
        'description' => 'ทุกอย่าง',
    ],
    'role.admin' => [
        'type' => 1,
        'description' => 'Admin',
        'children' => [
            'all',
        ],
    ],
    'role.user' => [
        'type' => 1,
        'description' => 'User',
        'children' => [
            'all',
        ],
    ],
];
