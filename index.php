<?php

include 'Model/sqlConnect.php' ;

?>

<form method="post" name="connect">

    <fieldset id="registered">
        <input type="text" name="nom">
        <input type="text" name="pass">
        <input type="submit" value="Se connecter">
        <input type="submit" value="S'inscrire">
    </fieldset>

</form>


<form method="post" name="upload" action="Controller/UploadController.php">

    <fieldset id="file">
        <input type="file" name="file">
        <input type="text" name="fileName">
        <input type="submit" value="Envoyer">
    </fieldset>

</form>
