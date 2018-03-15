<?php

require '../Controller/FileListController.php';

include '../includes/header2.html';

$list = list_fichiers($bdd, $user);

echo "<h1> Vos fichiers partagés </h1>";
echo "<table>";
    echo "<tr>";
        echo "<td>Nom du fichier</td>";
        echo "<td>Date de téléchargement</td>";
        echo "<td>Lien du fichier</td>";
        echo "<td>Lien actif</td>";
    echo "</tr>";
    while ($resultat = mysqli_fetch_assoc($list)) {
    echo "<tr>";
        echo '<td>' . $resultat['file_name'] . '</td>';
        echo '<td>' . $resultat['file_date'] . '</td>';
        echo '<td><a href="' . $resultat['file_link'] . '" download="' . $resultat['file_link'] . '">lien</a></td>';
        echo '<td>' . $resultat['file_status'] . '</td>';
    echo "</tr>";
    }
echo "</table>";

include '../includes/base_js.html';
