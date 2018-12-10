<?php
require("./Controllers/php/function_game.php");

        if (isset($_POST['start'])) {
            $_SESSION['deck'] = $_GET['deck'];
        }
        if (!isset($_SESSION['deck']))
        {
            game_unset();
        }
        else 
        {
            game_getprevar();

            if (isset($_POST['answer'])) 
            {
                game_answer();
            }

            if (isset($_POST['fin']))
            {
                $_SESSION['cpt'] = $_SESSION['cptall'] + 1;
            }

            if ($_SESSION['cpt'] <= intval($_SESSION['cptall']))
            {
                game_q();
            }
            else
            {
                game_end();
            }
        }

?>