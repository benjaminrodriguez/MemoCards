<?php

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