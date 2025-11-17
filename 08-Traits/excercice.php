<?php
// Crée 3 TRAITS :
//
// Nageable :
// - Méthode nager() : "🏊 [nom] nage comme un poisson !"

trait Nageable
{
    function nager()
    {
        echo "🏊 ", $this->nom, " nage comme un poisson !\n";
    }
}

// Volant :
// - Méthode voler() : "🦅 [nom] vole dans les airs !"

trait Volant
{
    function voler()
    {
        echo "🦅 ", $this->nom, " vole dans les airs !\n";
    }
}

// Invisible :
// - Méthode seRendreInvisible() : "👻 [nom] devient invisible !"

trait Invisible
{
    function seRendreInvisible()
    {
        echo "👻 ", $this->nom, " devient invisible !\n";
    }
}

// Crée une classe 'Guerrier' qui :
// - Utilise le trait Nageable (use Nageable;)
// - A une propriété public $nom
// - A un constructeur
// - A une méthode attaquer() : "⚔️ [nom] attaque avec son épée !"

class Guerrier
{
    use Nageable;

    public $nom;

    function __construct($nom)
    {
        $this->nom = $nom;
    }

    function attaquer()
    {
        echo "⚔️ ", $this->nom, " attaque avec son épée !\n";
    }
}

// Crée une classe 'Magicien' qui :
// - Utilise PLUSIEURS traits : Nageable, Volant, Invisible
// - A une propriété public $nom
// - A un constructeur
// - A une méthode lancerSort() : "🔮 [nom] lance un sort !"

class Magicien
{
    use Nageable, Volant, Invisible;

    public $nom;

    function __construct($nom)
    {
        $this->nom = $nom;
    }

    function lancerSort()
    {
        echo "🔮 ", $this->nom, " lance un sort !\n";
    }
}

// Crée :
// - Un guerrier "Conan"
// - Un magicien "Gandalf"

$conan = new Guerrier("Conan");
$gandalf = new Magicien("Gandalf");

// Pour le guerrier, teste :
// - attaquer()
// - nager() (du trait !)

$conan->attaquer();
$conan->nager();

// Pour le magicien, teste :
// - lancerSort()
// - voler()
// - nager()
// - seRendreInvisible()

$gandalf->lancerSort();
$gandalf->voler();
$gandalf->nager();
$gandalf->seRendreInvisible();
