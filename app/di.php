<?php

declare(strict_types=1);

use function DI\create;
use function DI\get;


return [
    'DbAdapter' => create(DatabaseAdapter::class)
        ->constructor(
            get('db.host'),
            get('db.port'),
            get('db.name'),
            get('db.pass')
        ),
];
