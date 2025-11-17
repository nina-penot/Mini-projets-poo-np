<?php

// Crée une classe 'Utilisateur' avec :
// - Propriété STATIC private $compteur = 0
// - Propriétés normales : private $nom, $id
// - Constructeur qui :
//   1. Incrémente self::$compteur
//   2. Assigne self::$compteur à $this->id
//   3. Assigne le $nom
//   4. Affiche "✅ Utilisateur #[id] créé : [nom]"

class Utilisateur
{
    private static $compteur = 0;
    private $nom, $id;

    function __construct($nom)
    {
        self::$compteur++;
        $this->id = self::$compteur;
        $this->nom = $nom;
        echo "✅ Utilisateur #", $this->id, " créé : ", $this->nom, "\n";
    }

    // Ajoute une méthode STATIQUE getNombreUtilisateurs() qui :
    // - Retourne self::$compteur
    static function getNombreUtilisateurs()
    {
        return self::$compteur;
    }

    // Ajoute une méthode afficher() qui affiche :
    // "👤 User #[id] : [nom]"
    function afficher()
    {
        echo "👤 User #", $this->id, " : ", $this->nom, "\n";
    }
}

// 1. Affiche le nombre d'utilisateurs AVANT création
//    (Utilisateur::getNombreUtilisateurs())
echo Utilisateur::getNombreUtilisateurs(), "\n";

// 2. Crée 3 utilisateurs : "Jean", "Marie", "Paul"
$jean = new Utilisateur("Jean");
$marie = new Utilisateur("Marie");
$paul = new Utilisateur("Paul");

// 3. Affiche le nombre total APRÈS création
echo Utilisateur::getNombreUtilisateurs(), "\n";

// 4. Affiche les infos de chaque utilisateur
$jean->afficher();
$marie->afficher();
$paul->afficher();
