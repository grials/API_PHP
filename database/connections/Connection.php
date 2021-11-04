<?php

namespace Database\Connections;

// use Config\Config as BaseConfig;
use Exception;

use PDO;

class Connection
{
    private $connection;
    private array $configuration = [];

    public function __construct()
    {
        $this->configuration = require("./config/database.php");
        // $this->configuration = [
        //     "driver" => Config::$DRIVER,
        //     "host" => Config::$HOST,
        //     "database" => Config::$DATABASE,
        //     "port" => Config::$PORT,
        //     "username" => Config::$USERNAME,
        //     "password" => Config::$PASSWORD,
        //     "charset" => Config::$CHARSET
        // ];
        var_dump($this->configuration);
    }

    public function connect()
    {
        try {
            $url = "{$this->configuration["driver"]}:host:{$this->configuration["host"]}:{$this->configuration["port"]};dbname={$this->configuration["database"]};charset={$this->configuration['charset']}";

            $this->connection = new PDO($url, $this->configuration['username'], $this->configuration['password']);

            echo "Connected to database";
        } catch (Exception $th) {
            echo "Failed to connect to database";
            echo $th->getMessage();
        }
    }
}