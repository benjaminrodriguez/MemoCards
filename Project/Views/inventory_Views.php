<?php $title='Inventaire de Deck'; ?>
<?php ob_start(); ?>

<form method="POST" action="">



    <!-- Affiche les 3 derniers decks utilisés -->
        <p><h1> <i>Vos decks joués récemment :</i>  </h1></p>

    <?php   for($i=0; $i<2; $i++)
            { 
                if(isset($datas[$i]['name'])) 
                { ?>
                    <button name="top_3_deck" value="<?php echo $datas[$i]['id']; ?>">
                        <h3> <?php echo $datas[$i]['name']; ?> </h3>
                        <p><i><b>Image du deck</b></i></p>

                        <label for="description"><i><b>Description :</b></i> </label>
                        <p id="description"> <?php echo $datas[$i]['description']; ?> </p>
                    </button>

                    <!-- Bouton modifier deck -->
                    <?php if($_SESSION['id'] == $datas[$i]['autor_id']) {?>
                        <button name="modify_deck" value="<?php echo $datas[$i]['id'] ?>">Modifier ce deck</button> 
                    <?php } 
                }
            } ?> <br><br>


        <!-- ------------------------------- Bouton Voir tout les deck ----------------------- -->
        <button name="see_more" value="ok">Voir tout vos decks</button>



        <!-- ------------------------------- Bouton Creer Deck ------------------------------- -->
        <!--    <label for="creer"> ->logo<- </label>   -->
        <button type="submit" id="creer" name="inventaire" value="creer">Créer un nouveau deck</button>
        
        
        
        
        
        
        
        
    
    </form>



<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>