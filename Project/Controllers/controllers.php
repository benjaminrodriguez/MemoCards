<?php
/*
    //require(dirname(__FILE__).'/../Modeles/modeles.php');
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
                $_SESSION['status'] = $data['status'];
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
        //var_dump($_SESSION);
        //SI L'UTILISATEUR N'EST PAS CONNECTE, IL EST REDIRIGER VERS LA PAGE DE CONNEXION
        if (!isset($_SESSION['username']))
        {
          header('Location: index.php?page=connection');
          exit;
        } 
    
        disconnect();
        
        if (!isset($_POST['menu']))
        {
            $req = last_deck_play_SELECT($_SESSION['id']);
            $datas = $req->fetchAll();
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
            $passhache = password_hash($_POST['password'],  PASSWORD_DEFAULT);

            require(dirname(__FILE__).'/../Controllers/php/pp_random.php');
            require(dirname(__FILE__).'/../Controllers/php/verif_inscription.php');

            if (isset($valide_email) && $valide_email == true) 
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
        //header('Location: index.php?page=connection');
            }
            else if (isset($valide_email) && $valide_email == false)
            {
                require(dirname(__FILE__).'/../Public/js/invalide_email.js');
            }
        }

        require(dirname(__FILE__).'/../Views/inscription_Views.php');
    }
    
    //-----------------------------------------------------------------------------------------

    function my_profile()
    {
        require_once(dirname(__FILE__).'/php/change_username.php');
        require_once(dirname(__FILE__).'/php/change_password.php');
        require_once(dirname(__FILE__).'/php/change_profile_picture.php');
        require_once(dirname(__FILE__).'/php/change_hobbies.php');

        disconnect();
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        require(dirname(__FILE__).'/../Views/profile_menu_Views.php');
        
    }
        
    //-----------------------------------------------------------------------------------------

    function my_stats()
    {
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');
        if (!isset($_POST['deckstat'])) 
        {
            $req = last_deck_play_SELECT($_SESSION['id']);
            $datas = $req->fetchAll();
            require(dirname(__FILE__).'/../Views/statchoice_Views.php');
            
        }
        else 
        {
            //echo $_POST["deckstat"];
            $q = questforstat_SELECT($_POST["deckstat"]);
            require(dirname(__FILE__).'/../Views/stataff_Views.php');
        }
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
       
        if (isset($_GET['id'])) 
        {
            $_SESSION['subject_id'] = intval($_GET['id']);
            // ON ECRIT MESSAGE DANS SUJET
            require_once(dirname(__FILE__).'/php/write_topic.php');

            // AFFICHE LE CONTENU DU SUJET
            first_messages_subject_SELECT($_GET['id']);

            // AFFICHE MESSAGES D'UN SUJET
            $print_message = messages_subject_SELECT(intval($_GET['id']));
            foreach ($print_message as $key => $value) 
            {
                require(dirname(__FILE__).'/../Views/forum_affichage_message.php');
            }
     
        }
        
        // SUPPRIMER UN MESSAGE DONT ON EST L'AUTEUR
        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] == 'delete_message') 
        {
            echo 'coucou';
            require_once(dirname(__FILE__).'/php/delete_message.php');
        }

        require(dirname(__FILE__).'/../Views/forum_Views.php');
        
        

    }


    //-----------------------------------------------------------------------------------------

    function my_inventory()
    {
        // AFFICHE LA PAGE DE BASE
        //require(dirname(__FILE__).'/php/inventory.php');
        require(dirname(__FILE__).'/../Views/top_menu_Views.php');

        // AFFICHE LES 3 DECKS LES PLUS UTILISER PAR L'USER
        if (!isset($_GET['action'])) {
            
            $req = last_deck_play_SELECT($_SESSION['id']);
            $datas = $req->fetchAll();
            require(dirname(__FILE__).'/../Views/inventory_Views.php');

        } 
        else if ($_GET['action'] == 'create_deck') {

            // CREATION DU DECK
            $req = categories_SELECT();
            $categories = $req->fetchAll();
            require(dirname(__FILE__).'/../Views/create_deck_Views.php');
        } 
        else if ($_GET['action'] == 'create_questions') {

            // INSERTION DU DECK DANS LA BDD

            if (empty($_POST['picture'])) $_POST['picture'] = './Public/img/appareil_photo.jpg';
            new_deck_INSERT($_POST['title'], $_POST['description'], $_SESSION['id'], $_POST['picture'], $_POST['categorie']);
            $req = deck_id_SELECT($_POST['title']);
            $deck_id = $req->fetch();
            new_passed_INSERT($_SESSION['id'], $deck_id['id']);




            // CREATIONS DE 10 QUESTIONS MINIMUMS POUR LE DECK
            require(dirname(__FILE__).'/../Views/create_questions_Views.php');
        }
        
    }


    //-----------------------------------------------------------------------------------------

    function game1()
    {
        $_POST['deck'] = 2;

        if (isset($_POST['start'])) {
            $_SESSION['deck'] = $_POST['deck'];
        }
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
                ame_end();
            }
        }
    }

    function message ()
    {
        // CA ARRIVE BIENTOT NRV
        $action = (isset($_GET['action']))?$_GET['action']:''; //On récupère la valeur de la variable $action
        
        switch($action)
        {
        case "consulter": //1er cas : on veut lire un mp
        //Ici on a besoin de la valeur de l'id du mp que l'on veut lire
        break;
        
        case "nouveau": //2eme cas : on veut poster un nouveau mp
        //Ici on a besoin de la valeur d'aucune variable :p
        break;
        
        case "repondre": //3eme cas : on veut répondre à un mp reçu
        //Ici on a besoin de la valeur de l'id du membre qui nous a posté un mp
        break;
        
        case "supprimer": //4eme cas : on veut supprimer un mp reçu
        //Ici on a besoin de la valeur de l'id du mp à supprimer
        break;
        
        default; //Si rien n'est demandé ou s'il y a une erreur dans l'url, on affiche la boite de mp.
        
        } //fin du switch<
    }
    */
?>

