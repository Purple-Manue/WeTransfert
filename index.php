<form action="Controller/UserController.php" method="post">

    <fieldset id="user">
        <input type="text" name="nom">
        <input type="text" name="pass">
        <input type="submit" name="connexion" value="Se connecter">
        <input  type="submit" name="inscription" value="S'inscrire">
    </fieldset>

</form>


<form action="Controller/UploadController.php" method="post" enctype="multipart/form-data">

    <fieldset id="file">
        <input type="file" name="file">
        <input type="text" name="fileName">
        <input type="submit" value="Envoyer">
    </fieldset>

</form>
