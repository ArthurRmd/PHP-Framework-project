<?php


namespace App\Core;


class Connexion extends Singleton
{

    private $pdo = null;

    private $config = [
        'sgbd' => SGBD,
        'serveur' => SERVEUR,
        'login' =>  LOGIN,
        'pass' =>  PASS,
        'base' => BASE,
    ];

    protected function __construct()
    {
        try {
            $this->pdo = new \PDO(
                $this->config['sgbd'] . ':host=' . $this->config['serveur'] . ';dbname=licence3', $this->config['login'], $this->config['pass']
            );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $e) {
            $e->getMessage();
        }

    }


    public function pdoInstance()
    {
        return $this->pdo;
    }

    public function exec($sql)
    {
        return $this->pdo->exec($sql);
    }

    public function query($sql)
    {
        return $this->pdo->query($sql);
    }


}