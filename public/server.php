<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new FrameworkX\App();

$app->get('/', function () {
    return React\Http\Message\Response::plaintext(
        "Hello world!\n"
    );
});

$app->get('/pet/{id}', new Snowdog\SnowAcademy\PetLookupController($repository));

$app->run();
