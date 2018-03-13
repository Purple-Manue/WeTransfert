<?php

require 'Model/sqlConnect.php';

function list(){
    //Listing de tous les fichiers d'un USR inscrit
    $queryListFile = "SELECT * FROM files INNER JOIN users ON files.file_usr=users.id_usr WHERE usr_name='$_SESSION['name']'";"
    $query = mysqli_query($bdd, $queryListFile);

    if (mysqli_num_rows($query) > 0){
      while ($row = mysqli_fetch_assoc($query)){
        echo "<ul>
                <li>".$row['file_name']."</li>
                <li>".$row['file_date']."</li>
                <li>".$row['file_link']."</li>
                <li>".$row['file_status']."</li>
              </ul>";
      }
    }
}
