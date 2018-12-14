<?php
ob_start(); 
foreach ($q as $key => $value) {
    echo "<b> Carte ".($key+1)." : ".$value['question_cards']."&nbsp &nbsp </b>";

    if (intval($value['played_cards']) === 0) {
       ?>
       <i>  La carte n'a pas encore été jouée.</i><br><br>
       <?php
   }
   elseif (intval($value['level_cards']) > 4) {
    ?>
    <i>  La carte a été jouée <?php echo $value['played_cards']; ?> fois avec 
    <?php echo intval(intval($value['nb_succes'])/intval($value['played_cards'])*100); ?> % de réussite.</i> 
    &nbsp &nbsp &nbsp &nbsp 
    <img src="./Public/img/level/max.PNG" width="60" height="60" ><b> Lv. 3 Niveau MAX Bien joué !</b><br><br><?php
   
   }
   elseif (intval($value['level_cards']) > 3) {
    ?>
    <i>  La carte a été jouée <?php echo $value['played_cards']; ?> fois avec 
    <?php echo intval(intval($value['nb_succes'])/intval($value['played_cards'])*100); ?> % de réussite.</i> 
    &nbsp &nbsp &nbsp &nbsp 
    <img src="./Public/img/level/new.PNG" width="60" height="60" ><b> Lv. 2 Continues comme ca !</b><br><br></div><?php
   }
   else {
    ?>
    <i>  La carte a été jouée <?php echo $value['played_cards']; ?> fois avec 
    <?php echo intval(intval($value['nb_succes'])/intval($value['played_cards'])*100); ?> % de réussite.</i> 
    &nbsp &nbsp &nbsp &nbsp 
    <img src="./Public/img/level/first.PNG" width="60" height="60" ><b> Lv. 1 Accroches toi, tu vas y arriver !</b><br><br><?php
   }
   
}
$content = ob_get_clean();
?>