<?php


namespace App\Controller;


use App\Core\ControllerAbstract;

class Contact extends ControllerAbstract
{

    public function index()
    {

        $this->render('contact',  [
            'title' => 'titre',
            'charset' => 'UTF-16'
        ]);
    }


}