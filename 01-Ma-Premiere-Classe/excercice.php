<?php

class Voiture
{
    public $marque;
    public $couleur;
    public $vitesseMax;

    function démarrer()
    {
        echo "🚗 Vrooooom ! La ", $this->marque, " démarre ! \n";
    }

    function klaxonner()
    {
        echo "🎺 POUET POUET ! ", $this->couleur, ". \n";
    }
}

// Voiture 1 : $ferrari
// - marque: "Ferrari"
// - couleur: "Rouge"
// - vitesseMax: 320
$ferrari = new Voiture;
$ferrari->marque = "Ferrari";
$ferrari->couleur = "Rouge";
$ferrari->vitesseMax = 320;

// Voiture 2 : $twingo
// - marque: "Renault Twingo"
// - couleur: "Jaune"
// - vitesseMax: 150
$twingo = new Voiture;
$twingo->marque = "Renault Twingo";
$twingo->couleur = "Jaune";
$twingo->vitesseMax = 150;

$ferrari->démarrer();
$twingo->démarrer();

$ferrari->klaxonner();
$twingo->klaxonner();

//vitesse
echo "La vitesse de la voiture ", $ferrari->marque, " est : ", $ferrari->vitesseMax, "km/h \n";
echo "La vitesse de la voiture ", $twingo->marque, " est : ", $twingo->vitesseMax, "km/h \n";
