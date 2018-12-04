<?php

        // AFFICHER AUTEUR D'UN MESSAGE
        $subject_info = messages_autor_SELECT($_SESSION['subject_id'], $_GET['message_num']);
        foreach ($subject_info as $key => $value) 
        {
            if ($subject_info[$key]['autor_id'] == $_SESSION['id'])
            {
                message_DELETE($_GET['message_num']);
            }
            else 
            {
                echo 'desole seul l\'auteur peut delete son message';

            }
        }
?>