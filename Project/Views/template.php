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
<link rel="stylesheet" href="Public/css/flexslider.css">
<link rel="stylesheet" href="Public/css/styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">


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
<script src="Public/js/flexslider.js"></script>
<script src="Public/js/jquery.quicksand.js"></script>
<script src="Public/js/jquery.prettyPhoto.js"></script>
<script src="Public/js/jquery.easing.1.3.js"></script>


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

            <!--<li class="dropdown active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="index.php">Home <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="index.htm">Full Page</a></li>
                    <li><a href="index-gallery.htm">Gallery Only</a></li>
                    <li><a href="index-slider.htm">Slider Only</a></li>
                </ul>
            </li>-->

            <!--
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="page-full-width.htm">Mon Profil<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="index.php?page=profile">Mes informations personnelles</a></li>
                    <li><a href="index.php?page=profile">Mes hobbies</a></li>
                    <li><a href="index.php?page=profile&action=unsub">Se désinscrire</a></li>
                     <li><a href="index.php?page=profile&action=stat">Voir mes statistiques</a></li> 
                     <li><a href="index.php?page=profile">Déconnexion</a></li> 
                </ul>
            -->

            
                

        
</form>
            <!--</li>
             <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="gallery-4col.htm">Mon Inventaire <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="gallery-3col.htm">Gallery 3 Column</a></li>
                    <li><a href="gallery-4col.htm">Gallery 4 Column</a></li>
                    <li><a href="gallery-6col.htm">Gallery 6 Column</a></li>
                    <li><a href="gallery-4col-circle.htm">Gallery 4 Round</a></li>
                    <li><a href="gallery-single.htm">Gallery Single</a></li>
                </ul>
             </li>-->

             <li><a href="index.php?page=profile">Mon Profil</a></li>

            <li><a href="index.php?page=inventory">Mon inventaire</a></li>

             <li><a href="index.php?page=forum">Forum</a></li>

             <li><a href="index.php?page=store">Cards Store</a></li>

             <li><a href="index.php?page=dc">Déconnexion</a></li>

            </ul>
           
            </div>

            <!-- Mobile Nav
            ================================================== -->
            <form action="#" id="mobile-nav" class="visible-phone">
                <div class="mobile-nav-select">
                <select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                    <option value="">Navigate...</option>
                    <option value="index.htm">Home</option>
                        <option value="index.htm">- Full Page</option>
                        <option value="index-gallery.htm">- Gallery Only</option>
                        <option value="index-slider.htm">- Slider Only</option>
                    <option value="features.htm">Features</option>
                    <option value="page-full-width.htm">Pages</option>
                        <option value="page-full-width.htm">- Full Width</option>
                        <option value="page-right-sidebar.htm">- Right Sidebar</option>
                        <option value="page-left-sidebar.htm">- Left Sidebar</option>
                        <option value="page-double-sidebar.htm">- Double Sidebar</option>
                    <option value="gallery-4col.htm">Gallery</option>
                        <option value="gallery-3col.htm">- 3 Column</option>
                        <option value="gallery-4col.htm">- 4 Column</option>
                        <option value="gallery-6col.htm">- 6 Column</option>
                        <option value="gallery-4col-circle.htm">- Gallery 4 Col Round</option>
                        <option value="gallery-single.htm">- Gallery Single</option>
                    <option value="blog-style1.htm">Blog</option>
                        <option value="blog-style1.htm">- Blog Style 1</option>
                        <option value="blog-style2.htm">- Blog Style 2</option>
                        <option value="blog-style3.htm">- Blog Style 3</option>
                        <option value="blog-style4.htm">- Blog Style 4</option>
                        <option value="blog-single.htm">- Blog Single</option>
                    <option value="page-contact.htm">Contact</option>
                </select>
                </div>
                </form>
                
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
     
    <!-- Blog Content
    ================================================== --> 
    <div class="row">

        <!-- Blog Posts
        ================================================== --> 
        <div class="span8 blog">

                <?php if (isset($content)) {
                    echo $content; 
                } 
                ?>

        </div>   

        <!-- Blog Sidebar
            ================================================== --> 
            <?php 
            if ($_GET['page'] !== 'store') {
                ?>
                <div class="span4 sidebar">

                    <!--Search-->
                    <section>
                        <div class="input-append">
                            <form action="#">
                                <input id="appendedInputButton" size="16" type="text" placeholder="Chercher"><button class="btn" type="button"><i class="icon-search"></i></button>
                            </form>
                        </div>
                    </section>
                <?php
            }

        
            if(isset($_GET['page']) && ($_GET['page'] == 'inventory') || $_GET['page'] == 'forum') { ?>

                <!--Categories-->
                <h5 class="title-bg">Option</h5>
                <ul class="post-category-list">

            <?php
                if($_GET['page'] == 'inventory') { ?>
                    <h5><li><a href="index.php?page=inventory&action=create_deck"><i class="icon-plus-sign"></i>Créer un nouveau deck</a></li>

                    <?php if(isset($_GET['action']) && $_GET['action'] == 'modify') { ?>
                            <li><a href="index.php?page=inventory&action=settings&deck=<?php echo $_GET['deck']; ?>"><i class="icon-wrench"></i>Modifier paramètres du deck</a></li></h5>
                    <?php } ?>
            <?php   
                }else if ($_GET['page'] == 'forum') { ?>
                    <h5><li><a href="index.php?page=forum&choix_forum=creer_sujet"><i class="icon-plus-sign"></i>Créer un nouveau sujet</a></li> </h5>
            <?php
                } ?>

                    <!-- <li><a href="#"><i class="icon-plus-sign"></i>Illustration</a></li>
                        <li><a href="#"><i class="icon-plus-sign"></i>Tutorials</a></li>
                        <li><a href="#"><i class="icon-plus-sign"></i>News</a></li>-->
                    </ul>
        <?php
            } 
            

            if ($_GET['page'] !== 'store') {
                ?>
                <h5 class="title-bg">FORUM : Les sujets les plus populaires</h5>
                <ul class="popular-posts">
                    <li>
                        <!--<a href="blog-single.htm"><img src="Public/img/gallery/gallery-img-2-thumb.jpg" alt="Popular Post"></a>-->
                        <h6><a href="#"><b>Sujet : </b>Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h6>
                        <em>Posted on 09/01/15</em>
                    </li>
                    <li>
                        <!--<a href="blog-single.htm"><img src="Public/img/gallery/gallery-img-2-thumb.jpg" alt="Popular Post"></a>-->
                        <h6><a href="#"><b>Sujet : </b>Nulla iaculis mattis lorem, quis gravida nunc iaculis</a></h6>
                        <em>Posted on 09/01/15</em>
                    <li>
                        <!--<a href="blog-single.htm"><img src="Public/img/gallery/gallery-img-2-thumb.jpg" alt="Popular Post"></a>-->
                        <h6><a href="#"><b>Sujet : </b>Vivamus tincidunt sem eu magna varius elementum maecenas felis</a></h6>
                        <em>Posted on 09/01/15</em>
                    </li>
                </ul>
                
            <!--Tabbed Content
            <h5 class="title-bg">More Info</h5>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#comments" data-toggle="tab">Comments</a></li>
                <li><a href="#tweets" data-toggle="tab">Tweets</a></li>
                <li><a href="#about" data-toggle="tab">About</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="comments">
                     <ul>
                        <li><i class="icon-comment"></i>admin on <a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><i class="icon-comment"></i>admin on <a href="#">Consectetur adipiscing elit</a></li>
                        <li><i class="icon-comment"></i>admin on <a href="#">Ipsum dolor sit amet consectetur</a></li>
                        <li><i class="icon-comment"></i>admin on <a href="#">Aadipiscing elit varius elementum</a></li>
                        <li><i class="icon-comment"></i>admin on <a href="#">ulla iaculis mattis lorem</a></li>
                    </ul>
                </div>
                <div class="tab-pane" id="tweets">
                    <ul>
                        <li><a href="#"><i class="icon-share-alt"></i>@room122</a> Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna.</li>
                        <li><a href="#"> <i class="icon-share-alt"></i>@room122</a> Nulla faucibus ligula eget ante varius ac euismod odio placerat.</li>
                        <li><a href="#"> <i class="icon-share-alt"></i>@room122</a> Pellentesque iaculis lacinia leo. Donec suscipit, lectus et hendrerit posuere, dui nisi porta risus, eget adipiscing</li>
                        <li><a href="#"> <i class="icon-share-alt"></i>@room122</a> Vivamus augue nulla, vestibulum ac ultrices posuere, vehicula ac arcu.</li>
                        <li><a href="#"> <i class="icon-share-alt"></i>@room122</a> Sed ac neque nec leo condimentum rhoncus. Nunc dapibus odio et lacus.</li>
                    </ul>
                </div>
                <div class="tab-pane" id="about">
                    <p>Enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p>

                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                </div>
            </div>-->

            <!--Video Widget-->
            <h5 class="title-bg">Une petite musique ?</h5>
            <iframe src="http://player.vimeo.com/video/24496773" width="370" height="208"></iframe>
            <?php 
        }?>
        </div>

    </div>
    
    </div> <!-- End Container -->

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
                    <h5>Latest Posts</h5>
                     <ul class="post-list">
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Consectetur adipiscing elit est lacus gravida</a></li>
                        <li><a href="#">Lectus sed orci molestie molestie etiam</a></li>
                        <li><a href="#">Mattis consectetur adipiscing elit est lacus</a></li>
                        <li><a href="#">Cras rutrum, massa non blandit convallis est</a></li>
                    </ul>
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
