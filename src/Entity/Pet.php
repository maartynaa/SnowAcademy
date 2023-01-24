<?php

namespace Snowdog\SnowAcademy\Entity;

class Pet
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $age,
        public readonly string $color,
        public readonly string $type
    ) {}
}
