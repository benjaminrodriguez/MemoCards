<?php

    if(isset($_POST['password']))
    {
        $passhache = password_hash($_POST['password'],  PASSWORD_DEFAULT);

        require(dirname(__FILE__).'/../Controllers/php/pp_random.php');
        require(dirname(__FILE__).'/../Controllers/php/verif_inscription.php');

        if ($valide_email == true 
        && $valide_password == true 
        && $conforme_password == true 
        && $valide_username == true
        && $lengt_email == true
        && $common_password == false
        && $date_naissance == true) 
        {
            // APPEL DE LA FONCTION SQL INSCRIPTION
            inscription_INSERT($_POST['username'], $passhache, $_POST['date_de_naissance'],
                                'membre', $_POST['sex'], $_POST['region'],
                                $_POST['email'], $profile_picture
                                );
            //require(dirname(__FILE__).'/../Controllers/php/mail_auto.php');
            //mail_auto_inscription();
            //send_mail();
            require(dirname(__FILE__).'/../Public/js/create_account.js');
        }
        
        // VERIFICATION INSCRIPTION
        else if (isset($valide_email) && $valide_email == false)
        {
            require(dirname(__FILE__).'/../Public/js/invalide_email.js');
        }
        else if (isset($valide_password) && $valide_password == false)
        {
            require(dirname(__FILE__).'/../Public/js/invalide_password.js');
        }
        else if (isset($conforme_password) && $conforme_password == false)
        {
            require(dirname(__FILE__).'/../Public/js/conforme_password.js');
        }
        else if (isset($valide_username) && $valide_username == false)
        {
            require(dirname(__FILE__).'/../Public/js/username_length.js');
        }
        else if (isset($lengt_email) && $lengt_email == false)
        {
            require(dirname(__FILE__).'/../Public/js/username_length.js');
        }
        else if (isset($common_password) && $common_password == true)
        {
            require(dirname(__FILE__).'/../Public/js/common_password.js');
        }
        else if (isset($date_naissance) && $date_naissance == false)
        {
            require(dirname(__FILE__).'/../Public/js/bad_birthdate.js');
        }


    }

    require(dirname(__FILE__).'/../Views/inscription_Views.php');
?>