<?php

class Db
{
    private $connection = null;
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'database' => 'shop',
        'opt' => [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fetch(PDO::FETCH_ASSOC)) fetch(PDO::FETCH_LAZY))
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    ];

    private function getDSN()
    {
        $driver = $this->config['driver'];
        $host = $this->config['host'];
        $db =  $this->config['database'];
        $charset = $this->config['charset'];
        $dsn = "$driver:host=$host;dbname=$db;charset=$charset";
        return $dsn;
    }

    private function getConnection()
    {
        if (is_null($this->connection)) {
            $dsn = $this->getDSN();
            $user = $this->config['login'];
            $pass = $this->config['password'];
            $opt = $this->config['opt'];

            $this->connection = new PDO($dsn, $user, $pass, $opt);
        }
        return $this->connection;
    }

    private function query($sql, $params)
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function executeQuery($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }
}



function getDB()
{
    static $db = null;
    if (is_null($db)) {
        $db = new Db;
    }
    return $db;
}

function executeQuery($sql, $params = [])
{
    $stmt = getDB();
    return $stmt->execute($sql, $params);
}

function getArrayDB($sql, $params = [])
{
    $stmt = getDB();
    return $stmt->queryAll($sql, $params);
}

function getOneDB($sql, $params = [])
{
    $stmt = getDB();
    return $stmt->queryOne($sql, $params);
}

/*
$stmt = getArrayDB('SELECT * FROM product');
$stmt = $db->queryOne('SELECT * FROM product WHERE id = :id', ['id' => 10]);
var_dump($stmt);


die;
*/
