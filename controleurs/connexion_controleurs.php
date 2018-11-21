<?php
  if (!isset($_SESSION['username']))
  {
    include(dirname(__FILE__).'/../vues/connexion_vues.php');
  }
  else 
  {
    include(dirname(__FILE__).'/../vues/erreur404.html');
    exit;
  }
  // ON VERIFIE PSEUDO ET PASSWORD
  if (!empty($_POST['username']) && !empty($_POST['password']))
  {
    if (isset($_POST['username']) && isset($_POST['password']))
    { 
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      //include(dirname(__FILE__).'/../modeles/verify_pseudo_pass_modeles.php');
      connexion($_POST['username'], $_POST['password']);
      $isPasswordCorrect = password_verify($_SESSION['password'], $resultat['password']);


      // ON DEFINIT LES SUPERGLOBALES DE SESSIONS
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['username'] = $resultat['username'];
      $_SESSION['profil_picture']=$resultat['profil_picture'];
      $_SESSION['statut'] = $resultat['statut'];
      $_SESSION['age'] = $resultat['age'];
      if ($isPasswordCorrect) 
      {
      header('Location: index.php?page=accueil');
      exit;
      }
      else 
      {
        include(dirname(__FILE__).'/../js/erreur_auth.js');
        exit;
      }
    }
    else 
    {
      include(dirname(__FILE__).'/../vues/erreur404.html');
      exit;
    }
  }
?>
