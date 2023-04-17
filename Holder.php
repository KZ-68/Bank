<?php

class Holder {
    private string $_lastname;
    private string $_firstname;
    private DateTime $_dateOfBirth;
    private string $_city;
    private array $_accounts;


    // public function __construct(string $lastname, string $firstname, string $dateOfBirthString, string $city, array $accounts) {
    public function __construct(string $lastname, string $firstname, string $dateOfBirthString, string $city) {
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_dateOfBirth = new DateTime($dateOfBirthString);
        $this->_city = $city;

        // $this->_accounts = $accounts;
        $this->_accounts = [];
    }

    public function addBankAccount(BankAccount $bankAccount) {
        $this->_accounts[] = $bankAccount;
        // array_push($this->_accounts, $bankAccount);
    }

    public function getAge() { 
        $today = new DateTime();
        
        $interval = date_diff($this->_dateOfBirth, $today);

        return $interval->y;
    }

    public function printInfoHolder() {
        echo "<p>Nom : ".$this->_lastname."<br/>
        Prénom : ".$this->_firstname."<br/>
        Date de Naissance : ".$this->_dateOfBirth->format("d/m/Y")."<br/>
        Age : ".$this->getAge()."<br/>
        Ville : ".$this->_city."<br/></p>";
    }

    public function __toString():string {
        $accountString = "";
        echo "Comptes Bancaires du Titulaire : <br/>";
        foreach ($this->_accounts as $account) {
            $accountString .= $account->getLabel() . "<br />";
        }
        return $accountString;
    }

    public function getNomComplet() {
        return $this->_lastname." ".$this->_firstname;
    }

    public function getLastname() {
        return $this->_lastname;
    }

    public function getFirstname() {
        return $this->_firstname;
    }

    public function getDateOfBirth() {
        return $this->_dateOfBirth;
    }

    public function getCity() {  
        return $this->_city;
    }

    public function getAccounts() {
            return $this->_accounts;
        }
        

    public function setLastname($lastname) {
        $this->_lastname = $lastname;
    }

    public function setFirstname($firstname) {
        $this->_firstname = $firstname;
    }

    public function setDateOfBirth($dateOfBirthString) {
        $this->_dateOfBirth = new DateTime($dateOfBirthString);
    }

    public function setCity() {
        $this->_city = $city;
    }

}