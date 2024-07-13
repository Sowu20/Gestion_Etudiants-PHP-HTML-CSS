<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="images/icon.png">
    <title>Nouvelle annonce</title>
</head>
<body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="../img/elog.webp"  width="30" height="30" class="d-inline-block align-top" alt="">
            Page D'Annonces ESA
        </a>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Ajouter une nouvelle Annonce</h1><br>
            <div class="container">
                <form action="new.php" method="POST">
                    <div class="form-group">
                        <label for="titre">Veuiller entrer votre annonce</label>
                        <input type="text" class="form-control" id="titre" name="titre">
                        <label>Sélectionnez quelle annonce vous voulez faire</label>
                        <select name="select" id="select" class="form-control">
                            <option value="Communiqué">Communiqué</option>
                            <option value="Notes de recouvrement">Notes de recouvrement</option>
                            <option value="Partenariat">Partenariat</option>
                            <option value="Rencontre entre les anciens étudiants">Rencontre entre les anciens étudiants</option>
                            <option value="Offre d'emploie">Offre d'emploie</option>
                            <option value="Others">Autres</option>
                        </select>
                        <br>

                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Auteur" name="auteur">
                            </div>
                            <div class="col">
                                <input type="email" class="form-control" placeholder="Adresse email de l'auteur" name="email">
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="contenu">Description de l'annonce</label>
                            <input type="text" class="form-control" id="contenu" name="contenu" placeholder="Entrer la description">
                        </div>

                        <button type="submit" name="submit" class="btn btn-secondary btn-lg btn-block">+ Ajouter l'annonce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <center>
            <h6 class="footer">@Gestion 2023-2024</h6>
        </center>
    </footer>
    
</body>
</html>

<?php

    require("/wamp64/www/gestion_etudiant/bd/con_bdd.php");

    if(isset($_POST['submit'])){
        $titre = $_POST['titre'];
        $select = $_POST['select'];
        $auteur = $_POST['auteur'];
        $email = $_POST['email'];
        $contenu = $_POST['contenu'];

        if(empty($titre) || empty($select) || empty($auteur) || empty($email) || empty($contenu)){
            echo "<script> alert('Veuiller remplir tous les champs avant de continuer') </script>";
        }else{
            date_default_timezone_set('Africa/Lome');
            $timestamp = time();
            $date_time = date("d-m-Y (D) H:i:s", $timestamp);

            $sql = "INSERT INTO annonce(titre, auteur, email, contenu, temps) VALUES (:titre, :auteur, :email, :contenu, :temps)";
            $stmt = $dbco->prepare($sql);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':auteur', $auteur);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':temps', $date_time);
            $stmt->execute();

            echo "<script>alert('Votre a été enregistré avec succès! Retourner vers la page d'acceuil pour observer les changements')</script>";
        }
    }

?>