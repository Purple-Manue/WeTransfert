<?php

require 'Model/sqlConnect.php';
$bdd = connect();

$userfiles = mysqli_query($bdd,
"SELECT * FROM files
INNER JOIN users ON files.file_usr=users.id_usr
WHERE DATEDIFF(CURDATE(), file_date) > 1 AND users.id_usr != 3");
while ($usrfile = mysqli_fetch_assoc($userfiles)) {
    shell_exec("find /var/www/exoWetransfert/docs/ -mtime +1 -exec rm " . "$usrfile" . "  {} \;");
};
$delusrfile = mysqli_query($bdd,
"DELETE FROM files
WHERE DATEDIFF(CURDATE(), file_date) > 1 AND users.id_usr != 3");


$anonymousfiles = mysqli_query($bdd,
"SELECT * FROM files
INNER JOIN users ON files.file_usr=users.id_usr
WHERE TIMESTAMPDIFF(minute, CURRENT_DATE, file_date) > 10 AND users.id_usr == 3");
while ($file = mysqli_fetch_assoc($anonymousfiles)) {
    shell_exec("find /var/www/exoWetransfert/docs/ -exec rm " . "$file" . " {} \;");
};
$delete = mysqli_query($bdd,
"DELETE FROM files
WHERE TIMESTAMPDIFF(minute, CURRENT_DATE, file_date) > 10 AND users.id_usr == 3");
