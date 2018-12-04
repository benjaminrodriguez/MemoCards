<?php 
    $email = ($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $valide_email = false;
    }
    else 
    {
        $valide_email = true;
    }
?>