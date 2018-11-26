<?php
  var_dump($_SESSION);
    //SI L'UTILISATEUR N'EST PAS CONNECTE, IL EST REDIRIGER VERS LA PAGE DE CONNEXION
    if (!isset($_SESSION['username']))
    {
      header('Location: index.php?page=connexion');
      exit;
    } else
    {

    }

    if (!isset($_POST['menu']))
    {
      include(dirname(__FILE__).'/../vues/accueil_vues.php');
    }
    else if ($_POST['menu'] === 'profil')
    {
      header('Location: index.php?page=profil');
      exit;
    }
    else if ($_POST['menu'] === 'stats')
    {
      header('Location: index.php?page=stats');
      exit;
    }
    else if ($_POST['menu'] === 'inventaire')
    {
      header('Location: index.php?page=inventaire');
      exit;
    }
    else if ($_POST['menu'] === 'store')
    {
      header('Location: index.php?page=store');
      exit;
    }
    else if ($_POST['menu'] === 'forum')
    {
      header('Location: index.php?page=forum');
      exit;
    }


    disconnect();

    //include(dirname(__FILE__).'/../vues/index_vues.php');

?>