<?php

    require(dirname(__FILE__).'/../Views/card_store_Views.php');
    
    // RECHERCHE CARDSTORE
    if (isset($GET['query']))
    {
        require(dirname(__FILE__).'/../php/search_cardstore.php');
        getSearch($GET['query']);
    }

    echo 'Le Cards Store ...';

?>