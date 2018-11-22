<?php

    function disconnect()
    {
        include(dirname(__FILE__).'/../../vues/disconnect_vues.php');

        if(isset($_POST['disconnect']))
        {
            session_unset();
            session_destroy();
            session_write_close();
            header('Location: index.php');
            exit;
        }
    }






?>