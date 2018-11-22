<?php
    include(dirname(__FILE__).'/../vues/inscription_vues.php');
    if (!empty($_POST['username'])) {
        if (isset($_POST['password']) 
            && isset($_POST['username']) 
            && isset($_POST['date_de_naissance']) 
            && isset($_POST['hobbies']) 
            && isset($_POST['sexe']) 
            && isset($_POST['state']) 
            && isset($_POST['email']))  
        {
            // HASH DE MDP
            $passhache = password_hash($_POST['password'],  PASSWORD_DEFAULT);
            
            // ON CHANGER L\'APPELATION DU SEXE
            if ($_POST['sexe'] === 'homme')
            {
                $sexe = 'M';
            }
            else if ($_POST['sexe'] === 'femme')
            {
                $sexe = 'F';
            }

            // APPEL DE LA FONCTION INSCRIPTION
            inscription_insert(
                                $_POST['username'], $passhache, $_POST['date_de_naissance'],'membre', 
                                $sexe, $_POST['hobbies'], $_POST['state'], $_POST['email']
                              );

            // REDIRECTION PAGE DE CONNEXION
            header('Location: index.php?page=connexion');
            exit;
        }
        // SI TOUS LES CHAMPS NE SONT PAS REMPLIS 
        else
        {   
            include(dirname(__FILE__).'/../vues/js/erreur_inscription_vues.js');
            exit;
        }
    }
?>