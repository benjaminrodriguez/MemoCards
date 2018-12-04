<?php $title = 'Home'; ?>
<?php ob_start(); ?>

<form method="POST" action="">
    <ul>
        <li>
            <label for="profil"> -->logo>-- </label>
            <button type="submit" id="profil" name="menu" value="profile"><h4>Mon Profil</h4></button>
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

    <!-- Affiche les 3 derniers decks utilisés -->
    <p><h1> <i>Vos decks joués récemment :</i>  </h1></p>

<?php   for($i=0; $i<2; $i++)
        { 
            if(isset($datas[$i]['name'])) 
            { ?>
                <button name="top_3_deck" value="<?php echo $datas[$i]['id']; ?>" style="width:250px">
                    <h3> <?php echo $datas[$i]['name']; ?> </h3>
                    <img src="<?php echo $datas[$i]['picture']; ?>" alt="" height="100"> <br>

                    <label for="description"><i><b>Description :</b></i> </label>
                    <p id="description"> <?php echo $datas[$i]['description']; ?> </p>
                </button>
    <?php   }
        } ?> <br><br>

</form>

<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>
