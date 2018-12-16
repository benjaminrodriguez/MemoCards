<?php ob_start(); ?>

<p style="font-size:25px"><b>
Question n° <?php echo intval($_SESSION['cpt']);?>
</b></p><br>
<div class="well" style="font-size:18px">
<?php echo $q[0]['q']; ?>
</div>
<br>

<form action="" method="POST">
<textarea name="repuser" rows="5" cols="80" required></textarea><br>
<input type="submit" name="bouton" class="btn btn-success" value="Valider">
</form>


<form method="post" action="">
<input type="submit" name="fin" class="btn btn-danger" value="Finir">
</form>


<?php $content = ob_get_clean();?>