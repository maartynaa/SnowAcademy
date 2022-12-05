<?php
return [
    'db.host' => 'localhost',
    'db.port' => 3306,
    'db.name' => 'snowacademy',
    'db.user' => 'root',
    'db.pass' => '',

    'DbAdapter' => DI\create()
        ->constructor(DI\get('db.host'), DI\get('db.port'), DI\get('db.name'), DI\get('db.pass')),
];
