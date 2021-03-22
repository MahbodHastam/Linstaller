<?php

return [
    'url_prefix' => 'linstaller',

    'php_min_version' => '^7.4|^8.0',

    'requirements' => [
        'php' => [
            'pdo',
            'mbstring',
            'tokenizer',
            'json',
            'openssl',
            'curl',
        ],
        'apache' => [
            'mod_rewrite',
        ],
    ],

    'permissions' => [
        'bootstrap/cache/' => 775,
        'storage/framework/' => 775,
        'storage/logs/' => 775,
    ],
];
