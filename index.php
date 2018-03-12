<?php
session_start();
if(isset($_SESSION['name'])){
  echo "Vous êtes connecté. Bonjour ".$_SESSION['name'];
  //var_dump($_SESSION);
}
else{
  echo "Vous n'êtes pas connecté.";
}

?>
<form method="post" action="Controller/CloseSessionController.php">
  <input type="submit" name="submit" value="Deconnection">
</form>


<form action="Controller/ConnectionController.php" method="post">
    <input type="text" name="nom">
    <input type="text" name="pass">
    <input type="submit" name="connexion" value="Se connecter">
</form>


<form action="Controller/RegisterController.php" method="post">
    <input type="text" name="nom">
    <input type="text" name="pass">
    <input  type="submit" name="inscription" value="S'inscrire">
</form>

<form action="Controller/UploadController.php" method="post" enctype="multipart/form-data">

    <fieldset id="file">
        <input type="file" name="file">
        <input type="text" name="fileName" placeholder="Nom du fichier">
        <input type="submit" value="Envoyer">
    </fieldset>

</form>
