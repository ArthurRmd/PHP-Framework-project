<?php


namespace App\Controller;


use App\Core\ControllerAbstract;

class Contact extends ControllerAbstract
{

    public function index()
    {

        $this->verifyMethod('GET');
        $this->setTitle('Le titre de ma page')
            ->setCharset('utf-8')
            ->addStyle('app.css')
            ->setMeta('author', 'Arthur')
            ->setMeta('robots', 'follow')
            ->render('contact');
    }

    public function show()
    {
        $this->verifyMethod('POST');

        $this->setTitle(' show Contact ')
            ->setCharset('utf-8')
            ->addStyle('app.css')
            ->setMeta('author', 'Arthur')
            ->setMeta('robots', 'follow')
            ->render('show-contact', [
                'firstname' => $_POST['firstname'] ?? '',
                'lastname'=> $_POST['lastname'] ?? '',
            ]);
    }


}