<?php

function insert_insert ($a,$b,$c)
{
  /*
// INSCRIPTION
        $insert = $bdd->prepare(
        'INSERT INTO user (username,password,date_de_naissance,statut) 
        VALUES (:username,:password,:date_de_naissance,:statut);
        ');
        $insert->execute(array(
          'username'=>?,
          'password'=>?,
          'date_de_naissance'=>?,
          'statut'=>?
        ));*/
}

// ----------------------------------------------------------------------------
function inscription ($username, $password, $date_naissance,$statut)
{

global $bdd;
// INSCRIPTION
        $inscription = $bdd->prepare(
        'INSERT INTO user (username,password,age,statut) 
        VALUES (?, ?, ?, ?);
        ');
        $inscription->execute(array($username, $password, $date_naissance, $statut));
}
?>