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
      <label for="pseudo" class="sr-only">Pseudo</label>
      <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
      <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
      <div class="checkbox mb-3">
      <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control" placeholder="Date de naissance" required>
      <!--<label for="mail" class="sr-only">mail</label>
      <input type="email" name="mail" id="mail" class="form-control" placeholder="Adresse mail" required autofocus>-->
      <label for="pass" class="sr-only">Password</label>
      </div>
      <button action="index.php?page=inscription"class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>
      </form>
    </body>
</html>
