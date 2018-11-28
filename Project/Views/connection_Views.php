<?php $title = 'Connexion'; ?>
<?php ob_start(); ?>

<div class="background">

    <form class="form-signin" action="index.php?page=connection" method="POST"> <br>
        <img class="mb-4" src="./Public/img/logo.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Bienvenue sur MemoCards</h1><br>

        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>

        <label for="inputPassword" class="sr-only"></label><br>
        <input type="password" name="password" value="" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary">Se connecter</button>
    </form><br><br>


    <form action="index.php?page=inscription" method="POST">
        <button type="submit" class="btn btn-lg btn-primary" id="inscription" name="inscription" value="inscription"><h3>Inscription</h3></button>
    </form>

 </div>

<p class="mt-5 mb-3 text-muted">&copy; MemoCards</p>


<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>

