<?php


namespace App\Controller;


use App\Core\ControllerAbstract;

class Contact extends ControllerAbstract
{

    public function index()
    {

        $this->setTitle('Le titre de ma page')
            ->setCharset('utf-16')
            ->addStyle('app.css');

        $this->render('contact', [
            'title' => 'titre',
            'charset' => 'UTF-16'
        ]);
    }


}