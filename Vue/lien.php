<?php

require '../Controller/UploadController.php';

include '../includes/header2.html';

$link = $_GET['lien'];

echo 'Voici le lien vers votre <a href="../docs/' . "$link" . '" download="../docs/' . "$link" . '">document</a>';

include '../includes/base_js.html';
