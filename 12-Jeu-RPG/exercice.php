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
        echo "⚔️ ", $this->nom, " attaque ", $cible->nom, " et inflige X dégâts !\n";
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
        $this->nom = $nom;
        $this->vie = $vie;
        $this->attaque = $attaque;

        echo "✨ [nom] entre dans l'arène ! (Vie: X, Attaque: Y)";
    }
}
