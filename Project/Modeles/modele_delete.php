<?php
    // ----------------------------------------------------------------------------

    function user_unsub_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $query =
        'DELETE FROM user
        WHERE user.id = :id;
        ';
        $query_params = array(':id' => $id);
        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }  

    // ----------------------------------------------------------------------------

    function passed_unsub_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $query =
        'DELETE FROM passed
        WHERE user_id = :id;
        ';
        $query_params = array(':id' => $id);
        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }  

    // ----------------------------------------------------------------------------

    function deck_unsub_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $query =
        'DELETE FROM deck
        WHERE autor_id = :id AND deck.status LIKE "privated";
        ';
        $query_params = array(':id' => $id);
        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }  

    // ----------------------------------------------------------------------------



    function message_DELETE ($message_id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $desinscription = $bdd->prepare(
        'DELETE FROM message
         WHERE message.id = ?
        ');
        $desinscription->execute(array(intval($message_id)));
    }
    
    // ----------------------------------------------------------------------------
   
    function succes_rate_unsub_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $query =
        'DELETE 
        FROM succes_rate 
        WHERE  succes_rate.verso_id = (
            SELECT verso.id 
            FROM verso 
            WHERE verso.recto_id = (
                SELECT recto.id 
                FROM recto
                WHERE recto.deck_id = (
                    SELECT deck.id
                    FROM deck
                    WHERE deck.autor_id = :id
                    AND deck.status LIKE "privated"
                    )
                )
            );
        ';
        $query_params = array(':id' => $id);
        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }  

    
    // ----------------------------------------------------------------------------
   
    function verso_unsub_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $query =
        'DELETE
            FROM verso 
            WHERE verso.recto_id = (
                SELECT recto.id 
                FROM recto
                WHERE recto.deck_id = (
                    SELECT deck.id
                    FROM deck
                    WHERE deck.autor_id = :id
                    AND deck.status LIKE "privated"
                    )
                )
        ;';
        $query_params = array(':id' => $id);
        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }  

    // ----------------------------------------------------------------------------

    function recto_unsub_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $query =
        'DELETE
        FROM recto
        WHERE recto.deck_id = (
            SELECT deck.id
            FROM deck
            WHERE deck.autor_id = :id
            AND deck.status LIKE "privated"
            )      
        ;';
        $query_params = array(':id' => $id);
        try {
            $stmt = $bdd->prepare($query);
            $stmt->execute($query_params);
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }  

    // ----------------------------------------------------------------------------

    function hashtag_unsub_DELETE ($id)
    {
       // DESINSCRIPTION USER
       $bdd = bdd();
       $query =
       'DELETE FROM hashtag_has_deck
        WHERE hashtag_has_deck.id = (   SELECT deck.id
                                        FROM deck
                                        WHERE deck.autor_id = :id
                                        AND deck.status LIKE "privated"
       )      
       ;';
       $query_params = array(':id' => $id);
       try {
           $stmt = $bdd->prepare($query);
           $stmt->execute($query_params);
       } catch(Exception $e) {
           die('Erreur : ' . $e->getMessage());
       }
    }
   
    // ----------------------------------------------------------------------------

    function hobbies_unsub_DELETE ($id)
    {
       // DESINSCRIPTION USER
       $bdd = bdd();
       $query =
       'DELETE FROM hobbies_has_user
       WHERE hobbies_has_user.user_id
       )      
       ;';
       $query_params = array(':id' => $id);
       try {
           $stmt = $bdd->prepare($query);
           $stmt->execute($query_params);
       } catch(Exception $e) {
           die('Erreur : ' . $e->getMessage());
       }
    }

    //--------------------------------------------------------------------------------

    function deck_succes_rate_DELETE($id_deck)
    {
        //DELETE LES SUCCES RATE DU DECK
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM succes_rate
                                WHERE succes_rate.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function deck_verso_DELETE($id_deck)
    {
        //DELETE LES VERSO DU DECK
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM verso
                                WHERE verso.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function deck_recto_DELETE($id_deck)
    {
        //DELETE LES RECTO DU DECK
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM recto
                                WHERE recto.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function deck_comments_DELETE($id_deck)
    {
        //DELETE LES COMMENTS DU DECK
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM comments_deck
                                WHERE comments_deck.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function deck_hashtag_DELETE($id_deck)
    {
        //DELETE LES HASHTAGS DU DECK
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM hashtag_has_deck
                                WHERE hashtag_has_deck.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function deck_passed_DELETE($id_deck)
    {
        //DELETE LES PASSED DU DECK
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM passed
                                WHERE passed.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function deck_final_DELETE($id_deck)
    {
        //DELETE LE DECK
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM deck
                                WHERE deck.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function card_succes_rate_DELETE($id_deck)
    {
        //DELETE LE SUCCES_RATE DE LA CARTE
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM succes_rate
                                WHERE succes_rate.verso_id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function card_verso_DELETE($id_deck)
    {
        //DELETE LA REPONSE DE LA CARTE
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM verso
                                WHERE verso.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function card_recto_DELETE($id_deck)
    {
        //DELETE LA QUESTION DE LA CARTE
        $bdd = bdd();
        $req = $bdd->prepare (" DELETE
                                FROM recto
                                WHERE recto.id = ?;");
        
        $req->execute(array(htmlspecialchars(intval($id_deck))));
    }

    //--------------------------------------------------------------------------------

    function var_DELETE($a,$b,$c)
    {
        $bdd = bdd();
       $query =
       "DELETE FROM $a
       WHERE $b = $c
       ;";
       /*$query_params = array(
           ':a' => $a,
           ':b' => $b,
           ':c' => $c
        );*/
       try {
           $stmt = $bdd->prepare($query);
           $stmt->execute();
       } catch(Exception $e) {
           die('Erreur : ' . $e->getMessage());
       }
       
    }
    
     // ----------------------------------------------------------------------------

     function subject_DELETE ($subject_id)
     {
         // DELETE CONTENU SUBJECT
         $bdd = bdd();
         $desinscription = $bdd->prepare(
         'DELETE FROM message WHERE message.subject_id = ?;
         ');
         $desinscription->execute(array(intval($subject_id)));
     }
     
     // ----------------------------------------------------------------------------

     function subject_content_DELETE ($subject_id)
     {
         // DELETE SUBJECT VIDE
         $bdd = bdd();
         $desinscription = $bdd->prepare(
         'DELETE FROM subject WHERE subject.id = ?;
         ');
         $desinscription->execute(array(intval($subject_id)));
     }
     
     // ----------------------------------------------------------------------------
    
?>

