<?php

//Permet d'UPDATE une information dans la BDD 
function UPDATE($table, $attribut, $value_attribut, $id)
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

//Permet d'UPDATE une information dans la BDD 
function password_UPDATE( $value_attribut, $id)
{
    global $bdd;
    $req = $bdd->prepare(' UPDATE user
                           SET password = ? 
                           WHERE id = ? 
                           LIMIT 1
                        ');
    $req->execute(array($value_attribut, $id));
}
   

// ================================================================
// ================================================================

//Permet d'UPDATE une information dans la BDD 
function picture_UPDATE( $value_attribut, $id)
{
    global $bdd;
    $req = $bdd->prepare(' UPDATE user
                           SET profil_picture = ? 
                           WHERE id = ? 
                           LIMIT 1
                        ');
    $req->execute(array($value_attribut, $id));
}
   
?>