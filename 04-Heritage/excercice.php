<?php

class Animal
{
    // Crée une classe 'Animal' avec :
    // - Propriété PROTECTED $nom  (protected = accessible dans les enfants)
    // - Constructeur qui initialise $nom
    // - Méthode manger() : "🍖 [nom] mange..."
    // - Méthode dormir() : "😴 [nom] dort... Zzz"
    protected $nom;

    function __construct($nom)
    {
        $this->nom = $nom;
    }

    function manger()
    {
        echo "🍖 ", $this->nom, " mange... \n";
    }

    function dormir()
    {
        echo "😴 ", $this->nom, " dort... Zzz \n";
    }
}

// Crée une classe 'Chien' qui HÉRITE de Animal :
// - Utilise le mot-clé 'extends'
// - Ajoute une méthode aboyer() : "🐕 [nom] : WOOF WOOF !"
//
// Le Chien hérite automatiquement de manger() et dormir() !
class Chien extends Animal
{
    function aboyer()
    {
        echo "🐕 ", $this->nom, " : WOOF WOOF !";
    }
}

// Crée une classe 'Chat' qui hérite de Animal :
// - Ajoute une méthode miauler() : "🐈 [nom] : MIAOU !"
class Chat extends Animal
{
    function miauler()
    {
        echo "🐈 ", $this->nom, " : MIAOU ! \n";
    }
}

// Crée une classe 'Oiseau' qui hérite de Animal :
// - Ajoute une méthode voler() : "🦅 [nom] vole dans le ciel !"
class Oiseau extends Animal
{
    function voler()
    {
        echo "🦅 ", $this->nom, " vole dans le ciel ! \n";
    }
}

// Crée :
// - Un chien nommé "Rex"
// - Un chat nommé "Minou"
// - Un oiseau nommé "Tweety"
//
// Pour chacun, teste :
// - Les méthodes héritées (manger, dormir)
// - Les méthodes spécifiques (aboyer, miauler, voler)
$chien = new Chien("Rex");
$chat = new Chat("Minou");
$oiseau = new Oiseau("Tweety");

$chien->manger();
$chat->manger();
$oiseau->manger();

$chien->dormir();
$chat->dormir();
$oiseau->dormir();

$chien->aboyer();
$chat->miauler();
$oiseau->voler();
