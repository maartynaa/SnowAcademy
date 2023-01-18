<?php

namespace Snowdog\SnowAcademy\Repository;

use Snowdog\SnowAcademy\Entity\Pet;

interface PetRepositoryInterface
{
  public function getPetById(int $id): ?Pet;

  public function createPet(array $data);

  public function updatePetById(int $id, array $data): ?Pet;

  public function deletePetById(int $id): bool;
}
