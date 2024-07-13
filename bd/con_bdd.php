<?php
    $servername = "localhost"; 
    $database = "gestion"; 
    $username = "root"; 
    $password = "";
    $sql = "mysql:host=$servername;dbname=$database;";
    $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {
        $dbco = new PDO($sql, $username, $password, $dsn_Options);
        // echo "Connexion réussie";
    } catch(PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    }
?>