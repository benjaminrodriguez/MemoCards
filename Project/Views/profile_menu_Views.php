<?php $title='Mon Profil';  ?>
<?php ob_start(); ?>

<!--
    <p>Profil <?php echo $_SESSION['status']; ?> : 
        <b> <?php echo strtoupper($_SESSION['username']); ?> </b>  </p>

    <form method="POST" action="">
        <ul>
            <li>
                <button type="submit"  name="menu" value="username">Changer votre pseudo</button>
            </li><br/>

            <li>
                <button type="submit"  name="menu" value="password">Changer votre mot de passe</button>
            </li><br/>

            <li>
                <button type="submit"  name="menu" value="picture">Changer votre avatar</button>
            </li> <br/> 

            <li>
                <button type="submit"  name="menu" value="delete_user">Supprimer mon compte</button>
            </li> <br/>
            
            <li>
                <button type="submit"  name="menu" value="hobbies">Modifier des hobbies</button>

            <li>
                <button type="submit"  name="menu" value="stat">Voir mes stats</button>
            </li> <br/>

        </ul>
    </form>
-->

<!-- --------------------------- Change Username --------------------------- -->
<?php
    if(isset($_GET['menu']) && $_GET['menu'] == 'username')
    { 
?>      <form method="POST" action="index.php?page=profile&menu=username">

            <p class="lead"> Votre nouveau pseudo doit contenir au minimum 4 caractères. </p>

            <div class="input-prepend">
                <span class="add-on"><i class="icon-user">
                </i></span><input class="span2" id="prependedInput" size="16" type="text" name="username" value="" 
                            placeholder="Nouveau pseudo" title="Entrez un pseudo sans caractère spéciaux." required><br/>
            </div>

            <input type="hidden" name="menu" value="username">

            <a href="#myModal" role="button" class="btn btn-inverse" data-toggle="modal">Confirmer</a>
            

            <!-- Modal -->
            <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 id="myModalLabel">Message de confirmation</h5>
                </div>

                <div class="modal-body">
                    <p>Êtes-vous sûr  de vouloir modifier votre pseudo ?</p>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Non.</button>
                    <button class="btn btn-inverse">Oui, je confirme !</button>
                </div>
            </div>

        </form>



       
<?php 
        $subtitle = 'Modifier votre pseudo';
    }
?>


<!-- --------------------------- Change Password --------------------------- -->
<?php if(!isset($test_old_password) && isset($_GET['menu']) && $_GET['menu'] == 'password' && !isset($_POST['new_password1']))
        { 
?>
            <form method="POST" action="index.php?page=profile&menu=password">
                <!-- Demande le mot de passe actuel. -->
                <input type="password"  name="old_password" value="" placeholder="Mot de passe actuel" 
                title="Entrez votre mot de passe actuel" required><br/>

                <!-- Demande le nouveau mot de passe. -->
                <input type="password"  name="new_password1" value="" placeholder="Nouveau mot de passe" 
                title="Le mot de passe doit contenir : 6 caractères minimum, au moins une majuscule, une minuscule et un chiffre" required><br/>

                <input type="password"  name="new_password2" value="" placeholder="Confirmer mot de passe" 
                title="Le mot de passe doit contenir : 6 caractères minimum, au moins une majuscule, une minuscule et un chiffre" required><br/>
                        
                <input type="hidden" name="menu" value="password">

                <a href="#myModal" type="submit" role="button" class="btn btn-inverse" data-toggle="modal">Confirmer</a>
            


                <!-- Modal -->
                <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 id="myModalLabel">Message de confirmation</h5>
                    </div>
            
                    <div class="modal-body">
                        <p>Êtes-vous sûr  de vouloir modifier votre pseudo ?</p>
                    </div>
            
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Non.</button>
                        <button class="btn btn-inverse">Oui, je confirme !</button>
                    </div>
            </div>
            </form>         
<?php   
            $subtitle = 'Modifier votre mot de passe';
        } 
        if(isset($_SESSION['error']))
        { 
            $subtitle = 'Modifier votre mot de passe';
        ?>
            <!-- Alerts
            ================================================== --> 
            <div class="span4">  
                <div class="alert alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo $_SESSION['error']; ?></strong>
                </div>
            </div>
    <?php
            unset($_SESSION['error']);
        }

        
?>



