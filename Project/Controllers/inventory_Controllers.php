<?php

    if (isset($_GET['action']) && $_GET['action'] == 'delete_card')
    {
        // BDD : SUPPRIME LE SUCCES_RATE DE LA CARTE
        card_succes_rate_DELETE($_GET['answer']);
        // BDD : SUPPRIME LA REPONSE DE LA CARTE
        card_verso_DELETE($_GET['answer']);
        // BDD : SUPPRIME LA QUESTION DE LA CARTE
        card_recto_DELETE($_GET['question']);

        header('Location: index.php?page=inventory&action=modify&deck='.$_GET['deck'].'');
        exit();
    }

    if (isset($_POST['deck_share'])) {
        deck_share_UPDATE($_POST['deck_share']);
        header('Location: index.php?page=inventory');
        exit();
    }


    if(isset($_POST['deck_delete']))
    {
        // BDD : SUPPRIME TOUT LES CARTES DANS LA TABLE : succes_rate
        $all_id = deck_succes_rate_SELECT($_POST['deck_delete']);
        foreach($all_id as $key => $value)
        {
            deck_succes_rate_DELETE($all_id[$key]['succes_rate_id']);
        }

        // BDD : SUPPRIME TOUT LES CARTES DANS LA TABLE : verso
        $all_id = deck_verso_SELECT($_POST['deck_delete']);
        foreach($all_id as $key => $value)
        {
            deck_verso_DELETE($all_id[$key]['verso_id']);
        }

        // BDD : SUPPRIME TOUT LES CARTES DANS LA TABLE : recto
        $all_id = deck_recto_SELECT($_POST['deck_delete']);
        foreach($all_id as $key => $value)
        {
            deck_recto_DELETE($all_id[$key]['recto_id']);
        }

        // BDD : SUPPRIME TOUT LES CARTES DANS LA TABLE : comments_deck
        $all_id = deck_comments_SELECT($_POST['deck_delete']);
        foreach($all_id as $key => $value)
        {
            deck_comments_DELETE($all_id[$key]['comments_deck_id']);
        }

        // BDD : SUPPRIME TOUT LES CARTES DANS LA TABLE : hashtag_has_deck
        $all_id = deck_hashtag_SELECT($_POST['deck_delete']);
        foreach($all_id as $key => $value)
        {
            deck_hashtag_DELETE($all_id[$key]['hashtag_id']);
        }

        // BDD : SUPPRIME TOUT LES CARTES DANS LA TABLE : passed
        $all_id = deck_passed_SELECT($_POST['deck_delete']);
        foreach($all_id as $key => $value)
        {
            deck_passed_DELETE($all_id[$key]['passed_id']);
        }

        // BDD : SUPPRIME LE DECK  DANS LA TABLE : deck
        deck_final_DELETE($_POST['deck_delete']);


        //echo $_POST['deck_delete'];
        //var_dump($all_id);
        header('Location: index.php?page=inventory');
    }

    if (isset($_GET['action']) && $_GET['action'] == 'create_deck') 
    {
        // CREATION DU DECK
        $req = categories_SELECT();
        $categories = $req->fetchAll();
        require(dirname(__FILE__).'/../Views/create_deck_Views.php');
    } 

    else if (isset($_POST['modify_cards']))
    {
        // RECUPERE LA QUESTION SELECTIONNE
        $req =  question_by_id_SELECT($_GET['question']);
        $modify_question = $req->fetch();

        // RECUPERE LA REPONSE SELECTIONNE
        $req =  answer_by_id_SELECT($_GET['answer']);
        $modify_answer = $req->fetch();

        // MODIFIE LA QUESTION SI ELLE EST DIFFERENTE
        if($_POST['question'] !== $modify_question[0])   question_UPDATE($_POST['question'], $_GET['question']);

        // MODIFIE LA REPONSE SI ELLE EST DIFFERENTE
        if($_POST['answer'] !== $modify_answer[0])  answer_UPDATE($_POST['answer'], $_GET['answer']);

        header('Location: index.php?page=inventory&action=modify&deck='.$_SESSION['deck_id'].'');
        exit();
    }

    else if (isset($_POST['action']) && $_POST['action'] == 'create_questions') 
    {
            
            // ELIMINE LES ESPACES
            if (isset($_POST['title']))  $_POST['title'] = trim($_POST['title']);
            if (isset($_POST['description']))  $_POST['description'] = trim($_POST['description']);
            if (isset($_POST['picture']))  $_POST['picture'] = trim($_POST['picture']);
            if (isset($_POST['hashtags']))  $_POST['hashtags'] = trim($_POST['hashtags']);

            if (!empty($_POST['title']) && !empty($_POST['description']) )
            {
                // ATTRIBUT UNE IMAGE DE PROFIL AU DECK SI CELUI-CI N'EN POSSEDE PAS 
                if (empty($_POST['picture'])  ||  strlen($_POST['picture']) >  255) 
                {
                    $_POST['picture'] = './Public/img/appareil_photo.jpg';
                }

                // INSERTION DU DECK DANS LA BDD
                new_deck_INSERT($_POST['title'], $_POST['description'], $_SESSION['id'], $_POST['picture'], $_POST['categorie']);
                $req = deck_id_SELECT($_POST['title']);
                $deck_id = $req->fetch();
                new_passed_INSERT($_SESSION['id'], $deck_id['id']);
            }
            else 
            {
                $_SESSION['empty'] = true;
                require(dirname(__FILE__).'/../Public/js/empty_form.js');
                exit;
            }
    


        // CREATIONS DE QUESTIONS SUR LE DECK
        header('Location: index.php?page=inventory&action=modify&deck='.$deck_id['id'].'');
    }

    else if(isset($_POST['next_question']))
    {
        // AJOUTE LA NOUVELLE QUESTION DANS LA BDD
        new_question_INSERT($_POST['question'], $_SESSION['deck_id']);
        
        // AJOUTE LA NOUVELLE REPONSE DANS LA BDD
        $id_question = id_question_SELECT($_POST['question']);
        
        new_answer_INSERT($_POST['answer'], $id_question['id'] );

        // AJOUTE LA CARTE DANS LA TABLE SUCCES_CARDS DANS BDD
        $req = verso_id_SELECT($_POST['answer']);
        $verso_id = $req->fetch();
        succes_rate_INSERT($verso_id[0]);

        // REDIRECTION VERS LA CREATION DE QUESTION
        header('Location: index.php?page=inventory&action=modify&deck='.$_SESSION['deck_id'].'');
    }

    else if((isset($_GET['action']) && $_GET['action'] == 'modify'))
    {
        $_SESSION['deck_id'] = $_GET['deck'];

        // RECUPERER LES QUESTIONS DU DECK
        $req = questions_deck_SELECT(intval($_SESSION['deck_id']));
        $questions_deck = $req->fetchAll();

        // RECUPERER LES REPONSES DU DECK
        $req =  answers_deck_SELECT(intval($_SESSION['deck_id']));
        $answers_deck = $req->fetchAll();


        // MODIFIER UNE QUESTION / REPONSE
        if(isset($_GET['question']) && isset($_GET['answer']))
        {
            $req =  question_by_id_SELECT($_GET['question']);
            $modify_question = $req->fetch();

            $req =  answer_by_id_SELECT($_GET['answer']);
            $modify_answer = $req->fetch();

            //var_dump($modify_question, $modify_answer);
        } 

        // CREATIONS DE QUESTIONS SUR LE DECK
        require(dirname(__FILE__).'/../Views/create_questions_Views.php');
    }

    else if (isset($_GET['training']) && isset($_GET['card']))
    {
        $training = training_deck_SELECT($_SESSION['id'], $_GET['training']);
        //var_dump($training);

        if(intval($_GET['card']) > count($training)) header('Location: index.php?page=inventory&training='.$_GET['training'].'&card='.count($training));
        if(intval($_GET['card']) <= 0) header('Location: index.php?page=inventory&training='.$_GET['training'].'&card=1');
        require_once('./Views/training_Views.php');
    }

    else if (!isset($_GET['action'])) 
    {
        // SELECTIONNE LES DECK DE L'UTILISATEUR
        $req = my_deck_SELECT($_SESSION['id']);
        //$datas = $req->fetchAll();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);

        //---------- VOIR LES STATS DE TOUS DES DECKS ----------
        $stats_views = questforstat_version2_SELECT($_SESSION['id']);

        $count_question = array();
        foreach($datas as $key => $value)
        {
            array_push($count_question, count_question_deck_SELECT($datas[$key]['deck_id']) );
        }
        //var_dump($count_question);

        
        require(dirname(__FILE__).'/../Views/inventory_Views.php');   
    } 

if (isset($_SESSION['deck'])) {
    
    if (isset($_SESSION['list']))
    {
        unset($_SESSION['list']);
    }
    if (isset($_SESSION['listend']))
    {
        unset($_SESSION['listend']);
    }
    if (isset($_SESSION['cpt']))
    {
        unset($_SESSION['cpt']);
    }
    if (isset($_SESSION['cptall']))
    {
        unset($_SESSION['cptall']);
    }
    if (isset($_SESSION['iddelaquestiondavant']))
    {
        unset($_SESSION['iddelaquestiondavant']);
    }
    unset($_SESSION['deck']);
}

    


    // TEMPLATE DE LA PAGE
    require_once(dirname(__FILE__).'/../Views/template.php');
?>