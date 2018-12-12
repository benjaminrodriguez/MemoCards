<?php

    //require_once('./Views/profile_Views.php');
    
    if (isset($_GET['action'])) {
        if ($_GET['action'] === "stat") {
            require_once('Controllers/php/stat.php');
        }
        if ($_GET['action'] === "unsub") {
            require_once('Controllers/php/unsub.php');
        }
    }
    
    /*
    // CHANGE LE PSEUDO
    require_once(dirname(__FILE__).'/php/change_username.php');

    // CHANGE LE MOT DE PASSE
    require_once(dirname(__FILE__).'/php/change_password.php');

    // CHANGE LA PHOTO DE PROFILE
    require_once(dirname(__FILE__).'/php/change_profile_picture.php');

    // CHANGE LES HOBBIES DE L'USER
    require_once(dirname(__FILE__).'/php/change_hobbies.php');

    // BOUTON DECONNECTER
    require_once('Controllers/php/disconnect.php');

    // BOUTON STATS
    require_once('Controllers/php/stat.php');

    // PAGE HTML
    require(dirname(__FILE__).'/../Views/top_menu_Views.php');
    require(dirname(__FILE__).'/../Views/profile_menu_Views.php');
    */
?>