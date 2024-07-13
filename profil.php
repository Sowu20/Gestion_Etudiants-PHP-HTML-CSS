<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Profil</title>
</head>
<body>

    <?php
        session_start();
        // Connexion à la base de données
        require("bd/con_bdd.php");

        // Récupération de l'ID de l'membre connecté
        $id = $_SESSION['id_m'];
        
        // Récupération de l'ID de l'membre connecté
        $sql = "SELECT * FROM membre WHERE id_m = :id_m";
        $stmt = $dbco->prepare($sql);
        if ($stmt === false) {
            // Handle the error
            echo "Erreur lors du traitement de la requête";
            exit;
        }
        $stmt->bindParam(':id_m', $id);
        if ($stmt->execute() === false) {
            // Handle the error
            echo "Erreur d'exécution";
            exit;
        }
        $membre = $stmt->fetch();

       // Définition des variables pour afficher les valeurs des champs de formulaire
        $image = isset($membre['img'])? $membre['img'] : '';
        $nom = isset($membre['nom'])? $membre['nom'] : '';
        $prenom = isset($membre['prenom'])? $membre['prenom'] : '';
        $email = isset($membre['email'])? $membre['email'] : '';
        $poste = isset($membre['poste'])? $membre['poste'] : '';
        $entse = isset($membre['entreprise'])? $membre['entreprise'] : '';
        $date_inscription = isset($membre['date_inscription'])? $membre['date_inscription'] : '';

    ?>

    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Profil</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    <?php if (!empty($image)) {?>
                        <img src="uploads/<?php echo $image;?>" class="avatar img-circle img-thumbnail" alt="avatar">
                    <?php } else {?>
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <?php }?>
                </div>
            </div>
            
            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <h3>Info Personnelles</h3>
                <ul class="list-group">
                    <li class="list-group-item">Nom: <?php echo $nom;?></li>
                    <li class="list-group-item">Prénom: <?php echo $prenom;?></li>
                    <li class="list-group-item">Email: <?php echo $email;?></li>
                    <li class="list-group-item">Poste: <?php echo $poste;?></li>
                    <li class="list-group-item">Entreprise: <?php echo $entse;?></li>
                    <li class="list-group-item">Date d'inscription: <?php echo $date_inscription;?></li>
                </ul>
            </div>
        </div>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>