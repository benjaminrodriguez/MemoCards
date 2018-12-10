<?php ob_start(); ?>

    <div class="row">
        <div class="span8">

            <form action="" method="post">
                <label for="question"> <h5>Nouvelle Question :</h5></label>
                <input id="question" type="text" name="question" value="" placeholder="Nouvelle question"  style="width:600px;"> <br>
                <input id="answer" type="text" name="answer" value="" placeholder="Réponse de la question" style="width:600px;">

                <div class="row">
                    <div class="span6">
                        <button form="id_form" class="btn btn-large btn-warning" type="submit" name="next_question" value="" >Ajouter la question</button>
                    </div>
                </div>
            </form>

        </div>

        <p>Votre deck doit contenir un minimum de 10 questions pour être valide </p>

        <div class="span6">
            <h5>Contenu du deck :</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>
        </div>

        <br><br>

        <div class="span2">
            <div class="post-summary-footer">
                <ul class="post-data-3">
                    <li><i class="icon-cog"></i> <a href="index.php?page=inventory&action=modify">Modifier</a><br><br>
                    <i class="icon-trash"></i> <a href="#">Supprimer</a></li>
                </ul>
            </div>
        </div>

    </div>

    post : 
    <?php var_dump($_POST); ?>

    <br> session :
    <?php var_dump($_SESSION); ?>



<?php $content = ob_get_clean(); ?>



