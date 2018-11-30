<?php

//Changer son password :

    if(isset($_POST['menu']) && $_POST['menu'] === "password")
    {
        if(isset($_POST['old_password'])) 
        { 
            //Vérifie si le password actuel entré est correcte
            $password = password_SELECT($_SESSION['id']);
            $password = $password['password'];
            $test_old_password = false;
            $error = '';
            password_verify(htmlspecialchars($_POST['old_password']), $password)? $test_old_password = true : $_SESSION['error'] = 'Le mot de passe actuel entré n\'est pas le bon.';

            //Vérifie si les 2 new_password entrés sont semblabes
            $test_new_password = false;
            ($_POST['new_password1']===$_POST['new_password2'])? $test_new_password = true : $_SESSION['error'] = 'Les nouveaux mots de passe ne sont pas identique.' ;

            //Si tout est bon : change le mot de passe
            if($test_old_password===true && $test_new_password===true)
            {
                
                $new_password = password_hash(htmlspecialchars($_POST['new_password1']), PASSWORD_BCRYPT);
                password_UPDATE($new_password, intval($_SESSION['id']));
                $_SESSION['error'] = "Votre mot de passe à été modifier avec succès.";
            }
        }
    }
    
?>