<?php

    
    // AFFICHAGE DE TOUS LES DERNIERS SUJETS
    subjects_SELECT();

    // CREER UN SUJET
    include(dirname(__FILE__).'/../vues/forum_Views.php');

    // DIFFERENTS CHOIX POSSIBLES
    if (isset($_POST['choix_forum']))
    {

        // CREER UN SUJET
        if ($_POST['choix_forum'] === 'creer_sujet')
        {
            // FORM DE CREATION SUJET
            include(dirname(__FILE__).'/../vues/forum_creer_sujet_vues.php');

            // SI LE FORM EST REMPLI
            if (isset($_POST['title']) && isset($_POST['content']))
            {

                // LORSQU'UN SUJET EST CREE IL EST OUVERT PAR DEFAUT
                $statut = 'ouvert';

                // ON RECUPERE L'HEURE
                $date_posted = date('Y-m-d H:i:s');

                // APPEL DE LA REQ SQL
                topic_INSERT($_POST['title'], $statut, $_POST['content'], $_SESSION['id'] );
            }
        }

        // SUPPRIMER UN SUJET
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