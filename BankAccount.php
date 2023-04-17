<?php

class BankAccount {
    private string $_label;
    private float $_balance;
    private string $_currency;
    private Holder $_holder;

    public function __construct($label, $balance, $currency, $holder) {
        $this->_label = $label;
        $this->_balance = $balance;
        $this->_currency = $currency;

        $this->_holder = $holder;
        $this->_holder->addBankAccount($this);
    }

    public function credit(float $creditAmount) {
        $this->_balance += $creditAmount; 
        echo "<p>Vous avez crédité sur votre compte ".$this->getLabel()." le montant de ".$creditAmount." ".$this->_currency."</p>";
        echo "<p>Votre solde de compte est de ".$this->_balance." ".$this->_currency."</p>";
        return $this->_balance;
    }

    public function debit(float $debitAmount) {
        // if ($this->_balance >= 0.0 && $debitAmount <= $this->_balance) { // balance >= 0 && >= debitAmount => balance >= debitAmount
        if ($this->_balance >= $debitAmount) {
            $this->_balance -= $debitAmount; 
            echo "<p>Votre compte ".$this->getLabel()." été débité de ".$debitAmount." ".$this->_currency."</p>";
            echo "<p>Votre solde de compte est de ".$this->_balance." ".$this->_currency."</p>";
            return $this->_balance;
        } else {
            // $this->_balance = 0.0; // attention : on ne remet pas le compte à zéro !
            echo "<p>Vous ne pouvez pas retirer cette somme d'argent, votre solde est de ".$this->_balance." ".$this->_currency."</p>";
            return $this->_balance;
        }
    }

    public function transfer(BankAccount $accounts, float $amount) {
        if ($this->_balance >= $amount) {
            echo "<p>Virement en cours... </p>";
            $this->debit($amount);
            $accounts->credit($amount);
            echo "<p>Virement effectué avec succès ! </p>";
        } else {
            echo "Vous n'avez pas assez d'argent sur votre compte pour le virement";
        }
    }

    public function __toString():string {
        $holderString = "Titulaire du Compte : ";
        $holderString .= $this->_holder->getNomComplet().  "<br />";
        return $holderString;
    }

    public function printInfoAccount() {
        echo "<p>Libellé du compte : ".$this->_label."<br/>
        Somme sur le compte et devise actuelle : ".$this->_balance." ".$this->_currency."</p>";
    }

    public function getLabel() {
        return $this->_label;
    }

    public function getHolder() {
        return $this->_holder;
    }

    public function getBalance() {
        echo "<p> Votre solde de compte est de ".$this->_balance." ".$this->_currency."</p>";
        return $this->_balance;
    }

    public function getCurrency() {
        return $this->_currency;
    }

    public function setLabel($labelAccount) {
        $this->_label = $label;
    }

    // public function setBalance($balanceAccount) {
    //     $this->_balance = $balance;
    // }

    public function setCurrency($currencyAccount) {
        $this->_currency = $currency;
    }

    public function setHolder() {
        $this->_holder = $holder;
    }

}