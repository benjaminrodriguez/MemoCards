<?php
    // DESINSCRIPTION USER
    function delete_user_delete ($id)
    {
        global $bdd;
        // DESINSCRIPTION
        $desinscription = $bdd->prepare(
        'DELETE FROM user
            WHERE user.id = ?
            VALUES (?);
        ');
        $desinscription->execute(array($id));
    }   
?>