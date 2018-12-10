<?php $title = 'Incription'; ?>
<?php ob_start(); ?>
<html>
  <head>
        <meta charset="utf-8"/>
      <!-- Le script du head -->
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="./Public/css/connection.css" rel="stylesheet" type="text/css" />

    </head>
<body>  
<div class="background">
<div class="page-container">

    <form id="form" class="form-signin" action="index.php?page=connection" method="POST"> 
     

        <center><img class="mb-4"  src="./Public/img/memocards_white.png" alt=""></center>
        <form action="" method="POST" class="form-signin">
            <!--<h1 class="h3 mb-3 font-weight-normal">Inscrivez-vous</h1>-->

            <label for="username"  class="sr-only">Username</label>
            <input type="text" name="username" value="" id="username" class="form-control" placeholder="Username"  autofocus>
            <!-- <P> Le mot de passe doit contenir : 6 caractères minimum, au moins une majuscule, une minuscule et un chiffre</p>-->
            <input type="password" name="password" value="" id="pass" class="form-control" placeholder="Mot de passe" 
            pattern=".{6,}"   
             title="6 caracteres minimum, au moins une majuscule, une minuscule" >
            <label for="pass" class="sr-only">Password</label>
            <div class="checkbox mb-3">
            <script>
                // Vérification de la longueur du mot de passe saisi
                document.getElementById("password").addEventListener("input", function (e) {
                    var mdp = e.target.value; // Valeur saisie dans le champ mdp
                    var longueurMdp = "faible";
                    var couleurMsg = "red"; // Longueur faible => couleur rouge
                    if (mdp.length >= 8) {
                        longueurMdp = "suffisante";
                        couleurMsg = "green"; // Longueur suffisante => couleur verte
                    } else if (mdp.length >= 4) {
                        longueurMdp = "moyenne";
                        couleurMsg = "orange"; // Longueur moyenne => couleur orange
                    }
                    var aideMdpElt = document.getElementById("aideMdp");
                    aideMdpElt.textContent = "Longueur : " + longueurMdp; // Texte de l'aide
                    aideMdpElt.style.color = couleurMsg; // Couleur du texte de l'aide
                });
            </script>
            <input type="email" name="email" value="" id="email" class="form-control" placeholder="Email" >
            <div class="checkbox mb-3">
            <p>Sexe : 
            <input type="radio" name="sex" value="M" width:20px>Homme
            <input type="radio" name="sex" value="F" checked>Femme<br>

            <select name="region" class="form-control">
                <option value="region" disabled selected>Région</option> 
                <option value="hauts_de_france">Hauts-de-France</option> 
                <option value="normandie">Normandie</option>
                <option value="ile_de_france">Ile-de-France</option>
                <option value="bretagne">Bretagne</option>
                <option value="pays_de_la_loire">Pays de la Loire</option>
                <option value="centre_val_de_loire">Centre-Val de Loire</option>
                <option value="grand_est">Grand Est</option>
                <option value="nouvelle_aquitaine">Nouvelle-Aquitaine</option>
                <option value="bourgogne_franche_comte">Bourgogne-Franche-Comté</option>
                <option value="auvergne_rhones_alpes">Auvergne-Rhône-Alpes</option>
                <option value="occitanie">Occitanie</option>
                <option value="paca">Provence-Alpes-Côte d'Azur</option>
                <option value="corse">Corse</option>
                <option value="guadeloupe">Guadeloupe</option>
                <option value="martinique">Martinique</option>
                <option value="guyane">Guyane</option>
                <option value="mayotte">Mayotte</option>
                <option value="la_reunion">La Réunion</option>
            </select><br>

            <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control" placeholder="Date de naissance" >
            
            <button type="submit">Inscription</button>
        </form>
         <!-- JS POUR EVITER LES CHAMPS VIDES-->
         <script>
        document.forms[0].addEventListener("submit", function(evenement) 
        { 
            if (document.getElementById("email").value == "") {
                evenement.preventDefault();
                alert("Tapez un email valable ");
                document.getElementById("email").focus();
            }
            else if (document.getElementById("username").value == "") {
                evenement.preventDefault();
                alert("Pensez à taper un username !");
                document.getElementById("username").focus();
            }
            else if (document.getElementById("password").value == "") {
                evenement.preventDefault();
                alert("Pensez à taper un password !");
                document.getElementById("password").focus();
            }
            else if (document.getElementById("region").value == "") {
                evenement.preventDefault();
                alert("Pensez à taper une région !");
                document.getElementById("region").focus();
            }
            else if (document.getElementById("date_de_naissance").value == "") {
                evenement.preventDefault();
                alert("Pensez à taper une date !");
                document.getElementById("date").focus();
            }
        });
    </script>
        <!-- Bouton de retour à l'écran d'accueil -->
<form action='index.php?page=home' method='POST'>
    <button type="submit" value="Retour à l'écran de connexion">Retour à l'écran de connexion</button>
</form>
</div>
    <center><p >&copy; MemoCards</p></center>

</div>
 </div>    
 

    



<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>
