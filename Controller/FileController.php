<?php
//Listing de tous les fichier d'un USR inscrit
$queryListFile = SELECT * FROM files INNER JOIN users ON files.file_usr=users.id_usr WHERE usr_name=/*Current_usr*/;
$query = mysqli_query($link, $queryListFile);





 ?>
