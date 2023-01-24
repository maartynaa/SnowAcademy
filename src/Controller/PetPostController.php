<?php

namespace Snowdog\SnowAcademy\Controller;

use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;
use Snowdog\SnowAcademy\Repository\PetRepositoryInterface;


class PetPostCOntroller
{
    public function __construct(
        private readonly PetRepositoryInterface $repository
    ) {}

    public function __invoke(ServerRequestInterface $request)
    {
        $data = json_decode((string) $request->getBody(), 1);
        $petId = $this->repository->createPet($data);
        $pet = $this->repository->getPetById($petId);

        if ($pet === null) {
            return Response::plaintext("Could not add new pet.\n");
        }

        return Response::plaintext(
            "Pet ID: " . $pet->id . "\n" .
            "Pet name: " . $pet->name . "\n" .
            "Pet age: " . $pet->age . "\n" .
            "Pet color: " . $pet->color . "\n" .
            "Pet type: " . $pet->type . "\n"
        );
    }
}