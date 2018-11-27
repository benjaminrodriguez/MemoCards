
<?php
    session_start();

    //Ajoute les fonctions php
    require_once('controleurs/php/function.php');

    //Ajoute toutes les fonctions sql
    require_once('modeles/BDD.php');
    require_once('modeles/SELECT.php');
    require_once('modeles/INSERT.php');
    require_once('modeles/UPDATE.php');

    
    if(!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'_controleurs.php') )
    {
        include('controleurs/'.$_GET['page'].'_controleurs.php' );
    } else
    {
        include('controleurs/accueil_controleurs.php');
    }
?>

