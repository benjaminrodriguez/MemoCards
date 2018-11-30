<?php

//Changer son pseudo :

    if(isset($_POST['menu']) && $_POST['menu'] === "username")
    {
        if(isset($_POST['username']))
        {
        //UPDATE dans la BDD le nouveau pseudo de l'user
        $_SESSION['username'] = htmlspecialchars($_POST['username']);
        username_UPDATE($_SESSION['username'], intval($_SESSION['id']));
        
        header('Location: index.php?page=profile');
        exit;
        }
    }

?>