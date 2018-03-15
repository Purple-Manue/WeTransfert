<?php

require 'Model/sqlConnect.php';
$bdd = connect();

/*$userfiles = mysqli_query($bdd,
"SELECT * FROM files
INNER JOIN users ON files.file_usr=users.id_usr
WHERE file_date < (NOW()- INTERVAL 1 DAY) AND file_usr != 3");
while ($usrfile = mysqli_fetch_assoc($userfiles)) {
    shell_exec("find /var/www/exoWetransfert/docs/ -mtime +1 -exec rm " . "$usrfile" . "  {} \;");
};*/
$delusrfile = mysqli_query($bdd,
"DELETE FROM files
WHERE file_date < (NOW()- INTERVAL 1 DAY) AND file_usr != 3");


/*$anonymousfiles = mysqli_query($bdd,
"SELECT * FROM files
INNER JOIN users ON files.file_usr=users.id_usr
WHERE file_date < (NOW()-1000) AND users.id_usr = 3");
while ($file = mysqli_fetch_assoc($anonymousfiles)) {
    shell_exec("find /var/www/exoWetransfert/docs/ -exec rm " . "$file" . " {} \;");
};*/
$delete = mysqli_query($bdd,
"DELETE FROM files
WHERE file_date < (NOW()-1000) AND file_usr = 3");

shell_exec("find /var/www/exoWetransfert/docs -mtime +1 -exec rm {} \;");
