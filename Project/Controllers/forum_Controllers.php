<?php    


    
    if (!isset($_GET['subject_id'])) 
    {
        // RECUPERE LES SUJETS DU FORUM
        $req = subjects_SELECT();
        $subjects_views = $req->fetchAll();
        //var_dump($subjects_views);
        
        if (isset($_GET['choix_forum']) && $_GET['choix_forum'] === 'creer_sujet')
        {   
            // CREER UN SUJET
            if (isset($_POST['title']) && isset($_POST['content']))
            {            
                create_topic_INSERT(htmlspecialchars($_POST['title']), 'ouvert', htmlspecialchars($_POST['content']), $_SESSION['id']);
                $req = id_subjects_SELECT($_SESSION['id'], $_POST['content']);
                $id_subject = $req->fetch();
                header('Location: index.php?page=forum&subject_id='.$id_subject['id'].'');
                exit();
            }
            require(dirname(__FILE__).'/../Views/forum_Views.php');
        } 
        else 
        {
            // AFFICHE LES SUJETS
            require(dirname(__FILE__).'/../Views/template_forum.php');
        }
        
    }

    
    else if (isset($_POST['choix_forum']) && $_POST['choix_forum'] == 'delete_topic')
    {
        // SUPPRESSION SUJET
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

    /* if (isset($_GET['subject_id'])) 
    {
        
        // ON ECRIT MESSAGE DANS SUJET
        if (isset($_POST['choix_forum']) && $_POST['choix_forum'] == 'write_topic')
        {
            write_topic_INSERT(htmlspecialchars($_POST['content']), intval($_SESSION['id']), intval($_GET['subject_id']));
            unset($_POST);
        }
        //unset($_POST);
        
        // AFFICHE LE PREMIER MESSAGE DU SUJET
        $q = first_messages_subject_SELECT($_GET['subject_id'],$_SESSION['id']);
        //var_dump($q);
        echo '<b>'.htmlspecialchars($q[0]['content']).' le '.
        htmlspecialchars($q[0]['date_posted']).' par '.
        htmlspecialchars($q[0]['username']).'</b><br>';


        
        // AFFICHE MESSAGES D'UN SUJET
        $print_message = messages_subject_SELECT(intval($_GET['subject_id']));
        //var_dump($print_message);
        
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
    }*/

    if (isset($_GET['subject_id']))
    {
        $req = info_subjects_SELECT($_GET['subject_id']);
        $info_subject = $req->FetchAll();
        var_dump($info_subject);
        require(dirname(__FILE__).'/../Views/forum_single_Views.php');

    }

    require(dirname(__FILE__).'/../Views/template.php');
?>
        