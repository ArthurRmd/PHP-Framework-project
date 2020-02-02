# PHP-Framework-project
Projet : licence 3

#Installation 

- Faire un git clone du projet 
- Changer la constante DS dans le fichier config.php ( si Linux ou Windows)

#Routeur de base

- Les routes sont dans le fichier routes.php

```php
<?php
$routes = [
    '/PHP-Framework-project/contact' => [
        'App\Controller\Contact' => 'index'
    ],

    '/PHP-Framework-project/customer' => [
        'App\Controller\Customer' => 'index'
    ],
];

?>
```

#Mon super Router

- Les routes sont dans le fichier RouteDeMonSuperRouteur.php

```php
<?php
    MonSuperRouter::setDefaultNamespace('/PHP-Framework-project');
    
    MonSuperRouter::get('/Controller/customer', 'App\Customer@index');
    MonSuperRouter::get('/Controller/contact', 'App\Contact@index') ;
    MonSuperRouter::post('/Controller/seller', 'App\Seller@index');
    
    MonSuperRouter::start();
?>
```

#Controller
- Les controllers sont dans le repertoire App/Controller
- Il hérite de la classe abstraite ControllerAbstrac
qui méthodes