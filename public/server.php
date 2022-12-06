<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/config.php');
$containerBuilder->addDefinitions(__DIR__ . '/di.php');
$container = $containerBuilder->build();

$app = new FrameworkX\App(new FrameworkX\Container($container));

$app->get('/', function () {
    return React\Http\Message\Response::plaintext(
        "Hello world!\n"
    );
});

$app->get('/pet/{id}', new Snowdog\SnowAcademy\PetLookupController($repository));

$app->run();
