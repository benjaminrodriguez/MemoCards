<?php $title = 'Incription'; ?>
<?php ob_start(); ?>


        <form action="" method="POST" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Inscrivez-vous</h1>

            <label for="username"  class="sr-only">Username</label>
            <input type="text" name="username" value="" id="username" class="form-control" placeholder="Username" required autofocus>

            <input type="password" name="password" value="" id="pass" class="form-control" placeholder="Mot de passe" required>
            <label for="pass" class="sr-only">Password</label>
            <div class="checkbox mb-3">

            <input type="email" name="email" value="" id="email" class="form-control" placeholder="Email" required>
            <div class="checkbox mb-3">
            Sexe : 
            <input type="radio" name="sex" value="M">Homme
            <input type="radio" name="sex" value="F" checked>Femme<br>

            <select name="region" class="form-control" required>
                <option value="region" disabled selected>Région</option> 
                <option value="hauts_de_france">Hauts-de-France</option> 
                <option value="normandie">Normandie</option>
                <option value="ile_de_france">Ile-de-France</option>
                <option value="bretagne">Bretagne</option>
                <option value="pays_de_la_loire">Pays de la Loire</option>
                <option value="centre_val_de_loire">Centre-Val de Loire</option>
                <option value="grand_est">Grand Est</option>
                <option value="nouvelle_aquitaine">Nouvelle-Aquitaine</option>
                <option value="bourgogne_franche_comte">Bourgogne-Franche-Comté</option>
                <option value="auvergne_rhones_alpes">Auvergne-Rhône-Alpes</option>
                <option value="occitanie">Occitanie</option>
                <option value="paca">Provence-Alpes-Côte d'Azur</option>
                <option value="corse">Corse</option>
                <option value="guadeloupe">Guadeloupe</option>
                <option value="martinique">Martinique</option>
                <option value="guyane">Guyane</option>
                <option value="mayotte">Mayotte</option>
                <option value="la_reunion">La Réunion</option>
            </select><br>

            <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control" placeholder="Date de naissance" required>
            </div>
            <button class="btn btn-lg btn-primary" type="submit">Inscription</button>
        </form><br>


<!-- Bouton de retour à l'écran d'accueil -->
        <form action='index.php?page=home' method='POST'>
            <button type="submit" class="btn btn-lg btn-primary" value="Retour à l'écran de connexion">Retour à l'écran de connexion</button>
        </form>


<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>
