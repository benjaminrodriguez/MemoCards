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

    <center><img class="mb-4"  src="./Public/img/memocards_white.png" width="670" alt=""></center>
    <form id="form" class="form-signin" action="index.php?page=connection" method="POST"> 
     


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
    <center><p color: white>&copy; MemoCards</p></center>

</div>
 </div>

<!-- IMG FOND -->
<SCRIPT language="JavaScript">


/* url de votre image*/
  var snowsrc="./Public/img/flo.png"
  var no = 80;
  var ns4up = (document.layers) ? 1 : 0;
  var ie4up = (document.all) ? 1 : 0;
  var nn6up = (document.getElementById) ? 1 : 0;
  var dx, xp, yp;
  var am, stx, sty;
  var i, doc_width = 800, doc_height = 600;

 if (ns4up) {
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;
  } else if (ie4up) {
    doc_width = document.body.clientWidth;
    doc_height = document.body.clientHeight;
} else if (nn6up) {
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;}

  dx = new Array();
  xp = new Array();
  yp = new Array();
  am = new Array();
  stx = new Array();
  sty = new Array();

  for (i = 0; i < no; ++ i) {
    dx[i] = 0;
    xp[i] = Math.random()*(doc_width-50);
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;
    stx[i] = 0.02 + Math.random()/10;
    sty[i] = 0.7 + Math.random();
    if (ns4up) {
      if (i == 0) {
        document.write("<layer name=dot"+ i +" left=15 top=15 visibility=show><img src='"+snowsrc+"' border=0></layer>");
      } else {
        document.write("<layer name=dot"+ i +" left=15 top=15 visibility=show><img src='"+snowsrc+"' border=0></layer>");
      }
    } else if (ie4up || nn6up) {
      if (i == 0) {        document.write("<div id=dot"+ i +" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=0></div>");
      } else {
        document.write("<div id=dot"+ i +" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=0></div>");
      }
    }
  }

  function snowNS() {
    for (i = 0; i < no; ++ i) {
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
        doc_width = self.innerWidth;
        doc_height = self.innerHeight;
      }
      dx[i] += stx[i];
      document.layers["dot"+i].top = yp[i];
      document.layers["dot"+i].left = xp[i] + am[i]*Math.sin(dx[i]);
    }
    setTimeout("snowNS()", 10);
  }

  function snowIE() {
    for (i = 0; i < no; ++ i) {
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
        doc_width = document.body.clientWidth;
        doc_height = document.body.clientHeight;
      }
      dx[i] += stx[i];
      document.all["dot"+i].style.pixelTop = yp[i];
      document.all["dot"+i].style.pixelLeft = xp[i] + am[i]*Math.sin(dx[i]);
    }
    setTimeout("snowIE()", 10);
  }

function snowNN6() {
    for (i = 0; i < no; ++ i) {
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
        doc_width = self.innerWidth;
        doc_height = self.innerHeight;
      }
      dx[i] += stx[i];
      document.getElementById("dot"+i).style.top = yp[i];
      document.getElementById("dot"+i).style.left = xp[i] + am[i]*Math.sin(dx[i]);
    }
    setTimeout("snowNN6()", 10);
  }
  if (ns4up) {
    snowNS();
  } else if (ie4up) {
 snowIE();
  } else if (nn6up) {
 snowNN6();
  }

</SCRIPT>
<!-- FIN IMG FOND -->

<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template_accueil.php'); ?>
</body>