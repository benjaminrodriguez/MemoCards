<?php
    include(dirname(__FILE__).'/../vues/inscription_vues.php');
    
    if (isset($_POST['password']) && isset($_POST['username'])) 
    {
        // HASH DE MDP
        $passhache = password_hash($_POST['password'],  PASSWORD_DEFAULT);
        
        // APPEL DE LA FONCTION INSCRIPTION
        inscription_insert($_POST['username'], $passhache, $_POST['date_de_naissance'],'membre');

        // REDIRECTION PAGE DE CONNEXION
        header('Location: index.php?page=connexion');
        exit;
    }
?>