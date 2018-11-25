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
function inscription_insert ($username, $password, $date_naissance, $statut, $sexe, $state, $email)
{

global $bdd;
// INSCRIPTION
        $inscription = $bdd->prepare(
        'INSERT INTO user (username, password,age,statut,sexe,state,email) 
        VALUES (?, ?, ?, ?, ?, ?, ?);
        ');
        $inscription->execute(array($username, $password, $date_naissance, $statut, $sexe, $state, $email));
}

// ----------------------------------------------------------------------------

function inscription_insert_hobbies ()
{

        global $bdd;
        // INSCRIPTION HOBBIES
                $inscription = $bdd->prepare(
                'INSERT INTO hobbies (hobby,user.id)
                INNER JOIN hobbies_has_user ON hobbies_has_user = user.id
                INNER JOIN user ON hobbies_has_user = user.id
                VALUES (?,?);
                ');
                $inscription->execute(array($hobbies));
}
?>