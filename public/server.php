<?php

declare(strict_types=1);

use Snowdog\SnowAcademy\DatabaseAdapter;
use Snowdog\SnowAcademy\Repository\PetRepository;
use Snowdog\SnowAcademy\Controller\PetGetController;
use Snowdog\SnowAcademy\Controller\PetPutController;
use Snowdog\SnowAcademy\Controller\PetPostController;
use Snowdog\SnowAcademy\Controller\PetDeleteController;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/config.php');
$containerBuilder->addDefinitions(__DIR__ . '/di.php');
$container = $containerBuilder->build();

$db = $container->get('mysql_database')->connect();
$repository = new PetRepository($db);

$app = new FrameworkX\App(new FrameworkX\Container($container));

$app->get('/', function () {
    return React\Http\Message\Response::plaintext(
        "Hello world!\n"
    );
});

$app->get('/pet/{id}', new PetGetController($repository));

$app->post('/pet', new PetPostController($repository));

$app->put('/pet/{id}', new PetPutController($repository));

$app->delete('/pet/{id}', new PetDeleteController($repository));

$app->run();
