<?php

function nb_card_select ($iddeck)
{
    global $bdd;
    $query = 'SELECT COUNT(recto.id) AS count FROM recto WHERE recto.deck_id = :id;';
    $query_params = array(':id' => $iddeck);

    try {
        $stmt = $bdd->prepare($query);
        $stmt->execute($query_params);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    $cptinit = $stmt->fetchAll();
    return $cptinit;
}

// ----------------------------------------------------------------------------

function quest1_select ($iddeck,$list)
{
    global $bdd;
    $query = "SELECT *
              FROM recto
              JOIN verso ON verso.recto_id = recto.id AND recto.deck_id = :iddeck AND recto.id NOT IN (:tabidquest)
              JOIN succes_rate ON succes_rate.verso_id = verso.id
              ORDER BY succes_rate.level_cards ASC;
            ";

    $query_params = array(
        ':iddeck' => $iddeck,   // id from the deck currently used
        ':tabidquest' => $list  // all the ids of the questions already asked
        );

    try {
        $stmt = $bdd->prepare($query);
        $stmt->execute($query_params);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $questions;
}

// ----------------------------------------------------------------------------

function quest2_select ($iddeck,$list)
{
    global $bdd;
    $query = "SELECT *
    FROM recto
    WHERE recto.deck_id = :iddeck
    AND recto.id NOT IN (:tabidquest)
    ORDER BY RAND();";
    //unset($query_params);
    $query_params = array(
        ':iddeck' => $iddeck,   // id from the deck currently used
        ':tabidquest' => $list  // all the ids of the questions already asked
        );

    try {
        $stmt = $bdd->prepare($query);
        $stmt->execute($query_params);
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $questions;
}

// ----------------------------------------------------------------------------

    function connexion_select($username)
    {
        global $bdd;
        $pseudo = $bdd->prepare('SELECT *
                                FROM user
                                WHERE username = ?;
                                ');
        $pseudo->execute(array($username));
        $resultat = $pseudo->fetch();
        return $resultat;
}
function verso_recup($IDDELAQUESTION)
{
    global $bdd;
    $query = "SELECT *
    FROM `verso`
    WHERE recto_id = :idquest
    ORDER BY RAND();";
    //unset($query_params);
    $query_params = array(
        ':idquest' => $IDDELAQUESTION
        );

    try {
        $stmt = $bdd->prepare($query);
        $stmt->execute($query_params);
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $ans = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $ans;
}

// ----------------------------------------------------------------------------

    function print_subjects()
    {
        global $bdd;
        $forum = $bdd->prepare('SELECT name
                                FROM subject
                                ORDER BY date_posted DESC;
                                ');
        $forum->execute(array());
        $subject = $forum->fetch();
        return $subject;
    }

//-------------------------------------------------------------------------------

function password_SELECT($id)
{
    global $bdd;
    $req = $bdd->prepare(' SELECT password
                           FROM user
                           WHERE id = ? 
                           LIMIT 1
                        ');
    $req->execute(array($id));
    $donnees = $req->fetch();
    return $donnees;
}
   
//--------------------------------------------------------------------------------
?>
