<?php

    if(isset($_POST['password']))
    {
        $passhache = password_hash(htmlspecialchars($_POST['password']),  PASSWORD_DEFAULT);

        require(dirname(__FILE__).'/../Controllers/php/pp_random.php');
        require(dirname(__FILE__).'/../Controllers/php/verif_inscription.php');

        if (isset($valide_email) && $valide_email == true) 
        {
            // APPEL DE LA FONCTION SQL INSCRIPTION
            inscription_INSERT(htmlspecialchars($_POST['username']), $passhache, htmlspecialchars($_POST['date_de_naissance']),
                                'membre', htmlspecialchars($_POST['sex']), htmlspecialchars($_POST['region']),
                                htmlspecialchars($_POST['email']), htmlspecialchars($profile_picture)
                                );
            //require(dirname(__FILE__).'/../Controllers/php/mail_auto.php');
            //mail_auto_inscription();
            //send_mail();
            require(dirname(__FILE__).'/../Public/js/create_account.js');
            //header('Location: index.php?page=connection');
        }
        else if (isset($valide_email) && $valide_email == false)
        {
            require(dirname(__FILE__).'/../Public/js/invalide_email.js');
        }
    }

    require(dirname(__FILE__).'/../Views/inscription_Views.php');

?>