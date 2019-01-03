<?php ob_start(); ?>

<h1> LE CARDSTORE : </h1>
<br><br><br><br>

<div class="row">

        <!-- Gallery Items
        ================================================== --> 
        <div class="span12 gallery">

            <ul id="filterOptions" class="gallery-cats clearfix">
                <li class="active"><a href="#" class="all">Tout</a></li> 
                <?php
                foreach ($arraycat as $key => $value) {
                    echo '<li class=""><a href="#" class="'.$value['name'].'">'.$value['name'].'</a></li>';
                }
                ?>
            </ul>

            <div class="row clearfix">
                <ul class="gallery-post-grid holder">
               

                <?php

                foreach ($arraydeckstore as $key => $value) {
                    ?>

                            <li class="span3 gallery-item" data-id="<?php echo $value['id'];?>" data-type="<?php echo $value['catname'];?>">
                                <span class="gallery-hover-4col hidden-phone hidden-tablet">
                                <span class="gallery-icons">
                                    <a href="img/gallery/gallery-img-1-full.jpg" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto" rel="prettyPhoto"></a>
                                    <a href="gallery-single.htm" class="item-details-link"></a>
                                </span>
                                </span>
                                <a href="gallery-single.htm"><img src="<?php echo $value['picture'];?>" style="width:270px;height:220px;" alt="Gallery"></a>
                                <span class="project-details"><a href="gallery-single.htm"><?php echo $value['name'];?></a><?php 
                                    if ($value['grade'] !== NULL) {
                                        echo $value['grade'].'<i class="icon-star"></i></span>';
                                    }
                                    else {
                                        echo "Le deck n'a pas de note";
                                    }
                                    ?>
                                    </span>
                            </li>

                    <?php
                }

                ?>  

                </ul>
            </div>
        </div><!-- End gallery list-->

    </div>

    <?php $content = ob_get_clean();?>