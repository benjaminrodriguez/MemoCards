<?php
    require(dirname(__FILE__).'/../Modeles/modeles.php');
    require(dirname(__FILE__).'/../Controllers/php/function_game.php');

    function connection()
    {
        if(isset($_POST['username']) && isset($_POST['password'])) 
        {
            //RECUPERE LES DONNEES DE L'USER
            $data = connection_SELECT($_POST['username']);

            if (password_verify($_POST['password'], $data['password']))
            { 
                // STOCKAGE VARIABLE SESSION
                $_SESSION['id'] = intval($data['id']);
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
            inscription_INSERT(htmlspecialchars($_POST['username']), $passhache, htmlspecialchars($_POST['date_de_naissance']),
                                'membre', htmlspecialchars($_POST['sex']), htmlspecialchars($_POST['region']),
                                htmlspecialchars($_POST['email']), $profile_picture
                              );

            if (isset($_POST['hobbies'])) 
            {
                inscription_INSERT_hobbies(htmlspecialchars($_POST['hobbies']));
                //require(dirname(__FILE__).'/../Public/js/create_account.js');
                exit;
            }
        //require(dirname(__FILE__).'/../Controllers/php/mail_auto.php');
        //mail_auto_inscription();
        header('Location: index.php?page=connection');
        }

        require(dirname(__FILE__).'/../Views/inscription_Views.php');
    }
    
    //-----------------------------------------------------------------------------------------

    function my_profile()
    {
        require_once(dirname(__FILE__).'/php/change_username.php');
        require_once(dirname(__FILE__).'/php/change_password.php');
        require_once(dirname(__FILE__).'/php/change_profile_picture.php');
        disconnect();
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        require(dirname(__FILE__).'/../Views/profile_menu_Views.php');
        
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
        // HEADER
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');

        // CREER SUJET
        if (!isset($_GET['id'])) 
        {

            // AFFICHE TOUS LES SUJETS DU FORUM
            subjects_SELECT();

            // ECRIRE UN SUJET
            require_once(dirname(__FILE__).'/php/create_topic.php');
        }

        
        // SUPPRESSION SUJET
        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] == 'delete_topic')
        {
            if ($_SESSION['statut'] == 'admin')
            {
                require_once(dirname(__FILE__).'/php/delete_topic.php');
            }
            else 
            {
                echo 'vous n\'avez pas les droits';
            }
        }
       
        // SI USER CLIQUE SUR UN SUJET, ILS S'AFFICHENT
        /*if (isset($_GET['id'])) 
        {


            //require_once(dirname(__FILE__).'/php/read_topic.php');
            //require(dirname(__FILE__).'/../Views/forum_Views.php');
        }*/
        //var_dump($_GET,$_POST);
        if (isset($_GET['id'])) 
        {

            // ON ECRIT MESSAGE DANS SUJET
            require_once(dirname(__FILE__).'/php/write_topic.php');

            // AFFICHE MESSAGES D'UN SUJET
            $print_message = messages_subject_SELECT($_GET['id']);
            foreach ($print_message as $key => $value) 
            {
                require(dirname(__FILE__).'/../Views/forum_affichage_message.php');
            }

            
        }
        
        // SUPPRIMER UN MESSAGE DONT ON EST L'AUTEUR
        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] == 'delete_message' && $_SESSION['id'] == $autor_id) 
        {
            require_once(dirname(__FILE__).'/php/delete_message.php');
        }

        
        require(dirname(__FILE__).'/../Views/forum_Views.php');
        
        

    }


    //-----------------------------------------------------------------------------------------

    function my_inventory()
    {
        $datas = affiche_deck();
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        require(dirname(__FILE__).'/../Views/inventory_Views.php');
    }

    //-----------------------------------------------------------------------------------------

    function affiche_deck()
    {
        $req = last_deck_play_SELECT($_SESSION['id']);
        $datas = $req->fetchAll();
        var_dump($datas);

        return $datas;
    }

    //-----------------------------------------------------------------------------------------

    function game1()
    {
        if (!isset($_SESSION['deck']))
        {
            game_unset();
        }
        else 
        {
            game_getprevar();

            if (isset($_POST['answer'])) 
            {
                game_answer();
            }

            if (isset($_POST['fin']))
            {
                $_SESSION['cpt'] = $_SESSION['cptall'] + 1;
            }

            if ($_SESSION['cpt'] <= intval($_SESSION['cptall']))
            {
                game_q();
            }
            else
            {
            game_end();
            }
        }
    }
?>