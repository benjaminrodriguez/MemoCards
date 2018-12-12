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
       WHERE hashtag_has_deck.id = (
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
?>

