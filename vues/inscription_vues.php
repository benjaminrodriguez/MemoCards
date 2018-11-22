<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/logo.png">
    
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/formConnexion.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="" method="POST" class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Inscrivez-vous</h1>

      <label for="username" class="sr-only">Username</label>
      <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>

      <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
      <label for="pass" class="sr-only">Password</label>
      <div class="checkbox mb-3">

      <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
      <div class="checkbox mb-3">
      
      <select name="sexe" class="form-control" required>
        <option value="sexe" disabled selected>Sexe</option> 
        <option value="homme">Homme</option> 
        <option value="femme" >Femme</option>
      </select><br>

      <select name="state" class="form-control" required>
        <option value="state" disabled selected>Région</option> 
        <option value="europe">Europe</option> 
        <option value="asie">Asie</option>
        <option value="afrique">Afrique</option>
        <option value="amerique_Nord">Amérique du Nord</option>
        <option value="amerique_Sud">Amérique du Sud</option>
        <option value="océanie">Océanie</option>
      </select><br>

    Hobbies<br><input type="checkbox" name="hobbies" value="sport">
    <label for="sport">Sport</label>
    <input type="checkbox" name="hobbies" value="musique" selected>
    <label for="musique">Musique</label>
    <input type="checkbox" name="hobbies" value="voyages">
    <label for="voyages">Voyages</label><br>
  

      <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control" placeholder="Date de naissance" required>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>
      </form>
    </body>
</html>
