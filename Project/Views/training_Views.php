<?php ob_start(); ?>



<div class="card middle">
     
    <div class="front">

        <!--<img src="Public/img/deck_training/card_1.jpg" alt=""> -->
        <br><br><br><br><br><br>
        <center><h1> <u> Question </u></h1>  <br><br>
        <h1> <?php echo $training[(intval($_GET['card'])-1)]['question_cards']; ?> </h1> </center>
 
    </div>


    <div class="back">
       <div class="back-content middle">
            <h1> <u> Réponse </u></h1>  <br><br>
            <h1> <?php echo $training[(intval($_GET['card'])-1)]['answer_cards']; ?> </h1> 

        </div>
    </div>


</div>

<?php if(intval($_GET['card']) < count($training)) 
    { ?>
        <div class="suivant">
            <a href="index.php?page=inventory&training=18&card=<?php echo (intval($_GET['card'])+1); ?>" class="btn btn-oval">Suivant</a>
        </div>
    <?php
    } ?>


    <?php if(intval($_GET['card']) > 1) 
    { ?>
        <div class="precedent">
            <a href="index.php?page=inventory&training=18&card=<?php echo (intval($_GET['card'])-1); ?>" class="btn btn-oval">Précédent</a>
        </div>
    <?php
    } ?>






<?php $content = ob_get_clean(); ?>