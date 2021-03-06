# PHP-Framework-project
- Projet : licence 3
- version PHP : 7.2.19

# Installation 

- Faire un git clone du projet 
- Changer la constante DS dans le fichier config.php ( si Linux ou Windows)
- Aller sur votre http://localhost/PHP-Framework-project/

# Routeur de base

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

# Mon super Router ( Bonus )

- Les routes sont dans le fichier RouteDeMonSuperRouteur.php

```php
<?php
    MonSuperRouter::setDefaultNamespace('/PHP-Framework-project');
    
    MonSuperRouter::get('/Controller/customer', 'App\Controller\Customer@index');
    MonSuperRouter::get('/Controller/contact', 'App\Controller\Contact@index') ;
    MonSuperRouter::post('/Controller/seller', 'App\Controller\Seller@index');
    
    MonSuperRouter::start();
?>
```
- `setDefaultNamespace` permet de mettre un chemin par défaut

#### Utililsation 

- methode `get` , `post` : 1er param le chemin, 2e param `controller@methode`

# Controller
- Les controllers sont dans le repertoire App/Controller
- Il hérite de la classe abstraite ControllerAbstract

# Fichier ressource 
Les fichiers ressource sont dans le dossier /Assets (CSS, JS, Img)

# Classe ControllerAbstract

Tous les controllers héritent de classe abstraite `ControllerAbstract`

Configuration du rendu de la view : 

- `setTitle` permet de définir un titre de notre page
- `setCharset` permet de définir le "charset" de notre page 
- `addStyle` permet d'ajouter une ou plusieurs feuilles de style a notre template
- `setMeta` permet d'ajouter une ou meta a notre page 
(elle utilise la méthode magique `__call`)
- `verifyMethod` permet de vérifier si la page demandée est appelée avec la bonne méthode http
( prend en paramettre la méthode demandée)
- `render` permet d'afficher la view : 
1er param le nom du fichier, 2e param un tableau de variable qui pourront etre récupéré dans la vu 
( option 2e param 'no-footer' => true pour ne pas avoir de footer ) 
# Gestion des erreurs

Controller : `Error`

La methode `showError(int $httpCode, String $message = '')` permet d'afficher une page en 
cas d'erreur.

Elle est utilisé lorsque une route n'est pas trouvé ou que la méthode http n'est pas bonne, elle appelle la view Error.phtml


# TP2

Route Dynamique : 

```php
$routes = [

    '/PHP-Framework-project/contact/{id}' => [
        'App\Controller\Contact' => 'getById',
        'option' => [
            'id'=> 'number'
        ]
    ],

    '/PHP-Framework-project/contact_1/{id}/contact_2/{id_2}' => [
        'App\Controller\Contact' => 'getByTwoId',
        'option' => [
            'id'=> 'number',
            'id_2' => 'number'
        ]
    ],

];
```

Dans le controller : exemple

```php
    public function getById($resquest)
    {
        $this->verifyMethod('GET');
        $contact = (new ContactFormRepository())->get($resquest['id']);


        $this->setTitle(' show Contact ')
            ->render('contactId', compact('contact'));
    }
```
On a un tableau clef / valeur

exemple pour la route : 
```'/PHP-Framework-project/contact_1/{id}/contact_2/{id_2}'```
```'/PHP-Framework-project/contact_1/5/contact_2/6'```

On a un tableau 

```php
$request = [
    'id' => 5,
    'id_2' => 6
]
```

Vérification des paramètres

```php
        ...
        'option' => [
            'id'=> 'number', // ou string
            'id_2' => 'number' // ou string
        ]

```
- number : verifie si integer
- string : verifie si string