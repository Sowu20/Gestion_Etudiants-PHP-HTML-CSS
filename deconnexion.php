<?php
  // Destroy the user session
  session_destroy();

  // Redirect to the login page
  header('Location: index.php');
  exit;
?>