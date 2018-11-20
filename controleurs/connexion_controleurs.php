<?php
  if (!isset($_SESSION['username']))
  {
    include(dirname(__FILE__).'/../vues/connexion_vues.php');
  }
  // ON VERIFIE PSEUDO ET PASSWORD
  if (!empty($_POST['username']) && !empty($_POST['password']))
  {
    if (isset($_POST['username']) && isset($_POST['password']))
    { 
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      include(dirname(__FILE__).'/../modeles/verify_pseudo_pass_modeles.php');
      // ON DEFINIT LES SUPERGLOBALES DE SESSIONS
      $_SESSION['id']=$resultat['id'];
      $_SESSION['username']=$resultat['username'];
      $_SESSION['password']=null;
      $_SESSION['profil_picture']=$resultat['profil_picture'];
      $_SESSION['statut']=$resultat['statut'];
      $_SESSION['age']=$resultat['age'];
      include(dirname(__FILE__).'/../controleurs/accueil_controleurs.php');
    }
  }
?>
