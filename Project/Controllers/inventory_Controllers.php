<?php


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
        // ATTRIBUT UNE IMAGE DE PROFIL AU DECK SI CELUI-CI N'EN POSSEDE PAS 
        if (empty($_POST['picture'])) $_POST['picture'] = './Public/img/appareil_photo.jpg';

        // INSERTION DU DECK DANS LA BDD
        new_deck_INSERT($_POST['title'], $_POST['description'], $_SESSION['id'], $_POST['picture'], $_POST['categorie']);
        $req = deck_id_SELECT($_POST['title']);
        $deck_id = $req->fetch();
        new_passed_INSERT($_SESSION['id'], $deck_id['id']);

        // CREATIONS DE QUESTIONS SUR LE DECK
        require(dirname(__FILE__).'/../Views/create_questions_Views.php');
    }

    else if(isset($_POST['next_question']))
    {
        // AJOUTE LA NOUVELLE QUESTION DANS LA BDD
        new_question_INSERT($_POST['question'], $_SESSION['deck_id']);
        
        // AJOUTE LA NOUVELLE REPONSE DANS LA BDD
        $req = id_question_SELECT($_POST['question']);
        $id_question = $req->fetchAll();
        new_answer_INSERT($_POST['answer'], $id_question[0]['id'] );

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

    else if (!isset($_GET['action'])) 
    {
        // SELECTIONNE LES DECK DE L'UTILISATEUR
        $req = my_deck_SELECT($_SESSION['id']);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        require(dirname(__FILE__).'/../Views/inventory_Views.php');
        
    } 

    // TEMPLATE DE LA PAGE
    require_once(dirname(__FILE__).'/../Views/template.php');
?>