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