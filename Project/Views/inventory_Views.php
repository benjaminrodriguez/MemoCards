<?php $title='Inventaire de Deck'; ?>
<?php ob_start(); ?>















<!-- ------------------------------- Bouton Creer Deck ------------------------------- -->
    <form method="POST" action="">
            <!--    <label for="creer"> ->logo<- </label>   -->
                <button type="submit" id="creer" name="inventaire" value="creer">Créer un nouveau deck</button>
    </form>

<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>