<?php

    function disconnect()
    {
        include(dirname(__FILE__).'/../../vues/disconnect_vues.php');

        if(isset($_POST['disconnect']))
        {
            session_unset();
            session_destroy();
            session_write_close();
            //include(dirname(__FILE__).'/../vues/js/disconected_vues.js');
            header('Location: index.php');
            exit;
        }
    }

// ----------------------------------------------------------------------------

    function changement_sexe ($sexe)
    {
        if ($sexe === 'homme')
        {
            $sexe = 'M';
        }
        else if ($sexe === 'femme')
        {
            $sexe = 'F';
        }
    }
    return $sexe

?>