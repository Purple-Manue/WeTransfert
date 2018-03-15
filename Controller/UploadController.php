<?php

require '../Model/sqlConnect.php' ;
session_start();

//Fonction d'insertion dans la base de données
function save($bdd, $target_file, $user)
{
    if (isset($_SESSION['id'])) {
        $user = $_SESSION['id'];
        header("location: ../index.php?user=$user");
    } else {
        $user = 3;
        header("location: ../index.php?user=$user");
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
  //////Verification de l'ID USER - si Id = 3 > user "anonymous"
  if (isset($_SESSION['id'])) {
      $user = $_SESSION['id'];
  } else {
      $user = 3;
  }
  $failed = "";
  $size_file = $_FILES['file']['size'];

  //Verification taille fichier
  if(isset($_FILES) AND ($_FILES['file']['error'] == 1)){
    //Necessite une modif de php.ini > upload_max_size
    $failed = "1";
    header("location: ../index.php?user=$user&error=$failed");
  }
  elseif(isset($_FILES) AND ($user == 3) AND ($size_file > "3145728")){
    //L'Utilisateur "anonymous" ne peux envoyer un fichier > 3Mo
    $failed = "2";
    header("location: ../index.php?user=$user&error=$failed");
  }
  elseif(isset($_FILES) AND ($user != 3) AND ($size_file > "7340032")){
    //L'Utilisateur identifier ne peux envoyer un fichier > 7Mo
    $failed = "3";
    header("location: ../index.php?user=$user&error=$failed");
  }
  else{
    //Déplacement du fichier vers le stockage "docs/"
    $target_dir = "../docs/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $link = save($bdd, $target_file, $user);
    rename("$target_file", "$link");
    header("location: ../Vue/lien.php?lien=$link");
    }
}
