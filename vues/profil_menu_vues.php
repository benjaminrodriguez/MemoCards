<p>Profil <?php echo $_SESSION['statut']; ?> : 
    <b> <?php echo strtoupper($_SESSION['username']); ?> </b>  </p>

<form method="POST" action="">
    <ul>
        <li>
            <button type="submit" id="profil" name="menu" value="username">Changer votre pseudo</button>
        </li><br/>

        <li>

            <button type="submit" id="stats" name="menu" value="password">Changer votre mot de passe</button>
        </li><br/>

        <li>
            <button type="submit" id="inventaire" name="menu" value="picture">Changer votre avatar</button>
        </li> <br/> 


        <li>
            <button type="submit" id="" name="menu" value="delete_user">Supprimer mon compte</button>
        </li> <br/>

    </ul>
</form>
