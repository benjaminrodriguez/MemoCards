<?php
function connexion_select ($table, $attribut, $username)
{   
    global $bdd;
    $pseudo = $bdd->prepare('SELECT *
                             FROM ?
                             WHERE ?=?
                            ');
    $pseudo->execute(array($table, $attribut, $username);
    $resultat = $pseudo->fetch(); 
}
?>