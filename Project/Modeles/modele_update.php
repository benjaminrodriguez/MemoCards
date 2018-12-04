<?php
    // ----------------------------------------------------------------------------

    function carte_UPDATE($id,$ply,$chain,$lv)
    {
        $bdd = bdd();
        $query = "UPDATE `succes_rate`
                SET
                `level_cards`=:lvcard,
                `chain`=:chain,
                `played_cards`=:plycards
                WHERE succes_rate.verso_id = (
                    SELECT verso.id
                    FROM verso
                    JOIN recto ON recto.id = verso.recto_id AND recto.id = :id AND verso.statut_cards LIKE 'T');";

        $query_params = array(
            ':id' => $id,
            ':plycards' => $ply,
            ':chain' => $chain,
            ':lvcard' => $lv);

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // ----------------------------------------------------------------------------

     //Permet d'UPDATE une information dans la BDD 
     function username_UPDATE($username, $id)
     {
         $bdd = bdd();
         $req = $bdd->prepare(' UPDATE user
                             SET username = ? 
                             WHERE id = ? 
                             LIMIT 1
                             ');
         $req->execute(array($username, $id));
     }
     
     //--------------------------------------------------------------------------------
 
     //Permet d'UPDATE une information dans la BDD 
     function password_UPDATE( $value_attribut, $id)
     {
         $bdd = bdd();
         $req = $bdd->prepare(' UPDATE user
                             SET password = ? 
                             WHERE id = ? 
                             LIMIT 1
                             ');
         $req->execute(array($value_attribut, $id));
     }
     
     //--------------------------------------------------------------------------------
 
     //Permet d'UPDATE une information dans la BDD 
     function picture_UPDATE( $value_attribut, $id)
     {
         $bdd = bdd();
         $req = $bdd->prepare(' UPDATE user
                             SET profile_picture = ? 
                             WHERE id = ? 
                             LIMIT 1
                             ');
         $req->execute(array($value_attribut, $id));
     }
 
     //--------------------------------------------------------------------------------

     //Permet d'UPDATE une information dans la BDD 
    function UPDATE($table, $attribut, $value_attribut, $id)
    {
        $bdd = bdd();
        $req = $bdd->prepare(' UPDATE ?
                            SET ? = ? 
                            WHERE id = ? 
                            LIMIT 1
                            ');
        $req->execute(array($table, $attribut, $value_attribut, $id));
    }

    //--------------------------------------------------------------------------------

?>