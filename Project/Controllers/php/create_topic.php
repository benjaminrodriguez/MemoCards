<?php
    
// CREER UN SUJET

    if (isset($_POST['choix_forum']) && $_POST['choix_forum'] === 'creer_sujet')
    {
        // SI LE FORM EST REMPLI
        if (isset($_POST['title']) && isset($_POST['content']))
        {
            // LORSQU'UN SUJET EST CREE IL EST OUVERT PAR DEFAUT
            $statut = 'ouvert';

            // ON RECUPERE DATE ET HEURE
            //$date_time=date("Y-m-d H:i:s");

            //var_dump($_POST['title'], $date_time, $statut, $_POST['content'], $_SESSION['id']);

            // APPEL DE LA REQ SQL
            create_topic_INSERT(htmlspecialchars($_POST['title']), $statut, htmlspecialchars($_POST['content']), $_SESSION['id'] );
        }
    }
    
    ?>