<?php
include 'Model/sqlConnect.php' ;
//Ajout d'un fichier
if (isset($_POST['submit'])){
  $file = $_POST['file']; //Recuperation PHP du fichier apres "SUBMIT"
  $fileName = $_POST['fileName']; //Recuperation PHP du nom du fichier apres "SUBMIT"
  $usrId = ""; //Recupere l'ID de l'utilisateur
  $error = false; // Definie un status d'erreur
  $size = filesize($file); //Recupere la taille du fichier

//Quand l'utilisateur n'est pas inscrit
  //Verifie qu'un fichier soit selectionné
  if(empty($file) && ($usrId == null)){
    echo "Merci de séléctionner un fichier";
    $error == true;
  }
  //Verifie que le fichier pese moins de 3Mo
  elseif(!empty($file) && ($size >= 3000000) && ($usrId == null)){
    echo "Merci d'uploader un fichier de moins de 3Mo.";
    $error == true;
  }
  //Initialisation de la requete d'insertion
  else(!empty($file) && ($size <= 3000000) && ($usrId == null)){
    $error == false;
    $queryUpNoLog = "INSERT INTO 'files' (file_name, file_link, file_status, file_usr)
                      VALUES('$fileName', /*URL*/, true)";
    $query = mysqli_query($bdd, $queryUpNoLog);
    //Requete executée
    if($query){
      echo 'Fichier uploadé avec succes!';
    }
    else{
      echo "Aïe...il y a un probleme.";
      $error == true;
    }
  }
///////Quand l'utilisateur est connecté
  //Verifie qu'un fichier soit selectionné
  if(empty($file) && ($usrId != null)){
    echo "Merci de séléctionner un fichier";
    $error == true;
  }
  //Verifie que le fichier pese moins de 3Mo
  elseif(!empty($file) && ($size >= 7000000) && ($usrId != null)){
    echo "Merci d'uploader un fichier de moins de 7Mo.";
    $error == true;
  }
  //Initialisation de la requete d'insertion
  else(!empty($file) && ($size <= 7000000) && ($usrId != null)){
    $error == false;
    $queryUpLog = "INSERT INTO 'files' (file_name, file_link, file_status, file_usr)
                      VALUES('$fileName', /*URL*/, true, '$usrId' )";
    $query = mysqli_query($bdd, $queryUpNoLog);
    //Requete executée
    if($query){
      echo 'Fichier uploadé avec succes!';
    }
    else{
      echo "Aïe aïe aïe...il y a un probleme.";
      $error == true;
    }
  }
}



?>
