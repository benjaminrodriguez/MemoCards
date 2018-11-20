<?php
  if (!isset($_SESSION['username']))
  {
    include(dirname(__FILE__).'/../vues/connexion_vues.html');
  }
  if (!empty($_POST['username']) && !empty($_POST['password']))
  {
    if (isset($_POST['username']) && isset($_POST['password']))
    { 
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      include("./verifyPseudoPass.php");
    }
  }
?>
