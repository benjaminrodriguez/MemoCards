<?php

    // VERIF EMAIL
    $email = ($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $valide_email = false;
    }
    else 
    {
        $valide_email = true;
    }
    if (strlen($email) > 255)
    {
        $lengt_email = false;
    }
    else 
    {
        $lengt_email = true;
    }
    
    // VERIF LONGUEUR PASSWORD
    $password = (trim($_POST["password"]));
    if (strlen($password) < 6 || strlen($password) > 255 ) 
    {
        $valide_password = false;
    }
    else 
    {
        $valide_password = true;
    }

    // VERIF LONGUEUR USERNAME
    $username = (trim($_POST["username"]));
    if (strlen($username) > 25 || strlen($username) < 4) 
    {
        $valide_username = false;
    }
    else 
    {
        $valide_username = true;
    }
   
    // VERIFICATION CARACTERE PASSWORD
    if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $password))
    {
        $conforme_password = true;
	}
    else 
    {
        $conforme_password = false;
    }	
    
    // VERIFICATION MDP PAS TROP COMMUN

    // On ouvre le dictionnaire en lecture seule
    $handle = fopen(dirname(__FILE__).'/../../Public/common_password.txt', 'r');

    // Variable qui enregistre les mots extraits du fichier
    $buffer = "";


    if ($handle)
    {
        // Tant que l'on est pas à la fin du fichier
        while (!feof($handle) AND ($buffer != $password))
        {
            $buffer = fgets($handle);
        }
        
        if ($buffer == $password) 
        {
            $common_password = true;
        }
        else 
        {
            $common_password = false;
        } 

        // On ferme le fichier
        fclose($handle);
    }
    
    // ON VERIFIE LA DATE DE NAISSANCE
    $now = date("Y-m-d");
    if ($_POST['date_de_naissance'] > $now || $_POST['date_de_naissance'] == "")
    {
        $date_naissance = false;
    }
    else if ($_POST['date_de_naissance'] < $now)
    {
        $date_naissance = true;
    }
?>