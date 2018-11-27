<form method="post" action="">
<br>Carte n° <?php echo $_SESSION['cpt'];?><br>


<?php
for ($x=0; $x < count($ans) ; $x++) {
    echo "<br><input type='radio' name='answer' value='".$ans[$x]['statut_cards']."' required> ".$ans[$x]['answer_cards'];

}
// var_dump($value);

    //echo "<br><input type='radio' name='answer' value='".$value."' required> ".$key;

?>
<br><br>
<input type="submit" name="bouton" value="Valider">
</form>


<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>