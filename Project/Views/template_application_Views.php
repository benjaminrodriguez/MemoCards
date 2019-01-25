<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>  <?php if (isset($title)) echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="Public/css/bootstrap.css">
<link rel="stylesheet" href="Public/css/bootstrap-responsive.css">
<link rel="stylesheet" href="Public/css/jquery.lightbox-0.5.css">
<link rel="stylesheet" href="Public/css/custom-styles.css">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/style-ie.css"/>
<![endif]--> 

<!-- Favicons
================================================== -->
<link rel="shortcut icon" href="./img/favicon.png">
<link rel="apple-touch-icon" href="../Public/img/favicon.png">
<link rel="apple-touch-icon" sizes="72x72" href="../Public/img/favicon.png">
<link rel="apple-touch-icon" sizes="114x114" href="../Public/img/favicon.png">

<!-- JS
================================================== -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="Public/js/bootstrap.js"></script>
<script src="Public/js/jquery.custom.js"></script>


</head>

<body>
	<div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>
    
    <div class="container main-container">
    
      <div class="row header"><!-- Begin Header -->
      
        <!-- Logo
        ================================================== -->
        <div class="span4 logo">
            <a href="index.php"><img src="Public/img/memocards_black.png" alt="" /></a>
            <h5>Réviser mieux ... Apprenez-en plus !</h5>
            <br><br><br>
            <h1> <?php if (isset($section)) echo $section; ?></h1>
        </div>
        
        <!-- Main Navigation
        ================================================== -->
        <div class="span6 navigation">
            <div class="navbar hidden-phone">
            
            <ul class="nav">

           <li><a href="index.php">Accueil</a></li>

        
</form>


            <li><a href="index.php?page=profile">Mon Profil</a></li>

            <li><a href="index.php?page=inventory">Mon inventaire</a></li>

             <li><a href="index.php?page=forum">Forum</a></li>

             <li><a href="index.php?page=store">Cards Store</a></li>

             <li><a href="index.php?page=dc">Déconnexion</a></li>

            </ul>
           
            </div>

           
                
        </div>

        <div class="span2 logo">
            <img src=<?php echo $_SESSION['profile_picture'];?> style="width:70px;height:70px;">
            <div style="position:relative;left:140px;float:left"> 
                <a href="index.php?page=profile"><b style="font-size:20px"><?php echo $_SESSION['username']; ?></b></a>
                <br>
                <i style="font-size:15px">
                    <?php echo $_SESSION['status']; ?> 
                </i>
            </div>
            
        </div>

      </div><!-- End Header -->
     
        <!-- Page Content
        ================================================== --> 
 

            <?= $content ?>
            
</div>

        <!-- Footer Area
            ================================================== -->

	<div class="footer-container"><!-- Begin Footer -->
    	<div class="container">
        	
            <div class="row footer-row">
                <div class="span3 footer-col">
                    <h5>A notre propos</h5>
                   <img src="Public/img/memocards.png" alt="Piccolo" /><br /><br />
                    <address>
                        <strong>Developper Team</strong><br />
                        8 bis avenue Maurice Thorez<br />
                        Ivry, 94200<br />
                    </address>
                    
                </div>
                <div class="span3 footer-col">
                   
                </div>

                <div class="span3 footer-col">
                   
                </div>
            </div>

            <div class="row"><!-- Begin Sub Footer -->
                <div class="span12 footer-col footer-sub">
                    <div class="row no-margin">
                        <div class="span6"><span class="left">Copyright 2018 Memocards Theme. All rights reserved.</span></div>
                        <div class="span6">
                            <span class="right">
                            <a href="index.php?page=home">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="index.php?page=profile">Profil</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="index.php?page=inventory">Inventaire de deck</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="index.php?page=forum">Forum</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="index.php?page=store">CardStore</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="index.php?page=dc"> Déconnexion</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- End Sub Footer -->

        </div>
    </div><!-- End Footer --> 
    
    <!-- Scroll to Top -->  
    <div id="toTop" class="hidden-phone hidden-tablet">Back to Top</div>
    
</body>
</html>

