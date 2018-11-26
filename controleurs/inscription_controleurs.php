<?php
    $connect = false;

    if (!empty($_POST['username'])) {
        if (isset($_POST['password']) 
            && isset($_POST['username']) 
            && isset($_POST['date_de_naissance']) 
            && isset($_POST['sexe']) 
            && isset($_POST['region']) 
            && isset($_POST['email']))  
        {

            // HASH DE MDP
            $passhache = password_hash(htmlspecialchars($_POST['password']),  PASSWORD_DEFAULT);
            
            // PROFIL PICTURE PAR DEFAUT
            //$profil_picture = 'https://a9a7i7p4.stackpathcdn.com//wp-content/uploads/2014/03/BabyTuxSit.png';
            $profil_picture = 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/vues/img/linux.png';
            // APPEL DE LA FONCTION SQL INSCRIPTION
            inscription_insert(
                                htmlspecialchars($_POST['username']), $passhache, htmlspecialchars($_POST['date_de_naissance']),
                                'membre', htmlspecialchars($_POST['sexe']), htmlspecialchars($_POST['region']),
                                htmlspecialchars($_POST['email']), $profil_picture
                              );
            $connect = true;
            
            // APPEL DE LA FONCTION SQL INSCRIPTION HOBBIES
            if (isset($_POST['hobbies'])) 
            {
                inscription_insert_hobbies(
                    htmlspecialchars(htmlspecialchars($_POST['hobbies']))
                );
            }
        }
        // SI TOUS LES CHAMPS NE SONT PAS REMPLIS 
        else
        {   
            include(dirname(__FILE__).'/../vues/js/erreur_inscription_vues.js');
            exit;
        }
    }

    //var_dump($_POST);
    if($connect === true)
    {       
         // REDIRECTION PAGE DE CONNEXION
        header('Location: index.php?page=connexion');
        exit;
    }

    include(dirname(__FILE__).'/../vues/inscription_vues.php');
?>