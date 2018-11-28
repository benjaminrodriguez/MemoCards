<?php
    include(dirname(__FILE__).'/../vues/top_menu_vues.php');


    echo 'Mon Profil...<br/><br/>';

    //Affiche le menu du profil (change username, password, picture, supprimer son compte etc..)
    include(dirname(__FILE__).'/../vues/profil_menu_vues.php');
    //include(dirname(__FILE__).'/../vues/disconnect_vues.php');
    disconnect();

    //Affiche la section souhaitée par l'user :
    if (isset($_POST['menu']))
    {
        //Changer son pseudo :
        if($_POST['menu'] === "username")
        {
            if(isset($_POST['username']))
            {
            //UPDATE dans la BDD le nouveau pseudo de l'user
            UPDATE('user', 'username', $_POST['username'], $_SESSION['id']);
        
            $_SESSION['username'] = $_POST['username'];
            header('Location: index.php?page=profil');
            exit;
            }
            include(dirname(__FILE__).'/../vues/change_username_vues.php');
        }

        else if($_POST['menu'] === "password")
        {
            //Changer son password :
            include(dirname(__FILE__).'/../vues/change_password_vues.php');

            if(isset($_POST['old_password'])) 
            { 
                //Vérifie si le password actuel entré est correcte
                $password = password_SELECT($_SESSION['id']);
                $password = $password['password'];
                $test_old_password = false;
                $error = '';
                password_verify($_POST['old_password'], $password)? $test_old_password = true : $error = 'Le mot de passe actuel entré n\'est pas le bon.';

                //Vérifie si les 2 new_password entrés sont semblabes
                $test_new_password = false;
                ($_POST['new_password1']===$_POST['new_password2'])? $test_new_password = true : $error = 'Les nouveaux mots de passe ne sont pas identique.' ;

                //Si tout est bon : change le mot de passe
                if($test_old_password===true && $test_new_password===true)
                {
                    $new_password = password_hash(htmlspecialchars($_POST['new_password1']), PASSWORD_BCRYPT);
                    password_UPDATE($new_password, $_SESSION['id']);
                    $change_password = 'ok';
                }

                include(dirname(__FILE__).'/../vues/change_password_vues.php');

            }

        }
        else if($_POST['menu'] === "delete_user")
        {
            //Supprimer son compte :
            delete_user_delete($_SESSION['id']);
        }
    
        else
        {
            $error = NULL;
            //Changer son avatar :
            if(isset($_POST['profil_picture']))
            {
                picture_UPDATE($_POST['profil_picture'], intval($_SESSION['id']));
                $_SESSION['profil_picture'] = htmlspecialchars($_POST['profil_picture']);
            }
            //else $error = 'Un problème est survenu lors du changement de l\'avatar';

            include(dirname(__FILE__).'/../vues/change_picture_vues.php');
        }

    } //Fin du menu.



?>
