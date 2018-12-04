<?php



    if(isset($_POST['username']) && isset($_POST['password'])) 
    {
        //RECUPERE LES DONNEES DE L'USER
        $data = connection_SELECT(htmlspecialchars($_POST['username']));

        if (password_verify(htmlspecialchars($_POST['password']), $data['password']))
        { 
            // STOCKAGE VARIABLE SESSION
            $_SESSION['id'] = intval($data['id']);
            $_SESSION['username'] = $data['username'];
            $_SESSION['status'] = $data['status'];
            $_SESSION['birth_date'] = $data['birth_date'];
            $_SESSION['region'] = $data['region'];
            $_SESSION['sex'] = $data['sex'];
            $_SESSION['profile_picture'] = $data['profile_picture'];
            $_SESSION['email'] = $data['email'];

            header('Location: index.php?page=home');
            exit;
        } 
        else
        {
            require(dirname(__FILE__).'/../Public/js/erreur_auth.js');
        }
    }

    require(dirname(__FILE__).'/../Views/connection_Views.php');
?>