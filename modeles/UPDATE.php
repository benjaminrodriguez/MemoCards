<?php

//Permet d'UPDATE une information dans la BDD 
function update($table, $attribut, $value_attribut, $id)
{
    global $bdd;
    $req = $bdd->prepare(' UPDATE ?
                           SET ? = ? 
                           WHERE id = ? 
                           LIMIT 1
                        ');
    $req->execute(array($table, $attribut, $value_attribut, $id));
}
   
// ================================================================
// ================================================================


?>