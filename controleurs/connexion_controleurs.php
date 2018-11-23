<?php
  // VERIFICATION SI UTILISATEUR A SESSSION ACTIVE
  if (!isset($_SESSION['username']))
    {
      include(dirname(__FILE__).'/../vues/connexion_vues.php');
    }
    else 
    {
      header('Location: index.php?page=accueil');
      exit;
    }


    // VERIFICATION USERNAME ET PASSWORD
    //if (!empty($_POST['username']) && !empty($_POST['password']))
    //{
      if (isset($_POST['username']) && isset($_POST['password']))
      {
        //$_SESSION['username'] = $_POST['username'];
       // $_SESSION['password'] = $_POST['password'];
        
        // REQUETE SQL
        $resultat = connexion_select('user', 'username', $_POST['username']);
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

        // SI LE PSEUDO EXISTE
        if ($resultat)
        {
          if ($isPasswordCorrect)
          {
            
            // STOCKAGE VARIABLE SESSION
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['username'] = $resultat['username'];
            $_SESSION['statut'] = $resultat['statut'];
            $_SESSION['age'] = $resultat['age'];
            $_SESSION['state'] = $resultat['state'];
            $_SESSION['sexe'] = $resultat['sexe'];
            $_SESSION['email'] = $resultat['email'];

            // REDIRECTION PAGE ACCUEIL
            include(dirname(__FILE__).'/../vues/accueil_vues.php');
            exit;
          }
          else 
          {
            echo 'BAD PASS'; 
          }
        }
        else 
        {
          echo 'BAD USERNAME';
        }

      //}

    }
    
  

 
  
?>
