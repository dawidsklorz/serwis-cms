<?php
namespace System;
use PDO;

class Database
{
    private $pdo;
    private $mysql_host = 'localhost';
    private $port = '3306';
    private $username = 'root';
    private $password = '';
    private $database = 'cms';

    public function connect()
    {
        try
        {
            $this->pdo = new PDO('mysql:host='.$this->mysql_host.';dbname='.$this->database.';port='.$this->port, $this->username , $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }  
        catch(PDOException $e)
        {
            echo 'Połączenie nie mogło zostać utworzone.<br />'. $e->getMessage();
        }
    }

    public function query($sql, $parameters)
    {
        $stmt = $this->pdo->prepare($sql); // 1
        foreach($parameters as $key => $value)
        {
            $stmt -> bindValue($key, $value, PDO::PARAM_STR);
        }
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);      
    }

    public function execute($sql, $parameters)
    {
        $stmt = $this->pdo->prepare($sql); // 1
        foreach($parameters as $key => $value)
        {
            $stmt -> bindValue($key, $value, PDO::PARAM_STR);
        }
        return $stmt -> execute();
    }
}
