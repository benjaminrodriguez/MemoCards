<?php
    include(dirname(__FILE__).'/../vues/inscription_vues.php');
    
    // HASH DE MDP
    $passhache = password_hash($_POST['password'],  PASSWORD_DEFAULT);

    // APPEL DE LA FONCTION INSCRIPTION
    inscription ($_POST['username'],$_POST['password'],$_POST['date_de_naissance'],'membre');

    // REDIRECTION PAGE DE CONNEXION
    header('Location: index.php?page=connexion');
    exit;
?>