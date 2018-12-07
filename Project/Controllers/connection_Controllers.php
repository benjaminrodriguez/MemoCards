<?php

    if(isset($_POST['username']) && isset($_POST['password'])) 
    {
        
        // Ma clé privée
        $secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";

        // Paramètre renvoyé par le recaptcha
        $response = $_POST['g-recaptcha-response'];
        
        // On récupère l'IP de l'utilisateur
        $remoteip = $_SERVER['REMOTE_ADDR'];
        
        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
            . $secret
            . "&response=" . $response
            . "&remoteip=" . $remoteip ;
        
        $decode = json_decode(file_get_contents($api_url), true);
        
        if ($decode['success'] == true) 
        {
            // C'est un humain
            
            //RECUPERE LES DONNEES DE L'USER
            $data = connection_SELECT($_POST['username']);
            sleep(1);

            if (password_verify($_POST['password'], $data['password']))
            { 
                // ON DETRUIT LE POST PASSWORD
                unset($_POST['password']);

                // STOCKAGE VARIABLE SESSION
                $_SESSION['id'] = intval($data['id']);
                $_SESSION['username'] = $data['username'];
                $_SESSION['status'] = $data['status'];
                $_SESSION['birth_date'] = $data['birth_date'];
                $_SESSION['region'] = $data['region'];
                $_SESSION['sex'] = $data['sex'];
                $_SESSION['profile_picture'] = $data['profile_picture'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

                header('Location: index.php?page=home');
                exit;
            } 
            else
            {
                require(dirname(__FILE__).'/../Public/js/erreur_auth.js');
            }
        }
        else 
        {
            // C'est un robot ou le code de vérification est incorrecte
            header('Location: index.php?page=connection');
        }
    }  
    require(dirname(__FILE__).'/../Views/connection_Views.php');
?>