<?php

namespace Snowdog\SnowAcademy;

use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;
use Snowdog\SnowAcademy\PetRepositoryInterface;

class PetLookupCOntroller
{
    public function __construct(
        private readonly PetRepositoryInterface $repository
    ) {}

    public function __invoke(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');
        $pet = $this->repository->getPetById($id);

        if ($pet === null) {
            return Response::plaintext("Pet not found\n")->withStatus(Response::STATUS_NOT_FOUND);
        }

        return Response::plaintext(
            "Pet ID: " . $pet->id . "\n" .
            "Pet name: " . $pet->name . "\n" .
            "Pet age: " . $pet->age . "\n" .
            "Pet color: " . $pet->color . "\n" .
            "Pet breed: " . $pet->breed . "\n" 
        );
    }
}