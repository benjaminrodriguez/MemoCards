<?php
    // ----------------------------------------------------------------------------

    function user_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $desinscription = $bdd->prepare(
        'DELETE FROM user
        WHERE user.id = ?
        VALUES (?);
        ');
        $desinscription->execute(array($id));
    }  

    // ----------------------------------------------------------------------------

    function message_DELETE ($message_id, $subjec_id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $desinscription = $bdd->prepare(
        'DELETE FROM message
        WHERE message.id = ? AND subject_id= ?
        VALUES (?, ?);
        ');
        $desinscription->execute(array($message_id, $subjec_id));
    }
    
    // ----------------------------------------------------------------------------

?>