<?php

namespace Snowdog\SnowAcademy;

class DatabaseAdapter
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    public function __construct(
        string $host,
        int $port,
        string $username,
        string $password
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }
}