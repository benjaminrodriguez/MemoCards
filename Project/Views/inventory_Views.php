<?php $title='Inventaire de Deck'; ?>
<?php ob_start(); ?>

<form method="POST" action="">



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

                    <!-- Bouton modifier deck -->
                    <?php if($_SESSION['id'] == $datas[$i]['autor_id']) {?>
                        <button name="modify_deck" value="<?php echo $datas[$i]['id'] ?>">Modifier ce deck</button> 
                    <?php } 
                }
            } ?> <br><br>

</form>



<form method ="GET" action="">

        <input type="hidden" name="page" value="inventory">
        <!-- ------------------------------- Bouton Voir tout les deck ----------------------- -->
        <button name="action" value="show_deck">Voir tout vos decks</button>

        <!-- ------------------------------- Bouton Creer Deck ------------------------------- -->
        <button   name="action" value="create_deck">Créer un nouveau deck</button>                   
</form>



<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>