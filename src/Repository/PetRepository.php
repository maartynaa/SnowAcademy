<?php

namespace Snowdog\SnowAcademy\Repository;

use React\MySQL\QueryResult;
use function React\Async\await;
use Snowdog\SnowAcademy\Entity\Pet;
use React\MySQL\ConnectionInterface;
use Snowdog\SnowAcademy\Repository\PetRepositoryInterface;

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
        return new Pet($pet['id'], $pet['name'], $pet['age'], $pet['color'], $pet['type']);
    }

    public function createPet(array $data): ?int
    {
        $result = await($this->db->query(
            'INSERT INTO pet (`name`, age, color, `type`) VALUES (?, ?, ?, ?)',
            [$data['name'], $data['age'], $data['color'], $data['type']]
        ));

        if ($result->affectedRows === 0) {
            return null;
        }

        return $result->insertId;
    }

    public function updatePet(array $data): bool
    {
        $sql = [];
        foreach ($data as $key => $value) {

            if ($key === 'id') {
                continue;
            }

            $sql[] = $key . ' = "' . $value . '"';
        }

        $sql = implode(", ", $sql);

        $result = await($this->db->query(
            'UPDATE pet SET ' . $sql . ' WHERE id = ?',
            [$data['id']]
        )); 

        if ($result->affectedRows === 0) {
            return false;
        }

        return true;
    }

    public function deletePetById(int $id): bool
    {
        $result = await($this->db->query(
            'DELETE FROM pet WHERE id = ?',
            [$id]
        ));

        if ($result->affectedRows === 0) {
            return false;
        }

        return true;
    }
}
