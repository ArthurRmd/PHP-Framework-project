<?php


$config = [
    'sgbd' => 'mysql',
    'serveur' => 'localhost',
    'login' => 'root',
    'pass' => 'root',
    'base' => 'licence3'
];

try {
    $con = new PDO(
        $config['sgbd'] . ':host='. $config['serveur'] . ';dbname=licence3', $config['login'], $config['pass']
    );

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $e->getMessage();
}


//$query = $con->query('select * from toto');
$query = $con->exec('INSERT INTO `toto`( `tutu`, `name`) VALUES ( 4, Adrien)');
var_dump($query->fetchAll(PDO::FETCH_COLUMN));