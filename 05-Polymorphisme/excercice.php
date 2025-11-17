<?php

// Crée une classe 'Instrument' avec :
// - Propriété protected $nom
// - Constructeur
// - Méthode jouer() : "🎵 [nom] joue de la musique..."
class Instrument
{
    protected $nom;

    function __construct($nom)
    {
        $this->nom = $nom;
    }

    function jouer()
    {
        echo "🎵 ", $this->nom, " joue de la musique... \n";
    }
}

// Crée une classe 'Guitare' qui hérite de Instrument :
// - REDÉFINIS la méthode jouer() :
//   "🎸 [nom] : GLING GLING GLING ♪"
class Guitare extends Instrument
{
    function jouer()
    {
        echo "🎸 ", $this->nom, " : GLING GLING GLING ♪ \n";
    }
}

// Piano :
// - Redéfinir jouer() : "🎹 [nom] : PLONK PLONK PLONK ♫"
class Piano extends Instrument
{
    function jouer()
    {
        echo "🎹 ", $this->nom, " : PLONK PLONK PLONK ♫ \n";
    }
}

// Batterie :
// - Redéfinir jouer() : "🥁 [nom] : BOOM BOOM CRASH ♪♫"
class Batterie extends Instrument
{
    function jouer()
    {
        echo "🥁 ", $this->nom, " : BOOM BOOM CRASH ♪♫ \n";
    }
}

// Crée un tableau $orchestre avec :
// - Une guitare "Fender"
// - Un piano "Yamaha"
// - Une batterie "Pearl"
$orchestre = [
    new Guitare("Fender"),
    new Piano("Yamaha"),
    new Batterie("Pearl")
];

// Fais une boucle qui fait jouer tous les instruments
foreach ($orchestre as $instrument) {
    $instrument->jouer();
}
