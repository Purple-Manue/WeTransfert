<?php

include 'login.php';

function connect(){
    $bdd = mysqli_connect('localhost', getUser(), getMdp(), 'GAC-loader');

    if(!$bdd) {
    echo 'Erreur' ;
    die('La connexion avec la bdd n\'a pas pu être établie'); // On affiche un message d'erreur.
    }

    mysqli_set_charset($bdd, 'utf8');
    return($bdd);
}

$bdd = connect();

$delusrfile = mysqli_query($bdd,
"DELETE FROM files
WHERE file_date < (NOW()- INTERVAL 1 DAY) AND file_usr != 3");

$anonymousfiles = mysqli_query($bdd,
"SELECT * FROM files
INNER JOIN users ON files.file_usr=users.id_usr
WHERE file_date < (NOW()-1000) AND users.id_usr = 3");
while ($file = mysqli_fetch_assoc($anonymousfiles)) {
    shell_exec("rm /var/www/exoWetransfert/docs/" . "$file" . " \;");
};
$delete = mysqli_query($bdd,
"DELETE FROM files
WHERE file_date < (NOW()-1000) AND file_usr = 3");

shell_exec("find /var/www/exoWetransfert/docs -mtime +1 -exec rm {} \;");
