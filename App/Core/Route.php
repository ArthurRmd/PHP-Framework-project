<?php

namespace App\Core;


class Route
{

    private $url;
    private $method;
    private $callBack;
    private $name;

    public function __construct($method, $url, $callBack)
    {
        $this->method = $method;
        $this->url = $url;
        $this->callBack = $callBack;
    }

    public function name($name): void
    {
        $this->name = $name;
    }

    public function match($method, $url): bool
    {
        return $this->method === $method && $this->url === $url;
    }

    public function execute(): void
    {

        if (is_callable($this->callBack)) {
            ($this->callBack)();
        } elseif (is_string($this->callBack)) {
            $response = $this->runController($this->callBack);
            if (!$response) dump('don\'t foud');
        } else {
            dump('aucun');
        }

    }

    private function runController(String $stringToRun): bool
    {
        $stringSeparate = explode('@', $stringToRun);

        if (count($stringSeparate) === 2) {
            $controller = $stringSeparate[0];
            $method = $stringSeparate[1];
            (new $controller)->$method();
            return true;
        }

        return false;

    }


}