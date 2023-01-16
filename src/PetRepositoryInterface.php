<?php

namespace Snowdog\SnowAcademy;

interface PetRepositoryInterface 
{
  public function getPetById(int $id);
}
