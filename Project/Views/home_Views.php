<?php $title = 'Home'; ?>
<?php ob_start(); ?>

<form method="POST" action="">
    <ul>
        <li>
            <label for="profil"> -->logo>-- </label>
            <button type="submit" id="profil" name="menu" value="profile"><h4>Mon Profil</h4></button>
        </li><br/>

        <li>
            <label for="stats">  -->logo>-- </label>
            <button type="submit" id="stats" name="menu" value="stats"><h4>Mes Stats</h4></button>
        </li><br/>

        <li>
            <label for="inventaire">  -->logo>-- </label>
            <button type="submit" id="inventaire" name="menu" value="inventory"><h4>Mon Inventaire</h4></button>
        </li> <br/> 

        <li>
           <label for="store">  -->logo>-- </label>
            <button type="submit" id="store" name="menu" value="store"><h4>Cards Store</h4></button>
        </li> <br/>      

        <li>
          <label for="forum">  -->logo>-- </label>
            <button type="submit" id="forum" name="menu" value="forum"><h4>Forum</h4></button>
        </li>  <br/>

        <li>
          <label for="test">  -->logo>-- </label>
            <button type="submit" id="test" name="menu" value="test"><h4>Jouer</h4></button>
        </li>  <br/>
    </ul>
</form>

<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>
