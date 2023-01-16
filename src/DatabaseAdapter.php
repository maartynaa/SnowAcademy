<?php

namespace Snowdog\SnowAcademy;

use React\MySQL\Factory;

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
    private $database;

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
        string $database,
        string $username,
        string $password
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        $credentials = $this->username . ':' . $this->password . '@' . $this->host . '/' . $this->database . '?idle=0.001';
        return (new Factory())->createLazyConnection($credentials);
    }
}