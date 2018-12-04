<?php

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

    // PAGE HTML
    require(dirname(__FILE__).'/../Views/top_menu_Views.php');
    require(dirname(__FILE__).'/../Views/profile_menu_Views.php');

?>