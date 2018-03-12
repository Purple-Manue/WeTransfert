<?php

include 'Model/sqlConnect.php' ;

?>

<form action="post" name="connect">

    <fieldset id="registered">
        <input type="text" name="nom">
        <input type="text" name="pass">
        <input type="submit" value="Se connecter">
        <input type="submit" value="S'inscrire">
    </fieldset>

</form>


<form action="post" name="upload">

    <fieldset id="file">
        <input type="file" name="file">
        <input type="submit" value="Envoyer">
    </fieldset>

</form>
