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
                        <h4 class="title-bg"><a href="blog-single.htm"><?php echo htmlspecialchars($datas[$key]['name']); ?></a></h4>
                        <p> <?php echo htmlspecialchars($datas[$key]['description']); ?> </p>

                        <!-- <button class="btn btn-mini btn-inverse" type="button" name="top_3_deck" value="<?php //echo $datas[$key]['id']; ?>">Lancer une partie</button> -->
                        <a class="btn btn-info" href="index.php?page=game&deck=<?php echo htmlspecialchars($datas[$key]['deck_id']);?>"><font size="3">MODE QCM </font></a>
                        <a class="btn btn-success" href="index.php?page=game2&deck=<?php echo htmlspecialchars($datas[$key]['deck_id']);?>"><font size="3">ENTRAINEMENT </font></a>

                        <!-- <button class="btn btn-mini btn-inverse" type="submit" name="start_game" value="<?php //echo htmlspecialchars($datas[$key]['deck_id']); ?>">Lancer une partie</button> -->
                        

                        <div class="post-summary-footer">
                            <ul class="post-data-3">
                                <li><i class="icon-calendar"></i><?php echo htmlspecialchars($datas[$key]['date_creation']); ?></li>

                        
                                <!-- Bouton modifier deck -->
                                <?php if($_SESSION['id'] == $datas[$key]['autor_id']) { ?> <li><i class="icon-cog"></i> <a href="index.php?page=inventory&action=modify&deck=<?php echo htmlspecialchars($datas[$key]['deck_id']); ?>">Modifier</a></li> <?php }?>
                                
                                <li><i class="icon-align-left"></i> <a href="index.php?page=profile&action=stat&deck=<?php echo htmlspecialchars($datas[$key]['deck_id']);?>">Vos Statistiques</a></li>
                                <!--<li><i class="icon-trash"></i> <a href="#">Supprimer</a></li>-->

                                
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

