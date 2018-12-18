<?php $title="Création de Deck";
    ob_start(); ?>


<form action="index.php?page=inventory&action=create_questions" method="POST" id="id_form"> 

    <label for="picture"><h5>Choisir une image pour son deck :</h5></label>
    <input id="picture" type="text" name="picture" value="" placeholder="URL de l'image souhaitée" accept="image/*" title="Insérer l'url d'une image"> 
    <img src="./Public/img/ajouter_photo.png" alt="" width="90" height="95" border="0"><br>


    <label for="title"><h5>Titre de votre deck :</h5></label>
    <input id="title" type="text" name="title" value="" placeholder="Titre " title="Insérer le titre de votre deck" required>  <br>    


    <!-- AFFICHE LES DIFFERENTES CATEGORIES -->
    <label for="categorie"><h5>Choisir la catégorie du deck </h5></label>
    <select id="categorie" name="categorie" required> 
        
        <?php   var_dump($categories); 
                foreach ($categories as $key => $value) 
                {
                    echo '<option value="'.$categories[$key]['id'].'">'.$categories[$key]['name'].'</option>';
                }  ?>
    </select>

    </form>

    <label for="description"> <h5>Description</h5> </label>
    <textarea form="id_form" id="description" name="description" cols='200' rows="8" placeholder="La description de votre deck est importante ! 
    Merci de ne pas la négliger, elle permet aux autres utilisateurs de mieux comprendre le contenu." title="Insérer la description de votre deck"></textarea><br><br>

    <p>Dans le but de mieux référencer les decks de nos utilisateurs, l'application MémoCards se base sur un système de mot clés. <br>
    Merci de bien vouloir entrer plusieurs mots-clés précédés d'un hashtag concernant votre deck comme l'exemple ci-dessus :</p>
    <textarea form="id_form" id="hashtag"name="hashtags" rows="6" cols="30" placeholder="#Cuisine 
#Chocolat 
#Recette 
#Régime " title="Insérer la description de votre deck" required></textarea>

    <br>

    <div class="row">
            <div class="span4">
                <button form="id_form" class="btn btn-large btn-warning" type="subbit" name="action" value="create_questions">Créer le deck</button>
            </div>
    </div>


<?php $content = ob_get_clean();?>