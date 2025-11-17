<?php

// Crée une classe ABSTRAITE 'Forme' avec :
// - Mot-clé 'abstract' devant 'class'
// - Propriété protected $nom
// - Constructeur
// - Méthode ABSTRAITE calculerAire() (pas de code, juste la signature)
// - Méthode NORMALE afficher() qui affiche nom et aire

abstract class Forme
{
    protected $nom;

    function __construct($nom)
    {
        $this->nom = $nom;
    }

    abstract function calculerAire();

    function afficher()
    {
        echo "Forme : ", $this->nom, "\n";
        echo "Aire = ", $this->calculerAire(), "\n";
    }
}

// Crée une classe 'Cercle' qui hérite de Forme :
// - Propriété private $rayon
// - Constructeur qui appelle parent::__construct("Cercle") et stocke $rayon
// - IMPLÉMENTER calculerAire() : return pi() * $rayon * $rayon;

class Cercle extends Forme
{
    private $rayon;

    function __construct($rayon)
    {
        parent::__construct("Cercle");
        $this->rayon = $rayon;
    }

    function calculerAire()
    {
        return pi() * $this->rayon * $this->rayon;
    }
}

// Crée une classe 'Rectangle' qui hérite de Forme :
// - Propriétés private $largeur, $hauteur
// - Constructeur
// - Implémenter calculerAire() : return $largeur * $hauteur;

class Rectangle extends Forme
{
    private $largeur;
    private $hauteur;

    function __construct($hauteur, $largeur)
    {
        parent::__construct("Rectangle");
        $this->hauteur = $hauteur;
        $this->largeur = $largeur;
    }

    function calculerAire()
    {
        return $this->largeur * $this->hauteur;
    }
}

// Crée :
// - Un cercle de rayon 5
// - Un rectangle de 10 × 20
//
// Affiche l'aire de chacun avec afficher()
//
// Essaie de créer une Forme directement :
// $forme = new Forme("Test");  ← Ça va planter ! C'est normal.

$cercle = new Cercle(5);
$rectangle = new Rectangle(10, 20);
$cercle->afficher();
$rectangle->afficher();

$forme = new Forme("Test");
//oh non je bug.....