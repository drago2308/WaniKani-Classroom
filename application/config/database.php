<?php

return [
    'default-connection' => 'concrete',
    'connections' => [
        'concrete' => [
            'driver' => 'c5_pdo_mysql',
            'server' => 'localhost',
            'database' => 'wanikani_rivals',
            'username' => 'admin',
            'password' => '080029',
            'charset' => 'utf8',
        ],
    ],
];
