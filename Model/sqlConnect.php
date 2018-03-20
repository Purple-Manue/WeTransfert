<?php
include '../login.php';

function connect(){
    $bdd = mysqli_connect('localhost', getUser(), getMdp(), 'GAC-loader');

    if(!$bdd) {
    echo 'Erreur' ;
    die('La connexion avec la bdd n\'a pas pu être établie'); // On affiche un message d'erreur.
    }

    mysqli_set_charset($bdd, 'utf8');
    return($bdd);
}
