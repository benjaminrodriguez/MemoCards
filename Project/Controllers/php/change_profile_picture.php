<?php

//Changer son avatar :

    if(isset($_POST['profile_picture']))
    {
        picture_UPDATE(htmlspecialchars($_POST['profile_picture']), intval($_SESSION['id']));
        $_SESSION['profile_picture'] = htmlspecialchars($_POST['profile_picture']);
        header('Location: index.php?page=profile');
        exit;
    }
    //else $error = 'Un problème est survenu lors du changement de l\'avatar';
        
     
?>