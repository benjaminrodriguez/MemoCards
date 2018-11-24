<?php
    include(dirname(__FILE__).'/../vues/top_menu_vues.php');


    echo 'Mon Profil...<br/><br/>';

    //Affiche le menu du profil (change username, password, picture, supprimer son compte etc..)
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
      // SUPPRIMER SON COMPTE
      else if($_POST['menu'] === "delete_user")
      {
        // APPELLE DE LA FONCTION POUR DELETE SON COMPTE
        delete_user_delete($_SESSION['id']);
        // A SUPPRIMET JUSTE POUR TEST
        echo 'YOU ACOUNT WILL BE DELETE'
      }
      else
      {
        //Formulaire pour upload l'image du nouvelle avatar
        include(dirname(__FILE__).'/../vues/change_picture_vues.php');
        
      }

    } //Fin du menu.

    if(isset($_POST['username']))
    {
        //UPDATE dans la BDD le nouveau pseudo de l'user
        update('user', 'username', $_POST['username'], $_SESSION['id']);

        $_SESSION['username'] = $_POST['username'];
        header('Location: index.php?page=profil');
        exit;
    }

?>