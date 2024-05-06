<?php
class Database
{
    private $connection;

    function connect($database, $username, $password)
    {
        try {
            $this->connection = new PDO(
                'mysql:host=127.0.0.1:3307;dbname=' . $database . ';charset=utf8',
                $username,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
           echo"sa marche pawws database";
        }
    }

    function getConnection()
    {
        return $this->connection;
    }

    function isConnected()
    {
        return $this->connection != null;
    }

    function disconnect()
    {
        if ($this->isConnected()) {
            unset($this->connection);
        }
    }
}