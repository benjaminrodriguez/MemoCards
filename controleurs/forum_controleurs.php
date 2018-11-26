<?php
    include(dirname(__FILE__).'/../vues/top_menu_vues.php');

    echo 'Le Forum...';
    
    // AFFICHAGE DE TOUS LES DERNIERS SUJETS
    print_subjects();

    // CREER UN SUJET
    include(dirname(__FILE__).'/../vues/forum_accueil_vues.php');

    // DIFFERENTS CHOIX POSSIBLES
    if (isset($_POST['choix_forum']))
    {
        if ($_POST['choix_forum'] === 'creer_sujet')
        {
            include(dirname(__FILE__).'/../vues/forum_creer_sujet_vues.php');
        }
        else if ($_POST['choix_forum'] === 'supprimer_sujet')
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
        else if ($_POST['choix_forum'] === 'lire_messages_sujet')
        {
            echo 'afficher tous les messages du sujet XXXX';
        }
        else if ($_POST['choix_forum'] === 'ecrire_message_sujet')
        {
            echo 'ecrire un message sur ce sujet';
        }
        else if ($_POST['choix_forum'] === 'supprimer_message_sujet')
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
?>