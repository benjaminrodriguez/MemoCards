<?php ob_start(); ?>

    <form method="POST" action="">
    <!-- Affiche les 3 derniers decks utilisés -->
        <p><h1> <i>Vos decks :</i>  </h1></p>


    <?php for($i=0; $i<8; $i++)

            { 
                if(isset($datas[$i]['name'])) 
                { 
                    ?>
                    <!-- Blog Post 1 -->
                    <article class="clearfix">
                        <a href="blog-single.htm"><img src="<?php echo htmlspecialchars($datas[$i]['picture']); ?>" alt="Post Thumb" class="align-left" style="width: 200px;" ></a>
                        <h4 class="title-bg"><a href="blog-single.htm"><?php echo htmlspecialchars($datas[$i]['name']); ?></a></h4>
                        <p> <?php echo htmlspecialchars($datas[$i]['description']); ?> </p>

                        <!-- <button class="btn btn-mini btn-inverse" type="button" name="top_3_deck" value="<?php //echo $datas[$i]['id']; ?>">Lancer une partie</button> -->
                        <a class="btn btn-mini btn-inverse" href="index.php?page=game&deck=<?php echo htmlspecialchars($datas[$i]['deck_id']);?>"><font size="3">MODE QCM </font></a>

                        <!-- <button class="btn btn-mini btn-inverse" type="submit" name="start_game" value="<?php //echo htmlspecialchars($datas[$i]['deck_id']); ?>">Lancer une partie</button> -->
                        

                        <div class="post-summary-footer">
                            <ul class="post-data-3">
                                <li><i class="icon-calendar"></i><?php echo htmlspecialchars($datas[$i]['date_creation']); ?></li>


                                <!-- Bouton modifier deck -->
                                <?php if($_SESSION['id'] == $datas[$i]['autor_id']) { ?> <li><i class="icon-cog"></i> <a href="index.php?page=inventory&action=modify&deck=<?php echo htmlspecialchars($datas[$i]['deck_id']); ?>">Modifier</a></li> <?php }?>
                                
                                <li><i class="icon-align-left"></i> <a href="index.php?page=profile&action=stat&deck=<?php echo htmlspecialchars($datas[$i]['deck_id']);?>">Vos Statistiques</a></li>
                                <li><i class="icon-trash"></i> <a href="#">Supprimer</a></li>
                                <li><i class="icon-tags"></i> <a href="#">photoshop</a>, <a href="#">tutorials</a></li>
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
        
<?php $content = ob_get_clean(); ?>

