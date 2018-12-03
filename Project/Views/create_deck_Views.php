<?php $title="Création de Deck";
    ob_start();?>


<form action="index.php?page=inventory&action=create_questions" method="post" id="id_form"> 

    <label for="picture">Choisir une image pour son deck :</label>
    <input id="picture" type="text" name="picture" value="" placeholder="URL de l'image souhaitée" accept="image/*" title="Insérer l'url d'une image"> 
    <img src="./Public/img/ajouter_photo.png" alt="" width="90" height="95" border="0"><br>


    <label for="title">Titre de votre deck :</label>
    <input id="title" type="text" name="title" value="" placeholder="Titre " title="Insérer le titre de votre deck" required>  <br>    


    <!-- AFFICHE LES DIFFERENTES CATEGORIES -->
    <label for="categorie">Choisir la catégorie du deck </label>
    <select id="categorie" name="categorie" required> 
        
        <?php   var_dump($categories); foreach ($categories as $key => $value) {
                    echo '<option value="'.$categories[$key]['id'].'">'.$categories[$key]['name'].'</option>';
                }  ?>
    </select>

</form>

<textarea form="id_form" name="description" rows="8" cols="60" placeholder="La description de votre deck est importante ! 
Merci de ne pas la négliger, elle permet aux autres utilisateurs de mieux comprendre le contenu." title="Insérer la description de votre deck"></textarea><br><br>

<p>Dans le but de mieux référencer les decks de nos utilisateurs, l'application MémoCards se base sur un système de mot clés. <br>
Merci de bien vouloir entrer plusieurs mots-clés précédés d'un hashtag concernant votre deck comme l'exemple ci-dessus :</p>
<textarea form="id_form" id="hashtag"name="hashtags" rows="6" cols="30" placeholder="#Cuisine 
#Chocolat 
#Recette 
#Régime " title="Insérer la description de votre deck" required></textarea>

<button form="id_form">Continuer</button>


<?php $content = ob_get_clean();
    require('./Views/template.php'); ?>