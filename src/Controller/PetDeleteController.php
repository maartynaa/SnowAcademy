<?php

namespace Snowdog\SnowAcademy\Controller;

use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;
use Snowdog\SnowAcademy\Repository\PetRepositoryInterface;


class PetDeleteCOntroller
{
    public function __construct(
        private readonly PetRepositoryInterface $repository
    ) {}

    public function __invoke(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');
        $response = $this->repository->deletePetById($id);

        return Response::plaintext($response);
    }
}