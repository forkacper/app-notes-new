<?php

namespace Core;

use PDO;

class Database
{
    protected PDO $db;
    public function __construct($username, $password, $host, $port, $database, $connection)
    {
        $dsn = $connection . ':' . http_build_query([
            'host' => $host,
            'port' => $port,
            'dbname' => $database,
        ], '', ';');

        $this->db = new PDO(
            $dsn,
            $username,
            $password,
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
}