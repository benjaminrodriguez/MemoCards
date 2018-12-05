<?php

//Changer son avatar :

    if(isset($_POST['profile_picture']))
    {
        if (strlen($password) < 255) 
        {
            picture_UPDATE(htmlspecialchars($_POST['profile_picture']), intval($_SESSION['id']));
            $_SESSION['profile_picture'] = htmlspecialchars($_POST['profile_picture']);
            header('Location: index.php?page=profile');
            exit;
        }
        else 
        {
            require(dirname(__FILE__).'/../Public/js/pp_length.js');
        }
    }
    //else $error = 'Un problème est survenu lors du changement de l\'avatar';
        
     
?>