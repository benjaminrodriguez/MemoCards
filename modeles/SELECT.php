<?php
function connexion_select ($username,$password)
{   
    global $bdd;
    $pseudo = $bdd->prepare('SELECT *
                             FROM user
                             WHERE username=? AND password=?
                            ');
    $pseudo->execute(array($username, $password));
    while ($resultat = $pseudo->fetch()) 
    {
      //var_dump($resultat);
      return $resultat;
    }
}
?>