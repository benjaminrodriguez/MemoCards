<?php

//Permet de changer le pseudo 
function username_update($a, $b, $c)
{
    global $bdd;
    $req = $bdd->prepare(' UPDATE user
                           SET username = ? ($a)
                           WHERE id = ? ($b)
                           LIMIT 1
                        ');
    $req->execute(array($new_pseudo, $id));
}
   

// ---------------------------------------------------------------------



function benjamin_sql()
{
    echo 'Bonjour !';
}
?>