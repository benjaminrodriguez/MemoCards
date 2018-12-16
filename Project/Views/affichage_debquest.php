<?php ob_start(); ?>
<form method='post' action=''>

<p style="font-size:25px"><b>
DECK N° <?php echo htmlspecialchars($_GET['deck']); ?> 
</b></p>
<input type="submit" name="start" class="btn btn-success" value ="Commencer">
</form>
<?php $content = ob_get_clean();?>