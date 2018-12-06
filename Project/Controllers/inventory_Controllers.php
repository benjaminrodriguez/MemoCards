<?php

















    echo 'Mettre le template';

   /* // AFFICHE LA PAGE DE BASE
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

        // ATTRIBUT UNE IMAGE DE PROFIL AU DECK SI CELUI-CI N'EN POSSEDE PAS 
        if (empty($_POST['picture'])) $_POST['picture'] = './img/appareil_photo.jpg';

        // INSERTION DU DECK DANS LA BDD
        new_deck_INSERT($_POST['title'], $_POST['description'], $_SESSION['id'], $_POST['picture'], $_POST['categorie']);
        $req = deck_id_SELECT($_POST['title']);
        $deck_id = $req->fetch();
        new_passed_INSERT($_SESSION['id'], $deck_id['id']);


        // CREATIONS DE 10 QUESTIONS MINIMUMS POUR LE DECK
        require(dirname(__FILE__).'/../Views/create_questions_Views.php');


    }
    */    
?>