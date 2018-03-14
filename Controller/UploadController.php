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
    $size_file = $_FILES['file']['size'];
    $fail = true;
    echo 'USR='.$user."<br>";

    echo $size_file;

    if($user == 3 AND $size_file > 3145728){
      echo 'Veuillez choisir un fichier de moins de 3Mo.';
      $fail == true;
    }
    elseif($user != 3 AND $size_file > 7340032){
      echo 'Veuillez choisir un fichier de moins de 7Mo.';
      $fail == true;
    }
    elseif(($user == 3 AND $size_file < 3145728) OR ($user != 3 AND $size_file < 7340032)){
      $fail == false;
      $insert_file = mysqli_query($bdd,
        "INSERT INTO files (file_name, file_date, file_link, file_status, file_usr)
        VALUES ('$name', '$date', '$doc', '$status', '$user')");
      if (! $insert_file) {
      echo mysqli_error($bdd);
      } else {
      return ($doc);
      }
    }
}

if (isset($_POST) AND !empty($_POST) AND $fail === false){

    $bdd = connect();
    $target_dir = "../docs/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $link = save($bdd, $target_file);
    rename("$target_file", "$link");
    echo 'Voici le lien vers votre <a href="../docs/' . "$link" . '" download="../docs/' . "$link" . '">document</a>';

    } else {

        echo 'Erreur';
    }
