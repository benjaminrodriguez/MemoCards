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
    
    </div> <!-- End Container -->

    


<?php $content = ob_get_clean(); ?>