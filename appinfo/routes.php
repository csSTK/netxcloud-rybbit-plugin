<?php

return [
    'routes' => [
        ['name' => 'settings#save', 'url' => '/settings/save', 'verb' => 'POST'],
    ],
    'ocs' => [
        ['name' => 'config#config', 'url' => '/api/config', 'verb' => 'GET'],
    ]
];
