<?php

    if (isset($_GET['id']) && !empty($_GET['id']))
    {
        messages_subject_SELECT(htmlspecialchars($_GET['id']));
        //echo 'afficher tous les messages du sujet XXXX';
    }
    
?>