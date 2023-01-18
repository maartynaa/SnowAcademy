<?php

namespace Snowdog\SnowAcademy\Controller;

use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;
use Snowdog\SnowAcademy\Repository\PetRepositoryInterface;


class PetPutController
{
    public function __construct(
        private readonly PetRepositoryInterface $repository
    ) {}

    public function __invoke(ServerRequestInterface $request)
    {
       
    }
}