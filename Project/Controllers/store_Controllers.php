<?php


// RECHERCHE CARDSTORE
if (isset($_GET['query']))
{
    require(dirname(__FILE__).'/../php/search_cardstore.php');
    getSearch($GET['query']);
}

if (isset($_GET['newdeck'])) {

    $test = checkstoredeckhave_SELECT($_SESSION['id'], $_GET['newdeck']);
    if (!isset($test['0'])) {
        deckdownload_INSERT($_SESSION['id'], $_GET['newdeck']);
        header('Location: index.php?page=store');
        exit();

    } else {
        header('Location: index.php?page=store&error=1');
        exit();
    }
}
$arraydeckstore = storedeck_SELECT();
$arraycat = catdeck_SELECT();
//var_dump($arraydeckstore);

require(dirname(__FILE__).'/../Views/store_Views.php');
include('./Views/template.php');


?>