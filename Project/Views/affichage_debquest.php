<?php ob_start(); ?>
<form method='post' action=''>
DECK N° <?php echo htmlspecialchars($_POST['deck']); ?> 
<input type="submit" name="start" value ="Commencer">
</form>