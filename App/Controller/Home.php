<?php


namespace App\Controller;

use App\Core\ControllerAbstract;

class Home extends ControllerAbstract
{

    public function index()
    {

        $this->verifyMethod('GET');
        $this->setTitle('Accueil')
            ->setCharset('utf-8')
            ->setMeta('author', 'Arthur')
            ->setMeta('robots', 'follow')
            ->render('home');
    }

}