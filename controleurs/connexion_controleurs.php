<?php
 if (!isset($_SESSION['username']))
  {
    include(dirname(__FILE__).'/../vues/connexion_vues.php');
  }
  else 
  {
    header('Location: index.php?page=accueil');
    exit;
  }

  

 
  
?>
