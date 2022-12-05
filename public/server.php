<?php

require __DIR__ . '/../vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions("config.php");
$container = $builder->build();

$app = new FrameworkX\App(new FrameworkX\Container($container));

$app->get('/', function () {
    return React\Http\Message\Response::plaintext(
        "Hello world!\n"
    );
});

$app->get('/pet/{id}', new Snowdog\SnowAcademy\PetLookupController($repository));

$app->run();
