<?php

require '../Controller/FileListController.php';
$list = list_fichiers($bdd, $user);
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
        echo '<td>' . $resultat['file_link'] . '</td>';
        echo '<td>' . $resultat['file_status'] . '</td>';
    echo "</tr>";
    }
echo "</table>";
