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

    <center><img class="mb-4"  src="./Public/img/memocards_white.png" width="600" alt=""></center>
    

        <form action="index.php?page=inscription" method="POST" class="form-signin">
    <title>Inscription</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/checkout/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-12 text-center">
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">

        </div>
        <div class="col-md-12 order-md-1">
        
          <form enctype="multipart/form-data" action="index.php?action=addUser" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="username"></label>
                <input type="text" class="champ" id="username" name="username" placeholder="Username" required
                title="L'username doit faitre en 4 et 25 caractères" />
                <div class="invalid-feedback">
                  Entrez votre username 
                </div>
              </div>
              <hr class="mb-4">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="mdp"></label>
                <input type="password" class="champ" id="mdp" name="password" placeholder="Mot de passe"required
                title="Le mot de passe doit contenir : 6 caractères minimum, au moins une majuscule, une minuscule et un chiffre"/>

                <div class="invalid-feedback">
                  Entrez un mot de passe
                </div>
              </div>
            </div>

              <div class="col-md-6 mb-3">
               <label for="mdp2"></label>
                <input type="password" class="champ" id="mdp2" name="confirmPassword" placeholder="Confirmation de mot de passe"required
                title="Le mot de passe doit contenir : 6 caractères minimum, au moins une majuscule, une minuscule et un chiffre"/>

                <div class="invalid-feedback">
                  Confirmer votre mot de passe.
                </div>
              </div>
            <div class="mb-3">
              <label for="email"></label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
        
                <input type="email" class="champ" id="email" placeholder="you@memocards.com" name="email" required></div>

                <div class="invalid-feedback" style="width: 100%;"> 
                  Entrez votre adresse mail.
                </div>
              </div>
              <span id="aideCourriel"></span>
            </div><br><br>
            <input type="radio" name="sex" value="M" width="10px" class="champ"  id="sexe"><div style="color:white;">Homme</div>
            <input type="radio" name="sex" value="F" checked class="champ" id="sexe"><div style="color:white;">Femme</div><br>

            <select name="region" class="form-control" class="champ" id="region" required>
                <option value="region" disabled >Région</option> 
                <option value="hauts_de_france">Hauts-de-France</option> 
                <option value="normandie">Normandie</option>
                <option value="ile_de_france" selected>Ile-de-France</option>
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

            <input type="date" name="date_de_naissance" id="date" class="champ" placeholder="Date de naissance" ><br><br>
            <button class="btn btn-lg btn-block" name="SignIn" type="submit">S'inscire</button>

                </div>
              </div>
            </div>
            
          </form>
        </div>
      </div>

    </div>
    <form action='index.php?page=home' method='POST'>
    <button type="submit" value="Retour à l'écran de connexion" class="form-signin">Retour à l'écran de connexion</button>
</form>


</div>
    <center><p style="color:gold;">&copy; MemoCards</p></center>

</div>
 </div>  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
    <script src="./Public/js/inscription.js"></script>
  </body>
</html>