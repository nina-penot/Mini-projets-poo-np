<?php

// Crée une INTERFACE 'PaymentInterface' avec :
// - Méthode payer($montant) (juste la signature)
// - Méthode rembourser($montant) (juste la signature)

interface PaymentInterface
{
    function payer($montant);
    function rembourser($montant);
}

// Crée une classe 'CarteBancaire' qui IMPLÉMENTE PaymentInterface :
// - Mot-clé 'implements'
// - Propriété private $numero
// - Constructeur
// - Implémenter payer() : "💳 Paiement de X€ par carte ****[4 derniers chiffres]"
// - Implémenter rembourser() : "💳 Remboursement de X€ sur la carte"

class CarteBancaire implements PaymentInterface
{
    private string $numero;

    function __construct($numero)
    {
        $this->numero = $numero;
    }

    function payer($montant)
    {
        $chiffres = "";
        for ($n = -4; $n <= -1; $n++) {
            $chiffres = $chiffres . $this->numero[$n];
        }
        echo "💳 Paiement de ", $montant, "€ par carte ", $chiffres, "\n";
    }

    function rembourser($montant)
    {
        echo "💳 Remboursement de ", $montant, "€ sur la carte\n";
    }
}

// PayPal (implémente PaymentInterface) :
// - Propriété private $email
// - payer() : "🅿️  Paiement PayPal de X€ via [email]"
// - rembourser() : "🅿️  Remboursement PayPal de X€"

class Paypal implements PaymentInterface
{
    private $email;

    function __construct($email)
    {
        $this->email = $email;
    }

    function payer($montant)
    {
        echo "🅿️  Paiement PayPal de ", $montant, "€ via ", $this->email, "\n";
    }

    function rembourser($montant)
    {
        echo "🅿️  Remboursement PayPal de ", $montant, "€\n";
    }
}

// Crypto (implémente PaymentInterface) :
// - Propriété private $wallet
// - payer() : "₿ Paiement crypto de X€ depuis wallet [8 premiers caractères]..."
// - rembourser() : "₿ Remboursement crypto de X€"

class Crypto implements PaymentInterface
{
    private string $wallet;

    function __construct($wallet)
    {
        $this->wallet = $wallet;
    }

    function payer($montant)
    {
        $my_wallet = "";

        for ($n = 0; $n < 8; $n++) {
            $my_wallet = $my_wallet . $this->wallet[$n];
        }
        echo "₿ Paiement crypto de ", $montant, "€ depuis ", $my_wallet, "\n";
    }

    function rembourser($montant)
    {
        echo "₿ Remboursement crypto de ", $montant, "€";
    }
}

// Crée une fonction traiterPaiement() qui :
// - Prend en paramètre PaymentInterface $methode et $montant
// - Affiche "🛒 COMMANDE : X€"
// - Appelle $methode->payer($montant)
// - Affiche "✅ Paiement validé !"
function traiterPaiement($methode, $montant)
{
    echo "🛒 COMMANDE : ", $montant, "€\n";
    $methode->payer($montant);
    echo "✅ Paiement validé !\n";
}

// Crée :
// - Une carte bancaire "1234567812345678"
$carte = new CarteBancaire("1234567812345678");
// - Un PayPal "jean@email.com"
$paypal = new Paypal("jean@email.com");
// - Un wallet crypto "1A2B3C4D5E6F7G8H9I"
$crypto = new Crypto("1A2B3C4D5E6F7G8H9I");

// Appelle traiterPaiement() avec chacun
traiterPaiement($carte, 20);
traiterPaiement($paypal, 20);
traiterPaiement($crypto, 0.01);
