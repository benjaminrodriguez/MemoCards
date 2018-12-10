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

    else if(isset($_POST['next_question']) || (isset($_GET['action']) && $_GET['action'] == 'modify'))
    {


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
    require_once(dirname(__FILE__).'/../Views/template_inventory.php');
?>