<!-- --------------------------- Change Profile Pricture --------------------------- -->
<?php
    if(isset($_GET['menu']) && $_GET['menu'] == 'picture')
    { 
?>      
        <form method="POST" action="">

            <input type="text" name="profile_picture" value="" placeholder="Lien URL de l'image" 
                    title="Entrez l'URL d'une image."><br/>

            <input type="hidden" name="menu" value="picture">

            <button type="submit" class="btn btn-inverse"> Confirmer </button>

        </form>
<?php 
        $subtitle = 'Modifier votre image de profile';
    }
?>

<!-- --------------------------- Change Hobbies --------------------------- -->
<?php if(isset($_GET['menu']) && $_GET['menu'] == 'hobbies')
        { 
            $subtitle = 'Modifier vos hobbies';
?>
            <form method="POST" action="">
                <!-- Demande le mot de passe actuel. -->
                <br>
                <div class="row">
                    <div class="span2">

                        <input id="tv" type="checkbox" name="hobbies" value="sport">
                        <label for="tv">TV</label><br>

                        <input id="musiques" type="checkbox" name="hobbies" value="musique" >
                        <label for="musiques">Musique</label><br>
                        
                        <input id="voyages" type="checkbox" name="hobbies" value="voyages">
                        <label for="voyages">Voyages</label><br>
                    </div>

                    <div class="span2">

                        <input id="automobile" type="checkbox" name="hobbies" value="sport">
                        <label for="automibile">Automobile</label><br>

                        <input id="cuisine" type="checkbox" name="hobbies" value="musique" >
                        <label for="cuisine">Cuisine</label><br>
                        
                        <input id="culture" type="checkbox" name="hobbies" value="voyages">
                        <label for="culture">Culture</label><br>
                    </div>


                    <div class="span2">

                        <input id="films" type="checkbox" name="hobbies" value="sport">
                        <label for="films">Films</label><br>

                        <input id="geographie" type="checkbox" name="hobbies" value="musique" >
                        <label for="geographie">Géographie</label><br>
                        
                        <input id="histoire" type="checkbox" name="hobbies" value="voyages">
                        <label for="histoire">Histoire</label><br><br><br>
                    </div>    
                
                    <div class="span2">

                        <input id="informatiques" type="checkbox" name="hobbies" value="sport" checked>
                        <label for="informatiques">Informatiques</label><br>

                        <input id="langues" type="checkbox" name="hobbies" value="musique" checked>
                        <label for="langues">Langues</label><br>
                        
                        <input id="loisirs" type="checkbox" name="hobbies" value="voyages">
                        <label for="loisirs">Loisirs</label><br>
                    </div>     
                    
                    <div class="span2">

                        <input id="maths" type="checkbox" name="hobbies" value="sport">
                        <label for="maths">Maths</label><br>

                        <input id="passions" type="checkbox" name="hobbies" value="musique" >
                        <label for="passions">Passions</label><br>
                        
                        <input id="philosophie" type="checkbox" name="hobbies" value="voyages">
                        <label for="philosophie">Philosophie</label><br>
                    </div>  
                    
                    <div class="span2">

                        <input id="proverbes" type="checkbox" name="hobbies" value="sport">
                        <label for="proverbes">Proverbes</label><br>

                        <input id="series" type="checkbox" name="hobbies" value="musique" >
                        <label for="series">Séries</label><br>
                        
                        <input id="sports" type="checkbox" name="hobbies" value="voyages" checked>
                        <label for="sports">Sports</label><br>
                    </div>                     

                </div>       
                <input type="hidden" name="menu" value="hobbies">
                <button type="submit"> Mettre à jour mes hobbies </button>


            </form>
<?php 
        }
?>      



<!-- --------------------------- unsub --------------------------- -->
<?php
    if(isset($_GET['menu']) && $_GET['menu'] == 'unsub')
    { 
?>  
        <form method="POST" action="index.php?page=profile&menu=unsub">
            <input type="hidden" name="unsubconfirm" value="0">

            <p class="lead"> Cliquez pour supprimer votre compte. </p>

            <a href="#myModalunsub" role="button" class="btn btn-inverse" data-toggle="modal">Confirmer</a>
        

            <!-- Modal -->
            <div class="modal hide fade" id="myModalunsub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 id="myModalLabel">Message de confirmation</h5>
                </div>

                <div class="modal-body">
                    <p>Êtes-vous sûr  de vouloir supprimer votre compte ?</p>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Non.</button>
                    <button class="btn btn-inverse">Oui, je confirme !</button>
                </div>
            </div>

        </form>
<?php
    }

 $content = ob_get_clean(); ?>