<?php

require '../Model/sqlConnect.php';
$bdd = connect();

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

addUser($bdd);
