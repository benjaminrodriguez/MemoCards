
<?php
    session_start();
    require('Controllers/controllers.php');

    
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        if ($_GET['page'] == 'connection')
        {
            if(isset($_SESSION['username']))  header('Location: index.php?page=home');
            else connection();
        }
        elseif ($_GET['page'] == 'home') 
        {
            home();
        }
        elseif ($_GET['page'] == 'inscription')
        {
            inscription();
        }
        elseif ($_GET['page'] == 'profile')
        {
            my_profile();
        }        
        elseif ($_GET['page'] == 'stats')
        {
            my_stats();
        }
        elseif ($_GET['page'] == 'store')
        {
            cards_store();
        }
        elseif ($_GET['page'] == 'forum')
        {
            forum();
        }
        elseif ($_GET['page'] == '')
        {
            
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