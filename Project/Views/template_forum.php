<?php ob_start(); ?>

    <?php
        foreach($subjects_views as $key => $value) {  ?>
            <!-- Blog Post 1 -->
            <article>
                <div class="row">
                    <div class="span2 blog-style-2">
                        <h4 class="title-bg"><?php echo $subjects_views[$key]['date_posted'] ?></h4>
                        <ul class="post-data">
                            <li><i class="icon-user"></i> <a href="#"><?php echo $type[$key].' : '.$name[$key]; ?></a></li>
                            <li><i class="icon-comment"></i> <a href="#"><?php echo $subjects_views[$key]['count_message']; ?> Commentaires</a></li>
                            <li><i class="icon-tags"></i> <a href="#">photoshop</a>, <a href="#">tutorials</a>, <a href="#">illustration</a>, <a href="#">events</a></li>
                        </ul>
                        <button onclick="location.href='index.php?page=forum&subject_id=<?php echo $subjects_views[$key][0]; ?>'" class="btn btn-small btn-inverse">Voir plus</button>
                    </div>
                    <div class="span6">       
                        <h3 class="title-bg"><a href="index.php?page=forum&subject_id=<?php echo $subjects_views[$key][0]; ?>"><?php echo $subjects_views[$key]['title']; ?> </a></h3>
                        <p><?php echo $subjects_views[$key]['content'] ?></p>
                    </div>    
                </div>
            </article>

    <?php
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