<?php ob_start(); ?>

<div class="row">

        <!-- Gallery Items
        ================================================== --> 
        <div class="span12 gallery">

            <ul id="filterOptions" class="gallery-cats clearfix">
                <li class="active"><a href="#" class="all">Tout</a></li> 
                <li class=""><a href="#" class="illustration">Illustration</a></li>
                <li class=""><a href="#" class="design">Design</a></li>
                <li class=""><a href="#" class="video">Video</a></li>
                <li class=""><a href="#" class="web">Web</a></li>
            </ul>

            <div class="row clearfix">
                <ul class="gallery-post-grid holder" style="height: 3912px;"><li class="span3 gallery-item" data-id="id-1" data-type="illustration">

                <?php

                foreach ($arraydeckstore as $key => $value) {
                    ?>

                    <span class="gallery-hover-4col hidden-phone hidden-tablet">
                        <span class="gallery-icons">
                                <a href="./Public/img/gallery/gallery-img-1-full.jpg" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto" rel="prettyPhoto"></a>
                                <a href="gallery-single.htm" class="item-details-link"></a>
                            </span>
                        </span>
                        <a href="gallery-single.htm"><img src="<?php echo $value['picture'];?>" style="width:270px;height:220px;"alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm"><?php echo $value['name'];?></a><?php echo $value['mark'];?> <i class="icon-star"></i></span>
                    </li><li class="span3 gallery-item" data-id="id-2" data-type="<?php echo $value['catname'];?>">

                    <?php
                }

                ?>  

                </ul>
            </div>
        </div><!-- End gallery list-->

    </div>

    <?php $content = ob_get_clean();?>