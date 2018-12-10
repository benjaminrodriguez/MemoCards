<?php

 if (!isset($_GET["deck"])) 
 {
     $datas = last_deck_play_SELECT($_SESSION['id']);
     var_dump($datas);
     require(dirname(__FILE__). '/../../Views/statchoice_views.php');
     
 }
 else 
 {
     //echo $_POST["deckstat"];
     $q = questforstat_SELECT($_GET["deck"], $_SESSION['id']);
     require(dirname(__FILE__). '/../../Views/stataff_views.php');
     //var_dump($q);
 }
?>