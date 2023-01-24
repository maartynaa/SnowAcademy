<?php

namespace Snowdog\SnowAcademy\Repository;

use Snowdog\SnowAcademy\Entity\Pet;

interface PetRepositoryInterface
{
  public function getPetById(int $id): ?Pet;

  public function createPet(array $data): ?int;

  public function updatePet(array $data): bool;

  public function deletePetById(int $id): bool;
}
