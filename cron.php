<?php

require 'Model/sqlConnect.php';
$bdd = connect();

$delete = mysqli_query($bdd,
"DELETE FROM files
WHERE DATEDIFF(minute, CURRDATE('mi'), file_date) > 10");

//shell_exec("find /var/www/exoMeme/img/temp -mtime +7 -exec rm {} \;");
