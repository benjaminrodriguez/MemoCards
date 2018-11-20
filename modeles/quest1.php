<?php
$query = "SELECT *
FROM recto
JOIN verso ON verso.recto_id = recto.id AND recto.deck_id = :iddeck AND recto.id NOT IN (:tabidquest)
JOIN succes_rate ON succes_rate.verso_id = verso.id
ORDER BY succes_rate.level_cards ASC;";

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
?>