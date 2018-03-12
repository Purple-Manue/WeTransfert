<?php

require '../Model/sqlConnect.php' ;

function save($bdd, $target_file)
{
    $name = $_POST['fileName'];
    $date = date('Y-m-d H:i:s');
    $link = md5($name.$date);
    $doc = "../docs/$link";
    $status = true;
    $user = 1;
    $insert_file = mysqli_query($bdd,
       "INSERT INTO files (file_name, file_date, file_link, file_status, file_usr)
       VALUES ('$link.jpg', '$date', '$doc', '$status', '$user')");
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
    echo 'Voici le lien vers votre <a href="../docs/' . "$link" . '">document</a>';

    } else {

        echo 'Erreur';
    }
