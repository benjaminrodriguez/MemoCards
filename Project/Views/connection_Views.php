<?php $title = 'Connexion'; ?>
<?php ob_start(); ?>
<!DOCTYPE html>

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
     

        <center><img class="mb-4" src="./Public/img/memocards_black.png" alt=""></center>

        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>

        <label for="inputPassword" class="sr-only"></label><br>
        <input type="password" name="password" value="" id="inputPassword" class="form-control" placeholder="Password" required>

        <!-- Notre boite de vérification 
        <div id="toggle-text" class="g-recaptcha" data-theme="dark" 
            data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI">
        </div>-->
        <!--<script>
			let isActive = false;
			const formElement = document.querySelector('#form');
			const toggleTextElement = document.querySelector('#toggle-text');
			formElement.addEventListener('submit', onFormSubmit);

			document.querySelector('#toggle').addEventListener('click', function toggle(event) {
				if (isActive) {
					console.log('remove (enabled)');
					formElement.addEventListener('submit', onFormSubmit);
					toggleTextElement.textContent = 'Activer';
				} else {
					console.log('add (disabled)');
					formElement.removeEventListener('submit', onFormSubmit);
					toggleTextElement.textContent = 'Désactiver';
				}
				isActive = !isActive;
			});

			function onFormSubmit(event) {
				event.preventDefault();
			}
		</script>-->
        <br><br><button >Se connecter</button><br><br>
    </form>


    <form action="index.php?page=inscription" method="POST">
        <button type="submit"  id="inscription" name="inscription" value="inscription"><h3>Inscription</h3></button>
    </form>
    <center><p class="mt-5 mb-3 text-muted">&copy; MemoCards</p></center>

</div>
 </div>



<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>
</body>