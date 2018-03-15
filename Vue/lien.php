<?php

require '../Controller/UploadController.php';

include '../includes/header2.html';

$link = $_GET['lien'];

echo '<section class="container titre">' ;
    echo '<h2>Voici le lien vers votre document :</h2>';
echo '</section>';

echo '<section class="container">' ;
    echo '<div class="bloc">';
        echo '<a href="../docs/' . "$link" . '" download="../docs/' . "$link" . '">'. "localhost/exoWetransfert/doc/$link" . '</a>';
    echo '</div>';
echo '</section>';

include '../includes/base_js.html';
