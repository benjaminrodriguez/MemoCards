<?php ob_start(); ?>

    <!-- Page Content
    ================================================== --> 
    <div class="row">

        <!-- Gallery Items
        ================================================== --> 
        <div class="span12 gallery-single">

            <div class="row">
                <div class="span6">
                    <img src=" <?php echo $deck[0]['picture']; ?> " class="align-left thumbnail" alt="image">
                </div>

                <div class="span6">
                    <h2> <?php echo 'Titre : '.$deck[0]['name']; ?> </h2>


                    <?php   
                        
                        echo round($deck[0]['avg_mark'], 1).' / 5 <br>';
                        $star = intval($deck[0]['avg_mark']);

                            for ($i=0; $i < 5; $i++)
                            {
                                if($star <= $i)
                                {
                                    //echo '<a href="#'.($i+1).'" class="icon-star-empty" style="float:left;"> </a>';
                                    echo ' <i class="icon-star-empty"> </i>';
                                } 
                                else 
                                {
                                    //echo '<a href="#'.($i+1).'" class="icon-star" style="float: left;"> </a>';
                                    echo ' <i class="icon-star"> </i>';
                                }
                            }
                ?>


                    <p class="lead"> <?php echo $deck[0]['description']; ?> </p>
                    <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac.
                     Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. 
                     Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat.
                      Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p> -->

                    <ul class="project-info">
                        <li><h6>Date de création:</h6> <?php echo $deck[0]['date']; ?> </li>
                        <li><h6>Catégories</h6> <?php echo $deck[0]['categories']; ?> </li>
                        <li><h6>Auteur:</h6>  <?php echo $deck[0]['autor']; ?> </li>
                        <!--<li><h6>Art Director:</h6> Jane Doe</li>
                        <li><h6>Designer:</h6> Jimmy Doe</li>-->
                    </ul>

                    
                    <div style='text-align: left'> 
                        <a href='index.php?page=application&newdeck=<?php echo $deck[0]['id']; ?>'>  <img src='./Public/img/down.png' style='width:40px;height:40px'/> Télécharger le deck</a></div>
                        <a href="index.php?page=store" class="pull-right" ><i class="icon-arrow-left"></i>Revenir en arrière</a>
                </div>
            </div>

        </div><!-- End gallery-single-->

    </div><!-- End container row -->
    



    <!-- Blog Content
    ================================================== --> 
    <div class="row"><!--Container row-->

        <!-- Blog Full Post
        ================================================== --> 
        <div class="span10 blog">

                <!-- Comment Form -->
                <div class="comment-form-container">
                        <h6>Laisser une note  </h6>
                        <style type="text/css">

em {
    display: block;
    margin: .5em auto 2em;
    color: #bbb;
}

