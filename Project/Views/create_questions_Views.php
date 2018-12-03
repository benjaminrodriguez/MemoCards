<?php $title="Création du Deck"; 
     ob_start(); ?>


<p>Votre deck doit contenir un minimum de 10 questions pour être valide </p>

<form action="" method="post">

    <label for="question">Question  n° :</label>
    <input id="question" type="text" name="question" value="">


    <button name="next_question" value="">Question suivante</button>
</form>


post : 
<?php var_dump($_POST); ?>

<br> session :
<?php var_dump($_SESSION); ?>


<?php $content = ob_get_clean(); 
require('./Views/template.php');