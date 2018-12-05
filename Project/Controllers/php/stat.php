<?php
 
 if (!isset($_POST['deckstat'])) 
 {
     $req = last_deck_play_SELECT($_SESSION['id']);
     $datas = $req->fetchAll();
     require(dirname(__FILE__). '/../../Views/statchoice_views.php');
     
 }
 else 
 {
     //echo $_POST["deckstat"];
     $q = questforstat_SELECT($_POST["deckstat"]);
     require(dirname(__FILE__). '/../../Views/stataff_views.php');
     //var_dump($q);
 }
?>