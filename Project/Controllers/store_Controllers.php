<?php

    // Recupère tout les decks du card store
    $arraycat = catdeck_SELECT();
    $store_decks = store_SELECT();

// RECHERCHE CARDSTORE
/*if (isset($_GET['query']))
{
    require(dirname(__FILE__).'/../php/search_cardstore.php');
    getSearch($GET['query']);
}*/

if (isset($_GET['action']) && $_GET['action'] == 'warn' && isset($_GET['deck_id']))
{
    // ADD NOTIF
    $warn = '<a href="index.php?page=application&id='.$_GET['deck_id'].'">Ce deck a été signalé</a>';
    newnotif_INSERT($warn, $_SESSION['id']);
    header('Location: index.php?page=store');
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['deck_id']))
{
    deck_unshare_UPDATE($_GET['deck_id']);
    header('Location: index.php?page=store');
    exit();
   
}

if (isset($_POST['rechercher']))
{
    $_POST['rechercher'] = '%'.$_POST['rechercher'].'%';
    $arraydeckstore = rechercher_SELECT($_POST['rechercher']);
}
else {
    $arraydeckstore = storedeck_SELECT();
}

if (isset($_GET['newdeck'])) {

    $test = checkstoredeckhave_SELECT($_SESSION['id'], $_GET['newdeck']);
    if (!isset($test['0'])) {
        deckdownload_INSERT($_SESSION['id'], $_GET['newdeck']);
        header('Location: index.php?page=inventory');
        exit();

    } else {
        header('Location: index.php?page=store&error=1');
        exit();
    }
}



require(dirname(__FILE__).'/../Views/store_Views.php');
include('./Views/template.php');



?>