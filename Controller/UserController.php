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
            var_dump($_SESSION);
            $_SESSION['id'] = $userData['id_usr'];
            $_SESSION['name'] = $userData['usr_name'];
            echo "Bienvenue " . $userData['usr_name'] . "!";
        }
        else
        {
            echo 'mauvais identifiant ou mot de passe !';
        }
    }
}

function addUser($bdd) {
    if(isset($_POST['nom']) && isset($_POST['pass'])){
              $user = $_POST['nom'];
              $password = $_POST['pass'];

              $query = "INSERT INTO users (usr_name, usr_pass) VALUES('$user', '$password')";
              $result = mysqli_query($bdd, $query);
              if($result)
              {
                  $msg = "Registered Successfully";
                  echo $msg;
              }
              else
              {
                  $msg = "Error Registering";
                  echo $msg;
              }
    }
}
