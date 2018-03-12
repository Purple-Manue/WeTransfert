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
    <input type="file" name="file">
    <input type="text" name="fileName">
    <input type="submit" value="Envoyer">
</form>
