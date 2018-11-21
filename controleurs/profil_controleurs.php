<?php
    include(dirname(__FILE__).'/../vues/top_menu_vues.php');


    echo 'Mon Profil...<br/><br/>';

    //Affiche le menu du profil (change username, password, picture, etc..)
    include(dirname(__FILE__).'/../vues/profil_menu_vues.php');
    include(dirname(__FILE__).'/../vues/disconnect_vues.php');

    //Affiche la section souhaitée par l'user :
    if (isset($_POST['menu']))
    {
      if($_POST['menu'] === "username")
      {
        include(dirname(__FILE__).'/../vues/change_username_vues.php');
      }
      else if($_POST['menu'] === "password")
      {

      }
      else
      {

      }

    } //Fin du menu.

    if(isset($_POST['username']))
    {
        $_SESSION['username'] = $_POST['username'];
        username_update($_SESSION['username'], $_SESSION['id']);
        header('Location: index.php?page=profil');
        exit;
    }

    benjamin_sql();
?>