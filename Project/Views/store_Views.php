<?php ob_start(); ?>

<h1> LE CARDSTORE : </h1>
<br><br><br><br>

<?php
if (isset($_GET['error'])) {
    ?>
    <div class="well" style='color: red;font-size: 17px'>Erreur tu possèdes déjà ce deck</div>
    <?php
}
?>

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
                                    <!--<a href="Public/img/gallery/gallery-img-1-full.jpg" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto" rel="prettyPhoto"></a> -->
                                    <a href="index.php?page=application&id=<?php echo $value['id']; ?>" class="item-details-link"></a>
                                </span>
                            </span>
                            <a href="index.php?page=application&id=<?php echo $value['id']; ?>"> <img src="<?php echo $value['picture'];?>" style="width:270px;height:220px;" alt="Gallery"></a>
                            <span class="project-details"><a href="index.php?page=application&id=<?php echo $value['id']; ?>"> Titre : <?php echo $value['name'];?></a>
                            
                        <?php   
                        
                            echo round($arraydeckstore[$key]['mark'], 1).' / 5 <br>';
                            $star = intval($arraydeckstore[$key]['mark']);

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
                           

                            /*
                            if ($value['grade'] !== NULL) {
                                echo $value['grade'].'<i class="icon-star"></i></span>';
                            }
                            else {
                                echo "Le deck n'a pas de note";
                            }
                            */
                            echo "<div style='text-align: right'><a href='index.php?page=store&newdeck=".$arraydeckstore[$key]['id']."'> Télécharger le deck <img src='./Public/img/down.png' style='width:40px;height:40px'/></a></div>";
                            
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