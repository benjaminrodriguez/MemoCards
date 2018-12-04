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

    function message_DELETE ($id)
    {
        // DESINSCRIPTION USER
        $bdd = bdd();
        $desinscription = $bdd->prepare(
        'DELETE FROM message
        WHERE message.id = ?
        VALUES (?);
        ');
        $desinscription->execute(array($id));
    }
    
    // ----------------------------------------------------------------------------

?>