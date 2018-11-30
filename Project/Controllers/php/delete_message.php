<?php

    if (isset($_POST['choix_forum']) && $_POST['choix_forum'] === 'supprimer_message_sujet')
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
    
?>