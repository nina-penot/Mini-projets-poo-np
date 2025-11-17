<?php

// Crée une classe User dans le namespace 'MonApp\Models' :
//
namespace MonApp\Models;

class User
{
    private $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function afficher()
    {
        echo "👤 Modèle User : ", $this->nom, "\n";
    }
}

// Crée une classe UserController dans 'MonApp\Controllers' :
//
namespace MonApp\Controllers;

class UserController
{
    public function index()
    {
        echo "📋 Liste des utilisateurs";
    }
}

// IMPORTANT : Pour revenir au namespace global, utilisez :
// namespace {
//     // Code ici
// }
//
// Crée un objet User avec le chemin complet :
// $user = new \MonApp\Models\User("Jean");
//
// Crée un objet UserController :
// $controller = new \MonApp\Controllers\UserController();
//
// Teste les méthodes.


$user = new \MonApp\Models\User("Jean");
$controller = new \MonApp\Controllers\UserController();

$user->afficher();
$controller->index();
