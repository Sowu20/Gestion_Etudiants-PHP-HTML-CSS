<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Création d'um profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
        }

        .avatar {
            width: 200px;
            height: 200px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <?php
        require("bd/con_bdd.php");
        if (isset($_POST['submit'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $poste = $_POST['poste'];
            $entse = $_POST['entreprise'];
            $date_inscription = $_POST['date_inscription']; // Change this to match the name attribute in your HTML form
            // Check if the file was uploaded successfully
            if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                $image = $_FILES['img']['name'];
                $image_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($image_tmp, "uploads"); // upload the file to a directory
            } else {
                $image = " "; // set a default value if no file was uploaded
            }

            // Sanitize the user input using prepared statements
            $sql = "INSERT INTO membre (nom, prenom, email, poste, entreprise, date_inscription, img) VALUES (:nom, :prenom, :email, :poste, :entreprise, :date_inscription, :image)";
            $stmt = $dbco->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':poste', $poste);
            $stmt->bindParam(':entreprise', $entse);
            $stmt->bindParam(':date_inscription', $date_inscription);
            $stmt->bindParam(':image', $image);
            $stmt->execute();
            $id = $dbco->lastInsertId();
            session_start();
            $_SESSION['id_m'] = $id;

            header('Location: profil.php');
        }
    ?>

    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Ajout d'un profil</h1>
        <hr>
        <form class="form-horizontal" role="form" method="POST" action="profil_form.php" enctype="multipart/form-data">
            <div class="col-md-3">
                <div class="text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Choisir une autre photo</h6>
                    <input type="file" class="form-control" name="img" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Nom:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="Veuiller entrer votre nom" name="nom" id="nom" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Prénom:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="Veuiller entrer votre prénom" name="prenom" id="prenom" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="email" value="exemple@gmail.com" name="email" id="email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Poste:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="Veuiller entrer votre poste" name="poste" id="poste" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Entreprise:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="Veuiller entrer votre entreprise" name="entreprise" id="entreprise" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Date D'Inscription:</label>
                <div class="col-lg-8">
                    <input class="form-control mb-3" type="date" value="Veuiller entrer votre date d'inscription" name="date_inscription" id="date_inscription" required>
                </div>
            </div>
            <button class="w-70 btn btn-lg btn-primary" type="submit" name="submit">Créer le profil</button>
        </form>
    </div>
    </div>
    <hr>

</body>

</html>