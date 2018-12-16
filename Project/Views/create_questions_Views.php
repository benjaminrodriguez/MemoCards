<?php ob_start(); ?>

    <div class="row">
        <div class="span8">

            <form action="" method="POST">
                <label for="question"> <h5>Nouvelle Question :</h5></label>
                <input id="question" type="text" name="question" value="<?php if(isset($_GET['question'])) echo $modify_question[0] ; ?>" placeholder="Nouvelle question"  style="width:600px;" required> <br>
                <input id="answer" type="text" name="answer" value="<?php if(isset($_GET['answer'])) echo $modify_answer[0] ; ?>" placeholder="Réponse de la question" style="width:600px;" required>

                <div class="row">
                    <div class="span6">
                        <?php if(isset($_GET['question']) && isset($_GET['answer'])) 
                        { ?>  
                             <button class="btn btn-large btn-warning" type="submit" name="modify_cards" value="" >Modifier la carte</button>
                             <a class="btn btn-large btn-inverse" href="index.php?page=inventory&action=modify&deck=<?php echo $_SESSION['deck_id']?>">Annuler</a>
              <?php     } ?>
                <?php  if(!isset($_GET['question']) && !isset($_GET['answer']))  { ?> <button class="btn btn-large btn-warning" type="submit" name="next_question" value="" >Ajouter la question</button> <?php } ?>
                        
                    </div>
                </div>
            </form>

        </div>

        
        <center><h4>Contenu du deck :</h4>
        <p>Votre deck doit contenir un minimum de 10 questions pour être jouable. </p></center>

          

        <?php 
        if (isset($questions_deck)) {
            
            foreach ($questions_deck as $key => $value)
            { ?>


                <div class="span2">
                    <div class="post-summary-footer">
                        <ul class="post-data-3">
                            <li><i class="icon-cog"></i> <a href="index.php?page=inventory&action=modify&deck=<?php echo $questions_deck[$key]['deck_id'].'&question='.$questions_deck[$key]['id'].'&answer='.$answers_deck[$key]['id']; ?>">Modifier</a><br>
                            <i class="icon-trash"></i> <a href="index.php?page=inventory&action=delete_card&deck=<?php echo $questions_deck[$key]['deck_id'].'&question='.$questions_deck[$key]['id'].'&answer='.$answers_deck[$key]['id']; ?>">Supprimer</a></li>
                            
                        </ul>
                    </div>
                </div>


                    <div class="span6"> 

            <?php      
            echo '<h5>#'.($key+1).' : </h5> <b>Question : </b>'.$questions_deck[$key]['question_cards'];     
            echo '<br><b>Réponse :</b> '.$answers_deck[$key]['answer_cards']; ?>
            </div> <br><br>
            <?php 
            } 
        }?>
    </div>
    <?php /*  echo 'questions :';
        var_dump($questions_deck);

        echo 'réponses:';
        var_dump($answers_deck);*/ ?>

<?php $content = ob_get_clean(); ?>