p, p a {
    color: #aaa;
    text-decoration: none;
}
p a:hover,
p a:focus {
    text-decoration: underline;
}
p + p { color: #bbb; margin-top: 2em;}
.detail {position: absolute; text-align: right; right: 5px; bottom: 5px; width: 50%;}
 
a[href*="intent"] {
    display:inline-block;
    margin-top: 0.4em;
    padding-left: 25px;
    background: url(full-css-microsoft-logo/bird.png) 0 4px no-repeat;
}
/* 
 * Rating styles
 */
.rating {
    width: 226px;
    position: relative;
    top: -30px;
    left: -400px;
    margin: 0 auto 1em;
    font-size: 25px;
    overflow:hidden;
}
.rating a {
    float:right;
    color: #aaa;
    text-decoration: none;
    -webkit-transition: color .4s;
    -moz-transition: color .4s;
    -o-transition: color .4s;
    transition: color .4s;
}
.rating a:hover,
.rating a:hover ~ a,
.rating a:focus,
.rating a:focus ~ a     {
    color: orange;
    cursor: pointer;
}
.rating2 {
    direction: rtl;
}
.rating2 a {
    float:none
}
 
</style>


<div class="rating rating2">
       <a href="index.php?page=application&id=<?php echo $_GET['id']; ?>&mark=5" title="Mettre 5 étoiles">★</a><!--
    --><a href="index.php?page=application&id=<?php echo $_GET['id']; ?>&mark=4" title="Mettre 4 étoiles">★</a><!--
    --><a href="index.php?page=application&id=<?php echo $_GET['id']; ?>&mark=3" title="Mettre 3 étoiles">★</a><!--
    --><a href="index.php?page=application&id=<?php echo $_GET['id']; ?>&mark=2" title="Mettre 2 étoiles">★</a><!--
    --><a href="index.php?page=application&id=<?php echo $_GET['id']; ?>&mark=1" title="Mettre 1 étoile">★</a>
</div>


                        


                        <form action="" id="comment-form" method="POST">
                            <!--<div class="input-prepend">
                                <span class="add-on"><i class="icon-user"></i></span>
                                <input class="span4" id="prependedInput" size="16" type="text" placeholder="Name">
                            </div>
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input class="span4" id="prependedInput" size="16" type="text" placeholder="Email Address">
                            </div>
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-globe"></i></span>
                                <input class="span4" id="prependedInput" size="16" type="text" placeholder="Website URL">
                            </div>-->
                            
                            <textarea name="my_comment" class="span6"></textarea>
                            <div class="row">
                                <div class="span2">
                                    <input type="submit" class="btn btn-inverse" name ="new_comment" value="Poster mon avis">
                                </div>
                            </div>
                        </form>
                    </div>



            <!-- Blog Post 1 
            <article>
                <h3 class="title-bg"><a href="#">A subject that is beautiful in itself</a></h3>
                <div class="post-content">
                    <a href="#"><img src="img/gallery/post-img-1.jpg" alt="Post Thumb"></a>

                    <div class="post-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>

                        <p class="well"><a href="#" rel="tooltip" title="An important message">Proin tristique</a> tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>

                       <p> Nam sit amet felis non lorem faucibus rhoncus vitae id dui. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>

                       <blockquote>
                            Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat.
                       </blockquote>

                       <p>Nam sit amet felis non lorem faucibus rhoncus vitae id dui.Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>
                    </div>

                    <div class="post-summary-footer">
                        <ul class="post-data">
                            <li><i class="icon-calendar"></i> 09/04/15</li>
                            <li><i class="icon-user"></i> <a href="#">Admin</a></li>
                            <li><i class="icon-comment"></i> <a href="#">5 Comments</a></li>
                            <li><i class="icon-tags"></i> <a href="#">photoshop</a>, <a href="#">tutorials</a>, <a href="#">illustration</a></li>
                        </ul>
                    </div>
                </div>
            </article> -->

            <!-- About the Author 
            <section class="post-content">
                <div class="post-body about-author">
                    <img src="img/author-avatar.jpg" alt="author">
                    <h4>About Nathan Brown</h4>
                    Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.
                </div>
            </section>-->

        <!-- Post Comments
        ================================================== --> 
            <section class="comments">
                <h4 class="title-bg"><a name="comments"></a>Avis des utilisateurs</h4>

               <ul>

               <?php foreach($comments as $key => $value)
                    { ?>
                        <li>
                            <!--<img src="<?php //echo $comments[$key]['picture']; ?>" alt="Image" />-->
                            <span class="comment-name"><?php echo $comments[$key]['name']; ?></span>
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                            <span class="comment-date"> |  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                
                        
                                <?php   
                            
                                    echo round($comments[$key]['mark'], 1).' / 5 ';
                                    $star = intval($comments[$key]['mark']);

                                    for ($i=0; $i < 5; $i++)
                                    {
                                        if($star <= $i)
                                        {
                                            //echo '<a href="#'.($i+1).'" class="icon-star-empty" style="float:left;"> </a>';
                                            echo ' <i class="icon-star-empty"> </i>';
                                        } 
                                        else 
                                        {
                                            //echo '<a href="#'.($i+1).'" class="icon-star" style="float: left;"> </a>';
                                            echo ' <i class="icon-star"> </i>';
                                        }
                                    }
                                ?>
                        
                        
                            </span>
                            <div class="comment-content"> <?php echo $comments[$key]['comment']; ?></div>
                        </li>
                <?php
                    } ?>
                    
                    
               </ul>
            
                
        </section><!-- Close comments section-->

        </div><!--Close container row-->





    </div> <!-- End Container -->

    



<?php $content = ob_get_clean(); ?>