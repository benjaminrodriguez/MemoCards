<?php


    if (isset($_GET['action']) && $_GET['action'] == 'create_deck') 
    {
        // CREATION DU DECK
        $req = categories_SELECT();
        $categories = $req->fetchAll();
        require(dirname(__FILE__).'/../Views/create_deck_Views.php');
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
        var_dump($_POST, $_SESSION);
        // AJOUTE LA NOUVELLE QUESTION DANS LA BDD
        new_question_INSERT($_POST['question'], $_SESSION['deck_id']);
        
        // AJOUTE LA NOUVELLE REPONSE DANS LA BDD
        $req = id_question_SELECT($_POST['question']);
        $id_question = $req->fetchAll();
        new_answer_INSERT($_POST['question'], $id_question[0]['id'] );

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


        // CREATIONS DE QUESTIONS SUR LE DECK
        require(dirname(__FILE__).'/../Views/create_questions_Views.php');

        echo 'questions :';
        var_dump($questions_deck);

        echo 'réponses:';
        var_dump($answers_deck);
        
    }

    else if (!isset($_GET['action'])) 
    {
        // SELECTIONNE LES DECK DE L'UTILISATEUR
        $req = my_deck_SELECT($_SESSION['id']);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        require(dirname(__FILE__).'/../Views/inventory_Views.php');
        
    } 

    // TEMPLATE DE LA PAGE
    require_once(dirname(__FILE__).'/../Views/template_inventory.php');
?>