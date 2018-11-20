<?php
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
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}
$questions = $stmt->fetchAll();
?>