
<?php if(!isset($test_old_password))
        { 
?>

<form method="POST" action="">
    <!-- Demande le mot de passe actuel. -->
    <input type="password"  name="old_password" value="" placeholder="Mot de passe actuel" 
            title="Entrez votre mot de passe sans caractère spéciaux."><br/>

    <!-- Demande le nouveau mot de passe. -->
    <input type="password"  name="new_password1" value="" placeholder="Nouveau mot de passe" 
    title="Entrez votre mot de passe sans caractère spéciaux."><br/>

    <input type="password"  name="new_password2" value="" placeholder="Confirmer mot de passe" 
    title="Entrez votre mot de passe sans caractère spéciaux."><br/>
            
    <input type="hidden" name="menu" value="password">
    <button type="submit"> Confirmer </button>

</form>

<?php   }
?>



<?php
     if(!empty($error)) echo $error;
?>