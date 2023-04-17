<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank</title>
</head>
<body>
    <h1>Exercice 1 - POO</h1>

    <h2>Résultat</h2>

    <?php

        include('Holder.php');
        include('BankAccount.php');

        // $holder1 = new Holder("Tempe", "Max", "18-05-1993", "Paris", array(["account1"], ["account2"]));
        $holder1 = new Holder("Tempe", "Max", "18-05-1993", "Paris");
        $holder1->printInfoHolder();
        $account1 = new BankAccount("Livret A", 25000.0, "€", $holder1);
        $account2 = new BankAccount("Compte Courant", 40000.0, "€", $holder1);
        echo $holder1;
        echo "<br/>";
        $account1->printInfoAccount();
        $account2->printInfoAccount();
        echo $account1;
        $account1->transfer($account2, 50.0);
        var_dump($account2);
    ?>

</body>
</html>