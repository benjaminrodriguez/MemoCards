<?php

    require(dirname(__FILE__).'/../../Views/disconnect_Views.php');

    if(isset($_POST['disconnect']))
    {
        session_unset();
        session_destroy();
        session_write_close();
        //include(dirname(__FILE__).'/../vues/js/disconected_vues.js');
        header('Location: index.php');
        exit;
    }

?>