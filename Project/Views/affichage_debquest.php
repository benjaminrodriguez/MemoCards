<?php ob_start(); ?>
<form method='post' action=''>

<p style="font-size:25px"><b>
DECK  <?php echo htmlspecialchars($deckname[0]['name']); ?> 
</b></p>
<input type="submit" name="start" class="btn btn-success" value ="Commencer">
</form>
<?php $content = ob_get_clean();?>