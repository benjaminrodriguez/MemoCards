<?php

function nb_card_select ($iddeck)
{
    global $bdd;
    $query = $bdd->prepare('SELECT COUNT(recto.id) AS count FROM recto WHERE recto.deck_id = :id;');
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
    $questions = $stmt->fetchAll();
    return $questions;
}

function quest2_select ($iddeck,$list)
{
    global $bdd;
    $query = "SELECT *
    FROM recto
    WHERE recto.deck_id = :iddeck
    AND recto.id NOT IN (:tabidquest)
    ORDER BY RAND();";

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
    $questions = $stmt->fetchAll();
    return $questions;
}
    function connexion_select($username)
    {
        global $bdd;
        $pseudo = $bdd->prepare('SELECT *
                                FROM user
                                WHERE username = ?
                                ');
        $pseudo->execute(array($username));
        $resultat = $pseudo->fetch();
        return $resultat;
    }
?>
