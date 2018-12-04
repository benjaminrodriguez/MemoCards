<?php    
    // HEADER
    require(dirname(__FILE__).'/../Views/top_menu_Views.php');

    // CREER SUJET
    if (!isset($_GET['id'])) 
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
    
    if (isset($_GET['id'])) 
    {
        $_SESSION['subject_id'] = intval($_GET['id']);
        // ON ECRIT MESSAGE DANS SUJET
        require_once(dirname(__FILE__).'/php/write_topic.php');

        // AFFICHE LE CONTENU DU SUJET
        first_messages_subject_SELECT($_GET['id']);

        // AFFICHE MESSAGES D'UN SUJET
        $print_message = messages_subject_SELECT(intval($_GET['id']));
        foreach ($print_message as $key => $value) 
        {
            require(dirname(__FILE__).'/../Views/forum_affichage_message.php');
        }
    
    }
    
    // SUPPRIMER UN MESSAGE DONT ON EST L'AUTEUR
    if (isset($_POST['choix_forum']) && $_POST['choix_forum'] == 'delete_message') 
    {
        echo 'coucou';
        require_once(dirname(__FILE__).'/php/delete_message.php');
    }

    require(dirname(__FILE__).'/../Views/forum_Views.php');

?>
        