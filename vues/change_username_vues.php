<form method="POST" action="">

    <input type="text" name="username" value="" placeholder="Nouveau pseudo" 
            title="Entrez un pseudo sans caractère spéciaux."><br/>

    <input type="hidden" name="menu" value="username">

    <button type="submit"> Confirmer </button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>