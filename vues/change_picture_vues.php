
<form action="" method="post" enctype="multipart/form-data">

    <label for="profil_picture">Entrez le liens url de votre avatar : </label>
    <input type="text" name="profil_picture" value="" id="profil_picture" title="Entrez l'url de votre nouvelle image de profil" required>

    <input type="hidden" name="menu" value="">

    <input type="submit" value="Confirmer" >

</form>

<!-- Affiche un message pour savoir si la modification d'image à été succès. -->
<?php
    if(isset($error) && empty($error))
    {
?>
        <p><b><i>Votre image de profil a bien été modifié avec succès. </i></b></p>
<?php
    }
    else echo $error;

?>


<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>