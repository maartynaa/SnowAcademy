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
        $data = json_decode((string) $request->getBody(), 1);
        if (!$data['id']) {
            return Response::plaintext("Missing id.\n");
        }

        $response = $this->repository->updatePet($data);
        if ($response === false) {
            return Response::plaintext("Could not update pet.\n");
        }

        $pet = $this->repository->getPetById($data['id']);
        return Response::plaintext(
            "Pet ID: " . $pet->id . "\n" .
            "Pet name: " . $pet->name . "\n" .
            "Pet age: " . $pet->age . "\n" .
            "Pet color: " . $pet->color . "\n" .
            "Pet type: " . $pet->type . "\n"
        );
    }
}
