<?php

// SUPPRIMER UN SUJET

        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] === 'supprimer_sujet')
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

    ?>