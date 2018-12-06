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

        // ON ECRIT MESSAGE DANS SUJET
        require_once(dirname(__FILE__).'/php/write_topic.php');
        unset($_POST);

        // AFFICHE LE PREMIER MESSAGE DU SUJET
        first_messages_subject_SELECT($_GET['subject_id']);

        // AFFICHE MESSAGES D'UN SUJET
        $print_message = messages_subject_SELECT(intval($_GET['subject_id']));
        foreach ($print_message as $key => $value) 
        {
            require(dirname(__FILE__).'/../Views/forum_Views.php');
        }
        $_SESSION['print_messages'] = false;
        //var_dump($_GET);
        //var_dump($_SESSION);

        if (isset($_GET['subject_id']))
        {
            $_SESSION['subject_id'] = intval($_GET['subject_id']);
        }
    }
    // SUPPRIMER UN MESSAGE DONT ON EST L'AUTEUR
    if (isset($_SESSION['subject_id']) && isset($_GET['choix_forum']) && $_GET['choix_forum'] == 'delete_message')
    {
    
        if (isset($_GET['subject_id']) && isset($_GET['message_num']))
        {
            $_SESSION['subject_id'] = $_GET['subject_id'];
            $_SESSION['message_id_delete'] = $_GET['message_num'];

            // AFFICHER AUTEUR D'UN MESSAGE
            $subject_info = messages_autor_SELECT(intval($_GET['subject_id']), intval($_SESSION['message_id_delete']));
            foreach ($subject_info as $key => $value) 
            {
                if ($subject_info[$key]['autor_id'] == $_SESSION['id'])
                {
                    message_DELETE(intval($_SESSION['message_id_delete']));
                }
                else if ($subject_info[$key]['autor_id'] !== $_SESSION['id'])
                {
                    require(dirname(__FILE__).'/../Public/js/not_autor_message.js');
                }
            }
        }
    }
    require(dirname(__FILE__).'/../Views/forum_Views.php');
?>
        