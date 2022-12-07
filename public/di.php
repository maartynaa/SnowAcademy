<?php

declare(strict_types=1);

use Snowdog\SnowAcademy\DatabaseAdapter;
use function DI\autowire;
use function DI\create;
use function DI\get;

return [
    'mysql_database' => autowire(DatabaseAdapter::class)
        ->constructorParameter('host', get('db.host'))
        ->constructorParameter('port', get('db.port'))
        ->constructorParameter('database', get('db.name'))
        ->constructorParameter('username', get('db.user'))
        ->constructorParameter('password', get('db.pass'))
];
