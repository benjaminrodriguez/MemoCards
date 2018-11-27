<?php
    // Affiche le menu de bar top
    include(dirname(__FILE__).'/../vues/top_menu_vues.php');

    echo 'Mon Inventaire...';

    // Affiche le menu de l'inventaire
    include(dirname(__FILE__).'/../vues/inventaire_vues.php');

    if(isset($_POST['inventaire'])) 
    {
        // Création de deck
        include(dirname(__FILE__).'/../vues/creer_deck_vues.php');
    }

?>