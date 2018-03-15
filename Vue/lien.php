<?php

require '../Controller/UploadController.php';

include '../includes/header2.html';

$link = $_GET['lien'];

echo 'Voici le lien vers votre document :' ;
echo '<a href="../docs/' . "$link" . '" download="../docs/' . "$link" . '">'. "$link" . '</a>';

include '../includes/base_js.html';
