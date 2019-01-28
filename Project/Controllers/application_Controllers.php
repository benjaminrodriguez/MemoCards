<?php
    if (isset($_GET['action']) && $_GET['action'] == 'warn' && isset($_GET['deck_id']))
    {
        // ADD NOTIF
        $warn = '<a href="index.php?page=application&id='.$_GET['deck_id'].'">Ce deck a été signalé</a>';
        newnotif_INSERT($warn, $_SESSION['id']);
        header('Location: index.php?page=application&id='.$_GET['deck_id']);
        exit();
    }
    
    if (isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['deck_id']))
    {
        deck_unshare_UPDATE($_GET['deck_id']);
        header('Location: index.php?page=store');
        exit();
       
    }

    if (isset($_GET['id']) )
    {
        $deck = deck_by_id_SELECT($_GET['id']);
        $comments = comments_application_SELECT($_GET['id']);
    } 


    if (isset($_GET['newdeck'])) {
        passed_INSERT($_SESSION['id'], $_GET['newdeck']);
        header('Location: index.php?page=inventory');
        exit();
    }





    require_once("./Views/application_Views.php");
    require_once('./Views/template_application_Views.php');

    var_dump($comments);

?>