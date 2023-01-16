<?php

namespace Snowdog\SnowAcademy;

use React\MySQL\QueryResult;
use Snowdog\SnowAcademy\Pet;
use function React\Async\await;
use React\MySQL\ConnectionInterface;
use Snowdog\SnowAcademy\PetRepositoryInterface;

class PetRepository implements PetRepositoryInterface
{
    public function __construct(
        private readonly ConnectionInterface $db
    ) {}

    public function getPetById(int $id): ?Pet
    {
        $result = await($this->db->query(
            'SELECT * FROM pet WHERE id = ?',
            [$id]
        ));

        if (count($result->resultRows) === 0) {
            return null;
        }

        $pet = $result->resultRows[0];
        return new Pet($pet['id'], $pet['name'], $pet['age'], $pet['color'], $pet['breed']);
    }
}
