<?php
function connexion_select ($username,$password)
{   
    global $bdd;
    $pseudo = $bdd->prepare('SELECT *
                             FROM user
                             WHERE username=? AND password=?
                            ');
          $pseudo->execute(array($username, $password));

          $resultat = $pseudo->fetch();
          echo 'coucou laaaaa';
          var_dump($resultat);
        return $resultat;
}
?>