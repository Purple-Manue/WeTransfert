<?php

require '../Model/sqlConnect.php' ;
session_start();

function save($bdd, $target_file)
{
    if (isset($_SESSION['id'])) {
        $user = $_SESSION['id'];
        var_dump($user);
    } else {
        $user = "3";
        var_dump($user);
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
  //////
  $user = "";
  $failed;
  $size_file = $_FILES['file']['size'];
  //////
  $target_dir = "../docs/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  ///////


  //Verification taille fichier
  if(isset($_FILES) AND ($_FILES['file']['error'] == 1)){
    echo 'USR='.$user."<br>";
    echo "Votre systeme ne vous permet pas d'envoyer un fichier de cette taille...sorry.";
    //Necessite une modif de php.ini > upload_max_size
    $failed = true;
    return $failed;
  }
  elseif(isset($_FILES) AND ($user == "3") AND ($size_file > "3145728")){
    echo 'USR='.$user."<br>";
    //var_dump($failed);
    echo 'Veuillez choisr un fichier inférieur à 3Mo.';
    $failed = true;
    return $failed;
  }
  elseif(isset($_FILES) AND ($user != "3") AND ($size_file > "7340032")){
    //echo 'USR=' . "$user" . '<br>';
    //var_dump($failed);
    echo 'Veuillez choisr un fichier inférieur à 7Mo.';
    $failed = true;
    header("location: ../index.php?error=$failed");
  }
  else{
    //var_dump($failed);
    $failed = false;
    //return $failed;
    /////////
  move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  $link = save($bdd, $target_file);
  rename("$target_file", "$link");
  //header("location: ../Vue/lien.php?lien=$link");
  //Remplacement du "header(location...)" qui fait chier Chris!!
  echo 'Voici le lien vers votre <a href="../docs/' . "$link" . '" download="../docs/' . "$link" . '">document</a>';
  }
}
elseif($failed == true){
    var_dump($failed);
    echo 'Erreur upload';
  }else{
        var_dump($failed);
        echo 'Erreur tout court';
    }
