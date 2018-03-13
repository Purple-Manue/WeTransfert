<?php

require '../Model/sqlConnect.php';
$bdd = connect();

function connection($bdd) {
    $bdd = connect();
    $req = mysqli_query($bdd, "SELECT * FROM users
    WHERE users.usr_name='" . $_POST['nom'] . "' ");
    $userData = mysqli_fetch_assoc($req);
    if (!$userData)
    {
        echo 'mauvais identifiant ou mot de passe !';
    }
    else
    {
        if ($_POST['pass'] === $userData['usr_pass'])
        {
            session_start();
            $_SESSION['id'] = $userData['id_usr'];
            $_SESSION['name'] = $userData['usr_name'];
            echo "Bienvenue " . $userData['usr_name'] . "!";
            header("location: ../index.php");
        }
        else
        {
            echo 'mauvais identifiant ou mot de passe !';
        }
    }
}

connection($bdd);
