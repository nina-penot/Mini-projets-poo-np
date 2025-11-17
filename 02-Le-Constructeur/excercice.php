<?php

class CompteBancaire
{
    public $titulaire;
    public $solde;

    function __construct($titulaire, $soldeInitial)
    {
        $this->titulaire = $titulaire;
        $this->solde = $soldeInitial;

        echo "✅ Compte créé pour ", $titulaire, " avec ", $soldeInitial, "€ \n";
    }

    /**
     * deposer($montant) :
     * - Ajoute le montant au solde
     * - Affiche "💰 Dépôt de [montant]€"
     */
    function deposer($montant)
    {
        $this->solde += $montant;
        echo "💰 Dépôt de ", $montant, "€ \n";
    }

    /**
     * afficherSolde() :
     * - Affiche "💰 Solde de [titulaire] : [solde]€"
     */
    function afficherSolde()
    {
        echo "💰 Solde de ", $this->titulaire, " : ", $this->solde, "€ \n";
    }
}

// Crée 2 comptes AVEC LE CONSTRUCTEUR :
//
// Compte 1 : Jean avec 1000€
// Compte 2 : Marie avec 500€
//
// Pour chaque compte :
// - Fais un dépôt de 200€
// - Affiche le solde

$compte1 = new CompteBancaire("Jean", 1000);
$compte2 = new CompteBancaire("Marie", 200);

$compte1->deposer(200);
$compte2->deposer(200);
$compte1->afficherSolde();
$compte2->afficherSolde();
