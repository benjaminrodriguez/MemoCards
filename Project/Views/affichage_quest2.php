<?php ob_start(); ?>

<br>Q n° <?php echo intval($_SESSION['cpt']);?>
<br><br>
<?php echo $q[0]['q']; ?>
<br>

<form action="" method="POST">
<textarea name="repuser" rows="8" cols="80"></textarea>
<input type="submit" name="bouton"  value="Valider">
</form>


<form method="post" action="">
<input type="submit" name="fin" value="Finir">
</form>


<?php $content = ob_get_clean();?>