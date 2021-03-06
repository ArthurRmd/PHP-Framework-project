<?php


namespace App\Controller;


use App\Core\ControllerAbstract;
use App\Model\ContactForm;
use App\Model\ContactFormRepository;

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

        $firsname = $_POST['firstname'] ?? '';
        $lastname = $_POST['lastname'] ?? '';

        $contact = new ContactForm();
        $contact->setFirstname($firsname);
        $contact->setName($lastname);
        (new ContactFormRepository())->save($contact);

        $this->setTitle(' show Contact ')
            ->setCharset('utf-8')
            ->addStyle('app.css')
            ->setMeta('author', 'Arthur')
            ->setMeta('robots', 'follow')
            ->render('show-contact', [
                'firstname' => $firsname,
                'lastname'=> $lastname,
            ]);
    }

    public function showAll()
    {
        $this->verifyMethod('GET');

        $contacts = (new ContactFormRepository())->getList();

        $this->setTitle(' show Contact ')
            ->setCharset('utf-8')
            ->addStyle('app.css')
            ->setMeta('author', 'Arthur')
            ->setMeta('robots', 'follow')
            ->render('show-all-contact', compact('contacts'));
    }

    public function getById($resquest)
    {
        $this->verifyMethod('GET');
        $contact = (new ContactFormRepository())->get($resquest['id']);

        if (!$contact) {
            (new Error())->showError(404, "L'utilisateur n'est pas trouvé");
            exit();
        }

        $this->setTitle(' show Contact ')
            ->setCharset('utf-8')
            ->addStyle('app.css')
            ->setMeta('author', 'Arthur')
            ->setMeta('robots', 'follow')
            ->render('contactId', compact('contact'));
    }

    public function getByTwoId ($resquest) {
        $this->verifyMethod('GET');

        $contacts = array();

        array_push($contacts, (new ContactFormRepository())->get($resquest['id']));
        array_push($contacts, (new ContactFormRepository())->get($resquest['id_2']));

        if (!$contacts) {
            (new Error())->showError(404, "L'utilisateur n'est pas trouvé");
            exit();
        }

        $this->setTitle(' show Contact ')
            ->setCharset('utf-8')
            ->addStyle('app.css')
            ->setMeta('author', 'Arthur')
            ->setMeta('robots', 'follow')
            ->render('show-two-contact', compact('contacts'));
    }

}