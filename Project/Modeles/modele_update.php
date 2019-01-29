<?php
    // ----------------------------------------------------------------------------
    //mise a jour des données de la carte
    function carte_UPDATE($id,$ply,$chain,$lv,$win)
    {
        $bdd = bdd();
        $query = "UPDATE `succes_rate`
                SET
                `level_cards`=:lvcard,
                `chain`=:chain,
                `played_cards`=:plycards,
                `nb_succes`=:win
                WHERE succes_rate.verso_id = (
                    SELECT verso.id
                    FROM verso
                    JOIN recto ON recto.id = verso.recto_id AND recto.id = :id AND verso.statut_cards LIKE 'T');";

        $query_params = array(
            ':id' => $id,
            ':plycards' => $ply,
            ':chain' => $chain,
            ':win' => $win,
            ':lvcard' => $lv);

        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // ----------------------------------------------------------------------------

    function unsub_subject_UPDATE($id)
    {
        $bdd = bdd();
        $query = "UPDATE `subject` SET `user_id`=1 WHERE user_id = :id";

        $query_params = array(
            ':id' => $id);
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

     function question_UPDATE($question_modify, $id_question)
     {
         $bdd = bdd();
         $req = $bdd->prepare(' UPDATE recto
                                SET question_cards = ? 
                                WHERE id = ? 
                                LIMIT 1
                             ');
         $req->execute(array($question_modify, intval($id_question)));
     }
 
     //--------------------------------------------------------------------------------

     function answer_UPDATE($answer_modify, $id_answer)
     {
         $bdd = bdd();
         $req = $bdd->prepare(' UPDATE verso
                                SET answer_cards = ? 
                                WHERE id = ? 
                                LIMIT 1
                             ');
         $req->execute(array($answer_modify, intval($id_answer)));
     }
 
     //--------------------------------------------------------------------------------

     // SUPPRIME LE MESSAGE D'UN FORUM
     function delete_message_UPDATE($id_message)
     {
         $bdd = bdd();
         $req = $bdd->prepare(' UPDATE message
                                SET content_message = ?
                                WHERE id = ? 
                                LIMIT 1
                             ');
         $req->execute(array('<i> ( Message supprimé ) </i>', $id_message));

     }

     //-------------------------------------------------------------------------------- 


     function deck_share_UPDATE($id)
     {
         $bdd = bdd();
         $query = "UPDATE `deck` SET `status` = 'public' WHERE deck.id = :id;";
 
         $query_params = array(
             ':id' => $id);
         try {
             $stmt = $bdd->prepare($query);
             $stmt->execute($query_params);
         } catch(Exception $e) {
             die('Erreur : ' . $e->getMessage());
         }
     }

     function deck_unshare_UPDATE($id)
     {
         $bdd = bdd();
         $query = "UPDATE `deck` SET `status` = 'privated' WHERE deck.id = :id;";
 
         $query_params = array(
             ':id' => $id);
         try {
             $stmt = $bdd->prepare($query);
             $stmt->execute($query_params);
         } catch(Exception $e) {
             die('Erreur : ' . $e->getMessage());
         }
     }

     function passed_UPDATE($id,$nb,$deck,$score)
     {
         $bdd = bdd();
         $query = "UPDATE `passed` SET `date_passed`= CURRENT_DATE,`number_game`= :nb ,`score_user`= :score WHERE user_id = :id AND deck_id = :deck;";
 
         $query_params = array(
            ':id' => $id,
            ':nb' => $nb,
            ':deck' => $deck,
            ':score' => $score
        );

         try {
             $stmt = $bdd->prepare($query);
             $stmt->execute($query_params);
         } catch(Exception $e) {
             die('Erreur : ' . $e->getMessage());
         }
     }


     function new_mark_UPDATE($note, $id_comment)
     {
         $bdd = bdd();
         $req = $bdd->prepare(' UPDATE comments_deck
                                SET mark = ?
                                WHERE id = ? 
                                LIMIT 1
                             ');
         $req->execute(array($note, $id_comment));

     }

     function new_comment_UPDATE($content, $id_comment)
     {
         $bdd = bdd();
         $req = $bdd->prepare(' UPDATE comments_deck
                                SET content = ?
                                WHERE id = ? 
                                LIMIT 1
                             ');
         $req->execute(array($content, $id_comment));

     }

?>
