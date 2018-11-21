<?php
function connexion ($username,$password,)
{   $pseudo = $bdd->prepare(
        'SELECT *
         FROM user
         WHERE username=? AND password=?
        ');
          $pseudo->execute(array($username, $password));
          $resultat = $pseudo->fetch();

        return $resultat;
}





?>