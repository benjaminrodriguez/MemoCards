<?php


// RECHERCHE CARDSTORE
if (isset($GET['query']))
{
    require(dirname(__FILE__).'/../php/search_cardstore.php');
    getSearch($GET['query']);
}

$arraydeckstore = storedeck_SELECT();
$arraycat = catdeck_SELECT();
//var_dump($arraydeckstore);

require(dirname(__FILE__).'/../Views/store_Views.php');
include('./Views/template.php');


?>