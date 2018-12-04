<?php
    $titre="Messages Privés";
    $balises = true;
    include("includes/identifiants.php");
    include("includes/debut.php");
    include("includes/bbcode.php");
    include("includes/menu.php");

    $action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';
?>
