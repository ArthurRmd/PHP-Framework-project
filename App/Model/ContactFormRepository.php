<?php


namespace App\Model;

use App\Core\Connexion;

class ContactFormRepository
{

    public function save(ContactForm $contactForm)
    {
        $response = Connexion::getInstance()
            ->exec(" INSERT INTO contactForm (`firstname`, `name`) values ('" . $contactForm->getFirstname() . "','" . $contactForm->getName() . "')");

        return $response;
    }

    public function get(int $id) //:ContactForm
    {
        $response = Connexion::getInstance()
            ->query(" SELECT * from ContactForm where id = " . $id)
            ->fetchAll();

        if ($response == []) return null;

        $contact = new ContactForm();
        $contact->setFirstname($response[0]['firstname']);
        $contact->setName($response[0]['name']);

        return $contact;

    }

    public function getList(): array
    {
        $contacts = array();

        $responses = Connexion::getInstance()
            ->query(" SELECT * from ContactForm")
            ->fetchAll();

        foreach ($responses as $response)
        {
            $contact = new ContactForm();
            $contact->setFirstname($response['firstname']);
            $contact->setName($response['name']);

            array_push($contacts, $contact);
        }

        return $contacts;
    }

}