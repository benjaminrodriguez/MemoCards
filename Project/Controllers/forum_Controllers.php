<?php    

    // HEADER
    require(dirname(__FILE__).'/../Views/top_menu_Views.php');

    // CREER SUJET
    if (!isset($_GET['subject_id'])) 
    {

        // AFFICHE TOUS LES SUJETS DU FORUM
        subjects_SELECT();

        // ECRIRE UN SUJET
        require_once(dirname(__FILE__).'/php/create_topic.php');
    }

    // SUPPRESSION SUJET
    if (isset($_POST['choix_forum']) && $_POST['choix_forum'] == 'delete_topic')
    {
        if ($_SESSION['statut'] == 'admin')
        {
            require_once(dirname(__FILE__).'/php/delete_topic.php');
        }
        else 
        {
            echo 'vous n\'avez pas les droits';
        }
    }



    if(isset($_POST['subject_id'])) $_SESSION['subject_id'] = intval($_POST['subject_id']);


    if (isset($_GET['subject_id'])) 

    {
        echo 'coucou';
        //$_SESSION['subject_id'] = intval($_GET['subject_id']);

        // ON ECRIT MESSAGE DANS SUJET
        require_once(dirname(__FILE__).'/php/write_topic.php');

        // AFFICHE LE CONTENU DU SUJET
        first_messages_subject_SELECT($_GET['subject_id']);

        // AFFICHE MESSAGES D'UN SUJET
        $print_message = messages_subject_SELECT(intval($_GET['subject_id']));
        foreach ($print_message as $key => $value) 
        {
            require(dirname(__FILE__).'/../Views/forum_affichage_message.php');
        }
        //var_dump($_GET);
        //var_dump($_SESSION);

        if (isset($_GET['subject_id']))
        {
            $_SESSION['subject_id'] = intval($_GET['subject_id']);
        }
    
    }
    
    // SUPPRIMER UN MESSAGE DONT ON EST L'AUTEUR
    if (isset($_POST['subject_id']))
    {

        //$_SESSION['message_num'] = intval($_GET['message_num']);
        if (isset($_SESSION['subject_id']))
        {
            var_dump($_GET);

            // AFFICHER AUTEUR D'UN MESSAGE
            $subject_info = messages_autor_SELECT($_SESSION['subject_id']);
            foreach ($subject_info as $key => $value) 
            {
                if ($subject_info[$key]['autor_id'] == $_SESSION['id'])
                {
                    message_DELETE(intval($_GET['message_num']));
                }
                else 
                {
                    echo 'desole seul l\'auteur peut delete son message';

                }
            }
        }
    }

    require(dirname(__FILE__).'/../Views/forum_Views.php');


    echo 'session';
    var_dump($_SESSION); echo'<br>';

    echo 'get ';
    var_dump($_GET);
?>
        