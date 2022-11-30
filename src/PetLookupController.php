<?php

namespace Snowdog\SnowAcademy;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class PetLookupCOntroller
{
    public function __invoke(ServerRequestInterface $request)
    {
        return Response::plaintext(
            "Pet ID: " . $request->getAttribute('id') . "\n"
        );
    }
}