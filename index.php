<?php
  session_start();
  require("bd/con_bdd.php");
  if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $password = $_POST['pwd'];

      $sql = "SELECT * FROM user WHERE email = :email AND pwd = :pwd";
      $stmt = $dbco->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':pwd', $password);
      $stmt->execute();

      $result = $stmt->fetchAll();

      if(count($result) > 0){
        // echo '<span class="loader"></span>';
          // Redirection vers la page d'accueil
          header('Location: home.php');
      } else {
          echo "Erreur de connexion";
      }
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
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

  <main class="form-signin">
    <form method="POST" action="index.php">
      <img class="mb-4" src="img/elog.webp" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        <label for="email">Adresse email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Mot de passe" required>
        <label for="pwd">Mot de passe</label>
      </div>

      <div>
        <p>Pas de compte ? <a href="inscription.php">S'inscrire</a></p>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Connexion</button>
      <p class="mt-5 mb-3 text-muted">@Gestion 2023-2024</p>
    </form>
  </main>

</body>

</html>