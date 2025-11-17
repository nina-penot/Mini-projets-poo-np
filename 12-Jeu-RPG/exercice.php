<?php

// Crée un trait 'Attaquant' avec :
// - Méthode attaquer($cible) qui :
//   * Inflige $this->attaque points de dégâts à la cible
//   * Affiche "⚔️ [nom] attaque [cible] et inflige X dégâts !"
//   * Appelle $cible->recevoirDegats($degats)

trait Attaquant
{
    function attaquer($cible)
    {
        echo "⚔️ ", $this->nom, " attaque ", $cible->nom, " et inflige ", $this->attaque, " dégâts !\n";
        $cible->recevoirDegats($this->attaque);;
    }
}

// Crée une classe ABSTRAITE 'Personnage' avec :
// - Propriété STATIC private $totalPersonnages = 0
// - Propriétés PROTECTED : $nom, $vie, $attaque
// - Propriété PRIVATE : $estVivant = true
// - Constructeur qui :
//   * Incrémente $totalPersonnages
//   * Initialise nom, vie, attaque
//   * Affiche "✨ [nom] entre dans l'arène ! (Vie: X, Attaque: Y)"
// - Méthode recevoirDegats($degats) qui :
//   * Réduit $vie
//   * Si vie <= 0 : met $estVivant à false et affiche "💀 [nom] est KO !"
//   * Sinon : affiche "💔 [nom] a X PV restants"
// - Méthode getEstVivant() qui retourne $estVivant
// - Méthode STATIC getTotalPersonnages()
// - Méthode ABSTRAITE crier() (chaque personnage crie différemment)

abstract class Personnage
{
    static private $totalPersonnages = 0;
    protected $nom, $vie, $attaque;
    private $estVivant = true;

    function __construct($nom, $vie, $attaque)
    {
        self::$totalPersonnages++;

        $this->nom = $nom;
        $this->vie = $vie;
        $this->attaque = $attaque;

        echo "✨ ", $this->nom, " entre dans l'arène ! (Vie: ", $this->vie, ", Attaque: ",
        $this->attaque, ")\n";
    }

    function getNom()
    {
        return $this->nom;
    }

    function recevoirDegats($degats)
    {
        $this->vie -= $degats;
        // Si vie <= 0 : met $estVivant à false et affiche "💀 [nom] est KO !"
        if ($this->vie <= 0) {
            $this->estVivant = false;
            echo "💀 ", $this->nom, " est KO !\n";
        } else {
            echo "💔 ", $this->nom, " a ", $this->vie, " PV restants\n";
        }
    }

    // - Méthode getEstVivant() qui retourne $estVivant
    function estVivant()
    {
        return $this->estVivant;
    }

    // - Méthode STATIC getTotalPersonnages()
    static function getTotalPersonnages()
    {
        return self::$totalPersonnages;
    }

    // - Méthode ABSTRAITE crier() (chaque personnage crie différemment)
    abstract function crier();
}

// Crée une classe 'Guerrier' qui :
// - HÉRITE de Personnage
// - UTILISE le trait Attaquant
// - Constructeur : appelle parent avec vie=100, attaque=20
// - Méthode crier() : "🗡️ POUR L'HONNEUR !"

class Guerrier extends Personnage
{
    use Attaquant;

    function __construct($nom)
    {
        return parent::__construct($nom, $vie = 100, $attaque = 20);
    }

    function crier()
    {
        echo "🗡️ POUR L'HONNEUR !\n";
    }
}

// Crée une classe 'Mage' qui :
// - HÉRITE de Personnage
// - UTILISE le trait Attaquant
// - Constructeur : appelle parent avec vie=70, attaque=35
// - Méthode crier() : "🔮 PAR LA MAGIE !"
// - Méthode BONUS sortSpecial($cible) : inflige 50 dégâts fixes
//   * Affiche "✨ [nom] lance BOULE DE FEU ! 💥"

class Mage extends Personnage
{
    use Attaquant;

    function __construct($nom)
    {
        return parent::__construct($nom, $vie = 70, $attaque = 35);
    }

    function sortSpecial($cible)
    {
        //inflige 50 dégats
        echo "✨ ", $this->nom, " lance BOULE DE FEU ! 💥\n";
        $cible->recevoirDegats(50);
    }

    function crier()
    {
        echo "🔮 PAR LA MAGIE !\n";
    }
}

// Crée une classe 'Archer' qui :
// - HÉRITE de Personnage
// - UTILISE le trait Attaquant
// - Constructeur : appelle parent avec vie=80, attaque=25
// - Méthode crier() : "🏹 TIR MORTEL !"
class Archer extends Personnage
{
    use Attaquant;

    function __construct($nom)
    {
        return parent::__construct($nom, $vie = 80, $attaque = 25);
    }

    function crier()
    {
        echo "🏹 TIR MORTEL !\n";
    }
}

// Crée une classe 'Arene' avec :
// - Méthode combat($perso1, $perso2) qui :
//   * Affiche "⚔️ COMBAT : [nom1] VS [nom2]"
//   * Les deux personnages crient
//   * Tour par tour jusqu'à ce qu'un personnage soit KO
//   * Retourne le gagnant

class Arene
{
    function combat($perso1, $perso2)
    {
        echo "⚔️ COMBAT : ", $perso1->getNom(), " VS ", $perso2->getNom(), "\n";
        $perso1->crier();
        $perso2->crier();
        //Who moves first: random.
        $char = [1 => $perso1, 2 => $perso2];
        $first = mt_rand(1, 2);
        $second = $first == 1 ? 2 : 1;
        //first move
        while ($char[$first]->estVivant() and $char[$second]->estVivant()) {
            if ($char[$first] instanceof Mage) {
                $char[$first]->sortSpecial($char[$second]);
            } else {
                $char[$first]->attaquer($char[$second]);
            }

            if (!$char[$second]->estVivant()) {
                break;
            }

            if ($char[$second] instanceof Mage) {
                $char[$second]->sortSpecial($char[$first]);
            } else {
                $char[$second]->attaquer($char[$first]);
            }
        }
        if ($char[$first]->estVivant()) {
            echo $char[$first]->getNom(), " REMPORTE LA VICTOIRE! 🏆\n";
            return $char[$first];
        } else {
            echo $char[$second]->getNom(), " REMPORTE LA VICTOIRE! 🏆\n";
            return $char[$second];
        }
    }
}

// 1. Crée 3 personnages :
//    - Conan le Guerrier
//    - Gandalf le Mage
//    - Legolas l'Archer
$mage = new Mage("Gandalf");
$warrior = new Guerrier("Conan");
$archer = new Archer("Legolas");

// 2. Crée une Arene
$arena = new Arene;

// 3. Fais combattre :
//    - Combat 1 : Conan VS Gandalf
//    - Le mage utilise son sort spécial !
//    - Combat 2 : Le gagnant VS Legolas
$combat1 = $arena->combat($mage, $warrior);
$combat2 = $arena->combat($combat1, $archer);

// 4. Affiche les statistiques :
//    - Total de personnages créés
//    - Le CHAMPION final
echo "Personnages créés : ", Personnage::getTotalPersonnages(), ".\n";
echo "🏆 Le grand gagnant du tournoi est: ", $combat2->getNom(), " ! 🏆\n";
