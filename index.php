<!DOCTYPE HTML PUBLIC>
<html>
<!-- HTML -->
<head>
       <title>Accueil</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link rel="stylesheet" type="text/css" href="./vues/style.css" />
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
       integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body style="background-color:rgba(211,211,211);">


        <?php
            session_start();
            require_once('controleurs/php/function.php');

            //Html de l'index--------------------------------
            //include("vues/index_vues.html");
        ?>

    <div class="container" style="margin-top:60px;">
        <?php
            if(!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'_controleurs.php') )
            {
                include('controleurs/'.$_GET['page'].'_controleurs.php' );
            } else
            {
                include('controleurs/accueil_controleurs.php');
            }
        ?>
    </div>



<div id="footer">
     <!-- <p>MémoCards - PI : Semestre 2 - 2018 © Anki Sami, Rodriguez Benjamin, Simajchel Yann </p> -->
</div>
</body>
</html>
