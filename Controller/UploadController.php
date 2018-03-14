<?php

require '../Model/sqlConnect.php' ;
session_start();

function save($bdd, $target_file)
{
    if (isset($_SESSION['id'])) {
        $user = $_SESSION['id'];
    } else {
        $user = "3";
    }
    $name = $_POST['fileName'];
    $date = date('Y-m-d H:i:s');
    $link = md5($name.$date);
    $doc = "../docs/$link";
    $status = true;

    $insert_file = mysqli_query($bdd,
       "INSERT INTO files (file_name, file_date, file_link, file_status, file_usr)
       VALUES ('$name', '$date', '$doc', '$status', '$user')");
   if (! $insert_file) {
       echo mysqli_error($bdd);
   } else {
       return ($doc);
   }
}

if (isset($_POST) AND !empty($_POST)){

    $bdd = connect();
    $target_dir = "../docs/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $link = save($bdd, $target_file);
    rename("$target_file", "$link");
    header("location: ../Vue/lien.php?lien=$link");

    } else {

        echo 'Erreur';
    }
