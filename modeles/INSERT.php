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

function inscription_insert ($username, $password, $date_naissance, $statut, $sexe, $region, $email, $picture)
{
    global $bdd;
    // INSCRIPTION
            $inscription = $bdd->prepare(
            'INSERT INTO user (username, password, age, statut, sexe, region, email, profil_picture) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?);
            ');
            $inscription->execute(array($username, $password, $date_naissance, $statut, $sexe, $region, $email, $picture));
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

// ----------------------------------------------------------------------------

function creer_sujet_insert($name, $statut, $intitule, $user_id)
{
    global $bdd;

    // INSCRIPTION
            $creer_sujet = $bdd->prepare(
            'INSERT INTO subject (name, date_posted, statut, intitule, user_id)
            VALUES (?, NOW(), ?, ?, ?);
            ');
            $creer_sujet->execute(array($name, $statut, $intitule, $user_id));
}

?>