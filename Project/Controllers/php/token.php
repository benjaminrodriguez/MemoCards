<?php

    // REMPLACEMENT DE TICKET PAR VERSION POUR NE PAS ATTIRER L'OEIL
    // VERIFICATION QUE LE NAVIGATEUR ACCEPTE COOKIES
    setcookie($name, $value, $time);

    if(!isset($_COOKIE[$name])) 
    {
        require(dirname(__FILE__).'/../Public/js/not_cookies.js');
    }
    $cookie_name = "version";

    // On génère quelque chose d'aléatoire
    $version = session_id().microtime().rand(0,9999999999);

    // on hash pour avoir quelque chose de propre qui aura toujours la même forme
    $version = hash('sha512', $version);

    // On enregistre des deux cotés
    setcookie($cookie_name, $version, time() + (60 * 20)); // EXPIRE AU BOUT DE 20 minutes
    $_SESSION['version'] = $version;


    if (isset($_COOKIE['version']) && $_COOKIE['version'] == $_SESSION['version'])
    {
        // C'est reparti pour un tour
        $version = session_id().microtime().rand(0,9999999999);
        $version = hash('sha512', $version);
        $_COOKIE['version'] = $version;
        $_SESSION['version'] = $version;
    }
    else
    {
        // ON DETRUIT LA SESSION
        $_SESSION = array();
        session_destroy();
        header('location:index.php');
    }
?>