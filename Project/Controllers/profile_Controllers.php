<?php

    if(!isset($_GET['menu']) || empty($_GET['menu'])) header('Location: index.php?page=profile&menu=username');
    
    if (isset($_GET['action'])) {
        if ($_GET['action'] === "stat") {
            require_once('Controllers/php/stat.php');
        }
        if ($_GET['action'] === "unsub") {
            require_once('Controllers/php/unsub.php');
        }
    }
    
    //Changer son pseudo 
    if(isset($_POST['menu']) && $_POST['menu'] === "username")
    {
        if(isset($_POST['username']))
        {
            trim($_POST['username']);
            if (!empty($_POST['username']))
            {

                // VERIF LONGUEUR USERNAME
                $username = ($_POST["username"]);
                if (strlen($username) > 25 || strlen($username) < 4) 
                {
                    $valide_username = false;
                }
                else 
                {
                    $valide_username = true;
                }
                if ($valide_username)
                {
                    
                    //UPDATE dans la BDD le nouveau pseudo de l'user
                    $_SESSION['username'] = htmlspecialchars($_POST['username']);
                    username_UPDATE($_SESSION['username'], intval($_SESSION['id']));
                    
                    header('Location: index.php?page=profile&menu=username');
                    exit;
                }
            }
            else 
            {
                require(dirname(__FILE__).'/../Public/js/empty_form.js');
                exit;
            }
        }
    }


    //Changer son password :
    if(isset($_POST['menu']) && $_POST['menu'] === "password")
    {
        if(isset($_POST['old_password']) && isset($test_new_password))
        { 

            // ENLEVE LES ESPACES DEBUT ET FIN
            $_POST['old_password'] = trim($_POST['old_password']);
            if (!empty($_POST['old_password']))
            {

                // VERIF LONGUEUR PASSWORD
                $password = $test_new_password;
                if (strlen($password) < 6 || strlen($password) > 255 ) 
                {
                    $valide_password = false;
                }
                else 
                {
                    $valide_password = true;
                }

                // VERIFICATION CARACTERE PASSWORD
                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $password))
                {
                    $conforme_password = true;
                }
                else 
                {
                    $conforme_password = false;
                }	
                if ($valide_password && $conforme_password)
                {

                    //Vérifie si le password actuel entré est correcte
                    $password = password_SELECT($_SESSION['id']);
                    $password = $password['password'];
                    $test_old_password = false;
                    $error = '';
                    password_verify(htmlspecialchars($_POST['old_password']), $password)? $test_old_password = true : $_SESSION['error'] = 'Le mot de passe actuel entré n\'est pas le bon.';

                    //Vérifie si les 2 new_password entrés sont semblabes
                    $test_new_password = false;
                    ($_POST['new_password1']===$_POST['new_password2'])? $test_new_password = true : $_SESSION['error'] = 'Les nouveaux mots de passe ne sont pas identique.' ;

                    //Si tout est bon : change le mot de passe
                    if($test_old_password===true && $test_new_password===true)
                    {
                        
                        $new_password = password_hash(htmlspecialchars($_POST['new_password1']), PASSWORD_BCRYPT);
                        password_UPDATE($new_password, intval($_SESSION['id']));
                        $_SESSION['error'] = "Votre mot de passe à été modifier avec succès.";
                    }
                }
            }
            else 
            {
                require(dirname(__FILE__).'/../Public/js/empty_form.js');
                exit;
            }
        }
    }


    //Changer son avatar :
    if(isset($_POST['profile_picture']))
    {

        // ENLEVE LES ESPACES DEBUT ET FIN
        $_POST['profile_picture'] = trim($_POST['profile_picture']);
        if (!empty($_POST['profile_picture']))
        {
            if (strlen($password) < 255) 
            {
                picture_UPDATE(htmlspecialchars($_POST['profile_picture']), intval($_SESSION['id']));
                $_SESSION['profile_picture'] = htmlspecialchars($_POST['profile_picture']);
                header('Location: index.php?page=profile');
                exit;
            }
            else 
            {
                require(dirname(__FILE__).'/../Public/js/pp_length.js');
            }
        }
        else 
        {
            require(dirname(__FILE__).'/../Public/js/empty_form.js');
            exit;
        }
    }
    //else $error = 'Un problème est survenu lors du changement de l\'avatar';
        

    if (isset($_POST['hobbies'])) 
    {
        inscription_insert_hobbies_one(htmlspecialchars($_POST['hobbies']));
        inscription_insert_hobbies_two($_SESSION['id']);
        //require(dirname(__FILE__).'/../Public/js/create_account.js');
        exit;
    }



    /*
    // BOUTON DECONNECTER
    require_once('Controllers/php/disconnect.php');

    // BOUTON STATS
    require_once('Controllers/php/stat.php');

    // PAGE HTML

    require(dirname(__FILE__).'/../Views/profile_menu_Views.php');
    */

    
    $title = 'Mon profile';
    require_once('./Views/profile_menu_Views.php');
    require_once('./Views/template_profile.php');


?>