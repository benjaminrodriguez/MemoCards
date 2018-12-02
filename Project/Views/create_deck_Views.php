<form action="" method="post" id="id_form"> 

    <label for="picture">Choisir une image pour son deck :</label>
    <input id="picture" type="text" name="picture" value="" placeholder="URL de l'image souhaitée" accept="image/*" require> 
    <img src="./Public/img/ajouter_photo.png" alt="" width="90" height="95" border="0"><br>

    <label for="title">Titre de votre deck :</label>
    <input id="title" type="text" name="title" value="" placeholder="Titre " ><br require>

    

</form>


<textarea form="id_form" name="description" rows="11" cols="60" placeholder="La description de votre deck est importante ! 
Merci de ne pas la négliger, elle permet aux autres utilisateurs de mieux comprendre le contenu." ></textarea>

<button form="id_form">Continuer</button>