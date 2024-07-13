<!doctype html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="images/icon.png">
    <title>Autres</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="images/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Page D'Annonces ESA
        </a>
    </nav>
    
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Annonces :  Autres</h1>
            <nav class="navbar navbar-expand-sm navbar-light">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Tout <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="comu.php">Communiqué</a>
                    <a class="nav-item nav-link" href="notes.php">Notes de recouvrement</a>
                    <a class="nav-item nav-link" href="part.php">Partenariat</a>
                    <a class="nav-item nav-link" href="meet.php">Rencontre entre les anciens étudiants</a>
                    <a class="nav-item nav-link" href="offre.php">Offre d'emploie</a>
                    <a class="nav-item nav-link" href="others.php">Autres</a>
                    <a class="nav-item nav-link" href="#"></a>
                </div>
            </nav>

            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"></div>
                <div class="p-2 bd-highlight">
                    <a class="btn btn-primary btn-info" href="new.php" role="button">+ Nouveau Annonce</a>
                </div>
                <div class="ml-auto p-2 bd-highlight"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">Annonces</th>
                    <th scope="col">Types d'annonce</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Date/Heure</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    require("/wamp64/www/gestion_etudiant/bd/con_bdd.php");
                    $titre = 'Others';

                    $sql = "SELECT * FROM annonce WHERE titre = :titre ORDER BY id DESC";
                    $stmt = $dbco->prepare($sql);
                    $stmt->bindParam(':titre', $titre);
                    $stmt->execute();
                    $forums = $stmt->fetchAll();

                    if(count($forums) > 0) {
                        foreach($forums as $annonce) {
                            $sql_comments = "SELECT COUNT(com) AS nb_comments FROM commentaire WHERE annonce_id = :annonce_id";
                            $stmt_comments = $dbco->prepare($sql_comments);
                            $stmt_comments->bindParam(':annonce_id', $annonce['id']);
                            $stmt_comments->execute();
                            $nb_comments = $stmt_comments->fetchColumn();

                            echo "<tr>
                                <td><a href=\"new.php?id={$annonce['id']}\" class=\"text-dark\">{$annonce['titre']}</a></td>
                                <td>{$annonce['contenu']}</td>
                                <td>$nb_comments</td>
                                <td>{$annonce['temps']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td>Aucune annonce trouvé</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>";
                    }

                ?>
            </tbody>
        </table>
    </div>
    <br><br><br>

    <footer>
        <center>
            <h6 class="footer">@Gestion 2023-2024</h6>
        </center>
    </footer>
   
  </body>
</html>