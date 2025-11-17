<?php

class Portefeuille
{
    private $proprietaire;
    private $argentDisponible;

    function __construct($proprietaire, $argentInitial)
    {
        $this->proprietaire = $proprietaire;
        $this->argentDisponible = $argentInitial;
        echo "👛 Portefeuille créé pour ", $proprietaire, " avec ", $argentInitial, "€ \n";
    }

    /**
     * Crée une méthode getArgent() qui :
     * - RETOURNE (return) la valeur de $argentDisponible
     * - Permet de LIRE l'argent sans pouvoir le modifier
     */
    function getArgent()
    {
        return $this->argentDisponible;
    }

    /**
     * Cette méthode doit :
     * 1. Prendre un paramètre $montant
     * 2. Vérifier que $montant > 0
     * 3. Si OUI : ajouter le montant et afficher "✅ Ajout de [montant]€"
     * 4. Si NON : afficher "❌ Montant invalide !"
     */
    function ajouterArgent($montant)
    {
        if ($montant > 0) {
            $this->argentDisponible += $montant;
            echo "✅ Ajout de ", $montant, "€ \n";
        } else {
            echo "❌ Montant invalide ! \n";
        }
    }

    /**
     * Cette méthode doit :
     * 1. Vérifier que $montant > 0
     * 2. Vérifier que $montant <= $argentDisponible
     * 3. Si OK : retirer et afficher "✅ Retrait de [montant]€"
     * 4. Sinon : afficher "❌ Fonds insuffisants !" ou "❌ Montant invalide !"
     */
    function retirerArgent($montant)
    {
        if ($montant > 0) {
            if ($montant <= $this->argentDisponible) {
                $this->argentDisponible -= $montant;
                echo "✅ Retrait de ", $montant, "€ \n";
            } else {
                echo "❌ Fonds insuffisants ! \n";
            }
        } else {
            echo "❌ Montant invalide ! \n";
        }
    }
}

// Crée $monPortefeuille avec :
// - Propriétaire : ton prénom
// - Argent initial : 100€
//
// Teste :
// 1. Afficher l'argent (avec getArgent())
// 2. Ajouter 50€
// 3. Retirer 30€
// 4. Tenter de retirer 500€ (devrait échouer)
// 5. Tenter d'ajouter -20€ (devrait échouer)
// 6. Afficher l'argent final

$monPortefeuille = new Portefeuille("Nina", 100);
echo $monPortefeuille->getArgent(), "\n";
$monPortefeuille->retirerArgent(50);
$monPortefeuille->retirerArgent(30);
$monPortefeuille->retirerArgent(500);
$monPortefeuille->ajouterArgent(-20);
echo $monPortefeuille->getArgent(), "\n";
