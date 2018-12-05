<?php
    session_start();

    // REQUIRE LES MODELES DE BDD
    require('Modeles/access_bdd.php');
    require('Modeles/modele_delete.php');
    require('Modeles/modele_insert.php');
    require('Modeles/modele_select.php');
    require('Modeles/modele_update.php');

    
    if (isset($_GET['page']) && !empty($_GET['page'])) 
    {
        if ($_GET['page'] == 'connection')
        {
            if(isset($_SESSION['username']))  header('Location: index.php?page=home');
            //connection();
            else require_once('Controllers/connection_Controllers.php');
        }
        else if ($_GET['page'] == 'home') 
        {
            //home();
            require_once('Controllers/home_Controllers.php');
        }
        else if ($_GET['page'] == 'inscription')
        {
            //inscription();
            require_once('Controllers/inscription_Controllers.php');
        }
        else if ($_GET['page'] == 'profile')
        {
            //my_profile();
            require_once('Controllers/profile_Controllers.php');
        }        
        else if ($_GET['page'] == 'store')
        {
            //cards_store();
            require_once('Controllers/store_Controllers.php');
        }
        else if ($_GET['page'] == 'forum')
        {
            //forum();
            require_once('Controllers/forum_Controllers.php');
        }
        else if ($_GET['page'] == 'inventory')
        {
            //my_inventory();
            require_once('Controllers/inventory_Controllers.php');
        }
        else if ($_GET['page'] == 'test')
        {
            //game1();
            require_once('Controllers/game_Controllers.php');
        }
        else if ($_GET['page'] == 'message')
        {
            //message();
        }
        else
        {
            header('Location: index.php?page=connection');
        }
    }
    else 
    {
        header('Location: index.php?page=connection');
    }
?>