<?php $title='Mon Profil';  ?>
<?php ob_start(); ?>


    <p>Profil <?php echo $_SESSION['statut']; ?> : 
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

        </ul>
    </form>


<!-- --------------------------- Change Username --------------------------- -->
<?php
    if(isset($_POST['menu']) && $_POST['menu'] == 'username')
    { 
?>      <form method="POST" action="">

            <input type="text" name="username" value="" placeholder="Nouveau pseudo" 
                    title="Entrez un pseudo sans caractère spéciaux." required><br/>

            <input type="hidden" name="menu" value="username">

            <button type="submit"> Confirmer </button>

        </form>
<?php 
    }
?>


<!-- --------------------------- Change Password --------------------------- -->
<?php if(!isset($test_old_password) && isset($_POST['menu']) && $_POST['menu'] == 'password' && !isset($_POST['new_password1']))
        { 
?>
            <form method="POST" action="">
                <!-- Demande le mot de passe actuel. -->
                <input type="password"  name="old_password" value="" placeholder="Mot de passe actuel" 
                        title="Entrez votre mot de passe sans caractère spéciaux." required><br/>

                <!-- Demande le nouveau mot de passe. -->
                <input type="password"  name="new_password1" value="" placeholder="Nouveau mot de passe" 
                title="Entrez votre mot de passe sans caractère spéciaux." required><br/>

                <input type="password"  name="new_password2" value="" placeholder="Confirmer mot de passe" 
                title="Entrez votre mot de passe sans caractère spéciaux." required><br/>
                        
                <input type="hidden" name="menu" value="password">
                <button type="submit"> Confirmer </button>

            </form>         
<?php   
        }

        if(isset($_POST['new_password1']) )   echo '<p>'.$_SESSION['error'].'</p>' ;
?>



<!-- --------------------------- Change Profile Pricture --------------------------- -->
<?php
    if(isset($_POST['menu']) && $_POST['menu'] == 'picture')
    { 
?>      
        <form method="POST" action="">

            <input type="text" name="profile_picture" value="" placeholder="Lien URL de l'image" 
                    title="Entrez l'URL d'une image."><br/>

            <input type="hidden" name="menu" value="picture">

            <button type="submit"> Confirmer </button>

        </form>
<?php 
    }
?>



<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>