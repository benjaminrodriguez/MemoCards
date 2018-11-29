<?php
    require(dirname(__FILE__).'/../Modeles/modeles.php');

    function connection()
    {
        if(isset($_POST['username']) && isset($_POST['password'])) 
        {
            //RECUPERE LES DONNEES DE L'USER
            $data = connection_SELECT($_POST['username']);

            if (password_verify($_POST['password'], $data['password']))
            { 
                // STOCKAGE VARIABLE SESSION
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['statut'] = $data['statut'];
                $_SESSION['birth_date'] = $data['birth_date'];
                $_SESSION['region'] = $data['region'];
                $_SESSION['sex'] = $data['sex'];
                $_SESSION['profile_picture'] = $data['profile_picture'];
                $_SESSION['email'] = $data['email'];

                header('Location: index.php?page=home');
                exit;
            } 
            else
            {
                require(dirname(__FILE__).'/../Public/js/erreur_auth.js');
            }
        }
        require(dirname(__FILE__).'/../Views/connection_Views.php');
    }

    //-----------------------------------------------------------------------------------------

    function home()
    {
        var_dump($_SESSION);
        //SI L'UTILISATEUR N'EST PAS CONNECTE, IL EST REDIRIGER VERS LA PAGE DE CONNEXION
        if (!isset($_SESSION['username']))
        {
          header('Location: index.php?page=connection');
          exit;
        } 
    
    
        if (!isset($_POST['menu']))
        {
            require(dirname(__FILE__).'/../Views/home_Views.php');
        }
        else if ($_POST['menu'] === 'profile')
        {
            header('Location: index.php?page=profile');
            exit;
        }
            else if ($_POST['menu'] === 'stats')
        {
            header('Location: index.php?page=stats');
            exit;
        }
            else if ($_POST['menu'] === 'inventory')
        {
            header('Location: index.php?page=inventory');
            exit;
        }
            else if ($_POST['menu'] === 'store')
        {
            header('Location: index.php?page=store');
            exit;
        }
            else if ($_POST['menu'] === 'forum')
        {
            header('Location: index.php?page=forum');
            exit;
        }

        disconnect();
    }

    //-----------------------------------------------------------------------------------------

    function disconnect()
    {
        require(dirname(__FILE__).'/../Views/disconnect_Views.php');

        if(isset($_POST['disconnect']))
        {
            session_unset();
            session_destroy();
            session_write_close();
            //include(dirname(__FILE__).'/../vues/js/disconected_vues.js');
            header('Location: index.php');
            exit;
        }
    }

    //-----------------------------------------------------------------------------------------

    function inscription()
    {
        if(isset($_POST['password']))
        {
            $passhache = password_hash(htmlspecialchars($_POST['password']),  PASSWORD_DEFAULT);
            $profile_picture = htmlspecialchars('https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/linux.png');

            // APPEL DE LA FONCTION SQL INSCRIPTION
            inscription_INSERT( htmlspecialchars($_POST['username']), $passhache, htmlspecialchars($_POST['date_de_naissance']),
                                'membre', htmlspecialchars($_POST['sex']), htmlspecialchars($_POST['region']),
                                htmlspecialchars($_POST['email']), $profile_picture
                            );

            if (isset($_POST['hobbies']))   inscription_INSERT_hobbies( htmlspecialchars(htmlspecialchars($_POST['hobbies'])) );
            require(dirname(__FILE__).'/../Public/js/create_account.js');
            header('Location: index.php?page=connection');
            exit;
        }

        require(dirname(__FILE__).'/../Views/inscription_Views.php');
    }
    
    //-----------------------------------------------------------------------------------------

    function my_profile()
    {
        change_username();
        change_password();
        change_profile_picture();
        disconnect();
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        require(dirname(__FILE__).'/../Views/profile_menu_Views.php');
        
    }
        
    //-----------------------------------------------------------------------------------------

    function change_username()
    {
        //Changer son pseudo :
        if(isset($_POST['menu']) && $_POST['menu'] === "username")
        {
            if(isset($_POST['username']))
            {
            //UPDATE dans la BDD le nouveau pseudo de l'user
            $_SESSION['username'] = htmlspecialchars($_POST['username']);
            username_UPDATE($_SESSION['username'], $_SESSION['id']);
            
            header('Location: index.php?page=profile');
            exit;
            }
        }
    }

    //-----------------------------------------------------------------------------------------

    function change_password()
    {
        //Changer son password :
        if(isset($_POST['menu']) && $_POST['menu'] === "password")
        {
            if(isset($_POST['old_password'])) 
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
                    password_UPDATE($new_password, $_SESSION['id']);
                    $_SESSION['error'] = "Votre mot de passe à été modifier avec succès.";
                }
            }
        }
    }

    //-----------------------------------------------------------------------------------------

     function change_profile_picture()
     {
            //Changer son avatar :
            if(isset($_POST['profile_picture']))
            {
                picture_UPDATE(htmlspecialchars($_POST['profile_picture']), intval($_SESSION['id']));
                $_SESSION['profile_picture'] = htmlspecialchars($_POST['profile_picture']);
                header('Location: index.php?page=profile');
                exit;
            }
            //else $error = 'Un problème est survenu lors du changement de l\'avatar';
        
     }

    //-----------------------------------------------------------------------------------------

    function my_stats()
    {
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        echo 'Mes Stats ...';
    }

    //-----------------------------------------------------------------------------------------

    function cards_store()
    {
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        echo 'Le Cards Store ...';
    }

    //-----------------------------------------------------------------------------------------

    function forum()
    {
        $subjects = subjects_SELECT();
        create_topic();
        delete_topic();
        read_topic();
        write_topic();
        delete_message();
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        echo 'Le Forum ...';
        require(dirname(__FILE__).'/../Views/forum_Views.php');
    }

    //-----------------------------------------------------------------------------------------

    function create_topic()
    {
        // CREER UN SUJET
        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] === 'creer_sujet')
        {
            // SI LE FORM EST REMPLI
            if (isset($_POST['title']) && isset($_POST['content']))
            {
                // LORSQU'UN SUJET EST CREE IL EST OUVERT PAR DEFAUT
                $statut = 'ouvert';

                var_dump($_POST['title'], $statut, $_POST['content'], $_SESSION['id']);

                // APPEL DE LA REQ SQL
                topic_INSERT(htmlspecialchars($_POST['title']), $statut, htmlspecialchars($_POST['content']), $_SESSION['id'] );
            }
        }
    }

    //-----------------------------------------------------------------------------------------

    function delete_topic()
    {
        // SUPPRIMER UN SUJET
         if (isset($_POST['choix_forum']) && $_POST['choix_forum'] === 'supprimer_sujet')
        {
            if ($_SESSION['statut'] === 'admin')
            {
                echo 'supprimer sujet';
            }
            else 
            {
                echo 'vous n\'avez pas les droits pour cette action';
            }
        }
    }

    //-----------------------------------------------------------------------------------------

    function read_topic()
    {
        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] === 'lire_messages_sujet')
        {
            echo 'afficher tous les messages du sujet XXXX';
        }
    }

    //-----------------------------------------------------------------------------------------

    function write_topic()
    {
        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] === 'ecrire_message_sujet')
        {
            echo 'ecrire un message sur ce sujet';
        }
    }

    //-----------------------------------------------------------------------------------------

    function delete_message()
    {
        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] === 'supprimer_message_sujet')
        {
            if ($id_auteur_message === $_SESSION['id'])
            {
                echo 'message supprime';
            }
            else 
            {
                echo 'desole seul l\'auteur peut delete son message';
            }
        }
    }

    //-----------------------------------------------------------------------------------------

    function my_inventory()
    {

        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        require(dirname(__FILE__).'/../Views/inventory_Views.php');
    }

    //-----------------------------------------------------------------------------------------


?>
