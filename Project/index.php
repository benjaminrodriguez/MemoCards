<?php
    session_start();
    require('Controllers/controllers.php');
    require('Controllers/quest_controleurs.php');

    
    if (isset($_GET['page']) && !empty($_GET['page'])) 
    {
        if ($_GET['page'] == 'connection')
        {
            if(isset($_SESSION['username']))  header('Location: index.php?page=home');
            else connection();
        }
        else if ($_GET['page'] == 'home') 
        {
            home();
        }
        else if ($_GET['page'] == 'inscription')
        {
            inscription();
        }
        else if ($_GET['page'] == 'profile')
        {
            my_profile();
        }        
        else if ($_GET['page'] == 'stats')
        {
            my_stats();
        }
        else if ($_GET['page'] == 'store')
        {
            cards_store();
        }
        else if ($_GET['page'] == 'forum')
        {
            forum();
        }
        else if ($_GET['page'] == 'inventory')
        {
            my_inventory();
        }
        else if ($_GET['page'] == 'test')
        {
            game1();
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













    /*if (isset($_GET['page'])) {
        switch ($_GET['page']) {

            case 'accueil':
                
                break;

            case 'connetion':
                connection();
                break;

            case 'inscription':
                home($_SESSION['id']);
                break;
        }
    }else 
    {
        if (!isset($_SESSION['name'])) {
            require('./Views/connection_Views.php');
        } else {
            header('Location:index.php?page=accueil');
        }
    }*/
?>