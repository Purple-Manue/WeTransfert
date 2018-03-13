<?php

require '../Controller/FileListController.php';

$list = list_fichiers($bdd);
print_r($list);
$resultat = mysqli_fetch_assoc($list);
var_dump($resultat);


/*echo'<table>';
while (list($id_file,$file_name,$file_date,$file_link,$file_usr)=mysql_fetch_row($resultat)):
    {
   echo "<tr><td>";
   echo $id_file;
   echo "</td><td>";
   echo $file_name;
   echo "</td><td>";
   echo $file_date;
   echo "</td><td>";
   echo $file_link;
   echo "</td><td>";
   echo $file_usr;
   echo "</td></tr>\n";
   echo'</table>'
endwhile;
}
