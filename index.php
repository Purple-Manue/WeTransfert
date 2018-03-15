<?php

include 'includes/header.html';

?>

<header>
    <div id="user">
        <?php
        session_start();
        if(isset($_SESSION['name'])){
            echo '<div class="row espace">';
            echo '<p class="message">Bonjour '. $_SESSION['name'] . ' ! </p>';
            echo '<form class="justify-content-center" method="post" action="Controller/CloseSessionController.php">';
                echo '<input class="btn" type="submit" name="submit" value="Deconnection">';
            echo '</form>';
            echo '<a href="Vue/table.php"><button class="btn">Historique</button></a>';
            echo '</div>';

        }
        else{
          echo "Vous n'êtes pas connecté.";
        }
        ?>
    </div>
    <div class="container">
        <h1 class="text-center">Oui Transfert ! </h1>
        <h4 class="text-center">Le service de partage de lien gratuit</h4>
    </div>
</header>

<section class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="espace bloc">
                <h3>Déjà utilisateur? Connectez vous pour bénéficier des nombreux avantages*</h3>
                <form action="Controller/ConnectionController.php" method="post">
                    <input class="form-control" type="text" name="nom">
                    <input class="form-control" type="password" name="pass">
                    <input class="btn btn-default" type="submit" name="connexion" value="Se connecter">
                </form>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="espace bloc">
                <h3>Pas encore de compte? Inscrivez vous pour bénéficier des nombreux avantages*</h3>
                <form action="Controller/RegisterController.php" method="post">
                    <input class="form-control" type="text" name="nom">
                    <input class="form-control" type="password" name="pass">
                    <input class="btn btn-default" type="submit" name="inscription" value="S'inscrire">
                </form>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="bloc espace col-12">
            <h2>Sélectionnez le fichier à partager</h2>
            <h3>Notre service est utilisable par tous avec certaines restrictions**</h3>
            <form action="Controller/UploadController.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <input class="form-control col-12" type="file" name="file">
                    <input class="form-control col-12" type="text" name="fileName" placeholder="Nom du fichier">
                </div>
                <div>
                    <input class="btn btn-primary col-12" type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</section>

<footer>
    <small class="text-center">
        <p>* Taille maximum de fichier autorisée de 7Mo et conservation du lien pendant 24h</p>
        <p>** Taille maximum de fichier autorisée de 3Mo et conservation du lien pendant 10 minutes</p>
    </small>
</footer>

<?php include 'includes/base_js.html'; ?>
