<?php ob_start(); ?>

   
    <!-- Affiche les 3 derniers decks utilisés -->
        <p><h1> <i>Vos decks :</i>  </h1></p>
        <form method="POST" action="">
    <?php foreach($datas as $key => $value)
            //for($key=0; $key<8; $key++)

            { 
                if(isset($datas[$key]['name'])) 
                { 
                    ?>
                    <!-- Blog Post 1 -->
                    <article class="clearfix">
                        <a href="blog-single.htm"><img src="<?php echo htmlspecialchars($datas[$key]['picture']); ?>" alt="Post Thumb" class="align-left" style="width:230px;height:190px;" ></a>
                        <h4 class="title-bg"><a href="index.php?page=inventory&training=<?php echo htmlspecialchars($datas[$key]['deck_id']);?>&card=1"><?php echo htmlspecialchars($datas[$key]['name']); ?></a></h4>
                        <p> <b> <i> <u> Description </u> :</i> </b>  <br>
                         <?php echo htmlspecialchars($datas[$key]['description']); ?> </p>

                        <?php if(intval($count_question[$key][0]['count_question']) >= 10) {  ?>
                                <!-- <button class="btn btn-mini btn-inverse" type="button" name="top_3_deck" value="<?php //echo $datas[$key]['id']; ?>">Lancer une partie</button> -->
                                <a class="btn btn-success" href="index.php?page=inventory&training=<?php echo htmlspecialchars($datas[$key]['deck_id']);?>&card=1"><font size="3">Entrainement </font></a>
                                <a class="btn btn-info" href="index.php?page=game&deck=<?php echo htmlspecialchars($datas[$key]['deck_id']);?>"><font size="3">QCM </font></a>
                                <a class="btn btn-warning" href="index.php?page=game2&deck=<?php echo htmlspecialchars($datas[$key]['deck_id']);?>"><font size="3">Révision </font></a>
                        <?php } else {?>
                                <a class="btn btn-inverse" href="#myQuestion"><font size="3">Entrainement </font></a>
                                <a class="btn btn-inverse" href="#myQuestion"><font size="3">QCM </font></a>
                                <a class="btn btn-inverse" href="#myQuestion"><font size="3">Révision </font></a>

                                    <!-- Modal -->
                                    <div class="modal hide fade" id="myQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h5 id="myModalLabel">Rappel</h5>
                                        </div>
                                
                                        <div class="modal-body">
                                            <p>Pour jouer avec ce deck il est nécessaire d'y créer au moins 10 questions.
                                                <br> Rendez-vous sur l'option "modifier" pour ajouter ou modifier des questions. </p>
                                        </div>

                                    
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">ok.</button>
                                            
                                            <button type="submit" name="question" value="question" class="btn btn-inverse">Oui, je confirme !</button>
                                            <!--<a href="index.php?page=inventory&deck_delete=3" class="btn btn-inverse">Oui, je confirme !</a>-->
                                        </div> 
                                     
                                    </div>

                        <?php } ?>

                        <!-- <button class="btn btn-mini btn-inverse" type="submit" name="start_game" value="<?php //echo htmlspecialchars($datas[$key]['deck_id']); ?>">Lancer une partie</button> -->
                        

                        <div class="post-summary-footer">
                            <ul class="post-data-3">
                                <li><i class="icon-calendar"></i><?php echo htmlspecialchars($datas[$key]['date_creation']); ?></li>

                        
                                <!-- Bouton modifier deck -->
                                <?php if($_SESSION['id'] == $datas[$key]['autor_id']) { ?> <li><i class="icon-cog"></i> <a href="index.php?page=inventory&action=modify&deck=<?php echo htmlspecialchars($datas[$key]['deck_id']); ?>">Modifier</a></li> <?php }?>
                                
                                <!--<li><i class="icon-align-left"></i> <a href="index.php?page=profile&action=stat&deck=<?php echo htmlspecialchars($datas[$key]['deck_id']);?>">Vos Statistiques</a></li>-->
                                <!--<li><i class="icon-trash"></i> <a href="#">Supprimer</a></li>-->


                                <!-- ----------------------------------buton voir stats du deck ------------------------------------------>     
                                <li><i class="icon-align-left"></i>  <a href="#myStats<?php echo $key; ?>"  data-toggle="modal">Vos Statistiques</a></li>

                                    <!-- Modal -->
                                    <div class="modal hide fade" id="myStats<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h5 id="myModalLabel">Vos statistiques</h5>
                                    </div>

                                    <div class="modal-body">
                                        <p>Votre maîtrisse du deck : </p>
                                        <?php 

                                            $total = 0;
                                            $nb = 0;
                                            foreach($stats_views as $key1 => $value1) 
                                            {
                                                if($stats_views[$key1]['deck_id'] == $datas[$key]['deck_id']  &&  intval($stats_views[$key1]['played_cards']) !== 0) 
                                                {
                                                    $total += intval(intval($stats_views[$key1]['nb_succes'])/intval($stats_views[$key1]['played_cards'])*100);
                                                    $nb++;
                                                }
                                            }
                                            ($nb === 0)? $nb++ : NULL ;
                                            $moyenne = $total / $nb;
                                            $moyenne = number_format($moyenne, 2, ',', ' ');
                                        
                                        ?>
                                            <!-- Progress Bars
                                                    ================================================== --> 
                                            <div class="span4">
                                                <h6 class="title-bg">Maîtrise du deck gobale : <small><?php echo $moyenne; ?> %</small></h6> 

                                        <?php   if($moyenne > 80)
                                                { ?>
                                                        <div class="progress progress-success progress-striped">
                                                            <div class="bar" style="width: <?php echo round($moyenne);  ?>%"></div>
                                                        </div>
                                        <?php   } 
                                                else if ($moyenne > 60)
                                                {   ?>
                                                        <div class="progress progress-warning progress-striped">
                                                            <div class="bar" style="width: <?php echo round($moyenne);  ?>%"></div>
                                                        </div>
                                        <?php   }  
                                                else if ($moyenne > 40)
                                                {   ?>
                                                        <div class="progress progress-warning progress-striped">
                                                            <div class="bar" style="width: <?php echo round($moyenne);  ?>%"></div>
                                                        </div>
                                        <?php   } 
                                                else
                                                { ?>   
                                                    <div class="progress progress-danger progress-striped">
                                                            <div class="bar" style="width: <?php echo round($moyenne);  ?>%"></div>
                                                    </div>
                                        <?php } ?>
                                                    
                                            </div>


                                            <div class="span4">
                                        <?php
                                            $nb_card = 1;
                                            foreach($stats_views as $key1 => $value1) 
                                            {
                                                
                                                if($stats_views[$key1]['deck_id'] == $datas[$key]['deck_id']) 
                                                {
                                                    //var_dump($stats_views);
                                                    echo "<b>Carte ".$nb_card." :<br> ".$stats_views[$key1]['question_cards']."&nbsp &nbsp<br></b>";

                                                    if (intval($stats_views[$key1]['played_cards']) === 0) {
                                                       ?>
                                                       <i>  La carte n'a pas encore été jouée.</i><br><br>
                                                       <?php
                                                   }
                                                   elseif (intval($stats_views[$key1]['level_cards']) > 4) {
                                                    ?>
                                                    <i>  La carte a été jouée <?php echo $stats_views[$key1]['played_cards']; ?> fois avec 
                                                    <?php echo intval(intval($stats_views[$key1]['nb_succes'])/intval($stats_views[$key1]['played_cards'])*100); ?> % de réussite.</i> 
                                                    &nbsp &nbsp &nbsp &nbsp 
                                                    <br><img src="./Public/img/level/first.PNG" style="width:30px; height:30px;" > Lv. 3 Niveau MAX Bien joué !<br><br><?php
                                                   
                                                   }
                                                   elseif (intval($stats_views[$key1]['level_cards']) > 3) {
                                                    ?>
                                                    <i>  La carte a été jouée <?php echo $stats_views[$key1]['played_cards']; ?> fois avec 
                                                    <?php echo intval(intval($stats_views[$key1]['nb_succes'])/intval($stats_views[$key1]['played_cards'])*100); ?> % de réussite.</i> 
                                                    &nbsp &nbsp &nbsp &nbsp 
                                                    <br><img src="./Public/img/level/first.PNG" style="width:30px; height:30px;" > Lv. 2 Continues comme ca !<br><br><?php
                                                   }
                                                   else {
                                                    ?>
                                                    <i>  La carte a été jouée <?php echo $stats_views[$key1]['played_cards']; ?> fois avec 
                                                    <?php echo intval(intval($stats_views[$key1]['nb_succes'])/intval($stats_views[$key1]['played_cards'])*100); ?> % de réussite.</i> 
                                                    &nbsp &nbsp &nbsp &nbsp 
                                                    <br><img src="./Public/img/level/first.PNG" style="width:30px; height:30px;" > Lv. 1 Accroches toi, tu vas y arriver !<br><br><?php
                                                   }
                                                   $nb_card++;
                                                }
                                               
                                            }

                                        ?>
                                            </div>
                                        </div>


                                    <div class="modal-footer">
                                        <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Ok</button>
                                        
                                        <!--<button type="submit" name="" value="" class="btn btn-inverse">Oui, je confirme !</button>-->
                                        <!--<a href="" class="btn btn-inverse">Oui, je confirme !</a>-->
                                    </div> 

                            </div>












                           <!-- ----------------------------------buton supprimer le deck ------------------------------------------>     
                                    <li><i class="icon-trash"></i><a href="#myModal<?php echo $key; ?>"  data-toggle="modal">Supprimer</a></li>

                                        <!-- Modal -->
                                    <div class="modal hide fade" id="myModal<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h5 id="myModalLabel">Message de confirmation</h5>
                                        </div>
                                
                                        <div class="modal-body">
                                            <p>Toute supprésion sera définitive. 
                                                <br> Êtes-vous sûr  de vouloir supprimer ce deck ? </p>
                                        </div>

                                    
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Non.</button>
                                            
                                            <button type="submit" name="deck_delete" value="<?php echo $datas[$key]['deck_id']; ?>" class="btn btn-inverse">Oui, je confirme !</button>
                                            <!--<a href="index.php?page=inventory&deck_delete=3" class="btn btn-inverse">Oui, je confirme !</a>-->
                                        </div> 
                                     
                                    </div>


                            <!-- ----------------------------------buton supprimer le deck ------------------------------------------>     
                            <li><i class="icon-share"></i><a href="#myModal2<?php echo $key; ?>"  data-toggle="modal">Partager</a></li>

                                <!-- Modal -->
                            <div class="modal hide fade" id="myModal2<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h5 id="myModalLabel">Message de confirmation</h5>
                                </div>
                        
                                <div class="modal-body">
                                    Êtes-vous sûr  de vouloir partager ce deck ?
                                </div>

                            
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Non.</button>
                                    
                                    <button type="submit" name="deck_share" value="<?php echo $datas[$key]['deck_id']; ?>" class="btn btn-inverse">Oui, je confirme !</button>
                                    <!--<a href="index.php?page=inventory&deck_delete=3" class="btn btn-inverse">Oui, je confirme !</a>-->
                                </div> 
                                
                            </div>

                                    
                             


                                <li><i class="icon-tags"></i> #hashtags, #hashtags</li>
                            </ul>
                        </div>
                    </article>
    <?php       }
            } ?>
               
        

    <!-- Pagination -->
    <div class="pagination">
        <ul>
        <li class="active"><a href="#">Prev</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
        </ul>
    </div>
    </form> 
<?php $content = ob_get_clean(); ?>

