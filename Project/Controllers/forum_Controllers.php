<?php   

    if(isset($_GET['delete']))
    {
        delete_message_UPDATE($_GET['delete']);
        header('Location: index.php?page=forum&subject_id='.$_GET['subject_id']);
        exit();
    }

    if (!isset($_GET['subject_id'])) 
    {
        // RECUPERE LES SUJETS DU FORUM
        $req = subjects_SELECT();
        $name = [];
        $type = [];
        $subjects_views = $req->fetchAll();
        //var_dump($subjects_views);
      
        foreach($subjects_views as $key => $value)
        {
            if ($value['user_id'] > 0) {
                //echo $value['user_id'];
                $tempname = recup_name_SELECT($value['user_id'], $value['id']);
                $name[$key] = $tempname[0]['username'];
                $type[$key] = $tempname[0]['status'];
            } else {
                $name[$key] = "Compte Supprimé";
                $type[$key] = "Inconnu";
            }
            //var_dump($name);
            $count = count_message_SELECT($subjects_views[$key][0]);
            $subjects_views[$key]['count_message'] = $count['count_message'];
        }

        if (isset($_GET['choix_forum']) && $_GET['choix_forum'] === 'creer_sujet')
        {   
            // CREER UN SUJET
            if (isset($_POST['title']) && isset($_POST['content']))
            {
                
                // ON ENLEVE LES ESPACES
                $_POST['title'] = trim($_POST['title']);
                $_POST['content'] = trim($_POST['content']);
                if (!empty($_POST['title']) && !empty($_POST['content']))
                {           
                    create_topic_INSERT(htmlspecialchars($_POST['title']), 'ouvert', htmlspecialchars($_POST['content']), $_SESSION['id']);
                    $req = id_subjects_SELECT($_SESSION['id'], $_POST['content']);
                    $id_subject = $req->fetch();
                    header('Location: index.php?page=forum&subject_id='.$id_subject['id'].'');
                    exit();
                }
                else 
                {
                    require(dirname(__FILE__).'/../Public/js/empty_form.js');
                }
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

    if (isset($_POST['new_message']))
    {
        $_POST['new_message'] = trim($_POST['new_message']);
        if (!empty($_POST['new_message'])) 
        {
            write_topic_INSERT($_POST['new_message'], $_SESSION['id'], $_GET['subject_id']);
            header('Location: index.php?page=forum&subject_id='.$_GET['subject_id'].'');
        }
        else 
        {
            require(dirname(__FILE__).'/../Public/js/empty_form.js');
        }
    }

    if ( isset($_GET['subject_id']) )
    {
        // RECUPERE LES INFORMATIONS DU SUJET
        $req = info_subjects_SELECT($_GET['subject_id']);
        $info_subject = $req->FetchAll();
        $username = find_autor_SELECT($info_subject[0]['user_id']);
        $info_subject['username'] = $username['username'];

        // COMPTE LE NOMBRE DE MESSAGE DANS LE SUJET
        $count_message = count_message_SELECT($_GET['subject_id']);
        //var_dump($count_message);

        // RECUPERE LES MESSAGES DU POST
        $print_message = messages_subject_SELECT($_GET['subject_id']);
        

        // RELIE LES autors.id A LEUR user.username
        $autors = array();
        foreach($print_message as $key => $value)
        {
            $username = find_autor_SELECT($print_message[$key]['autor_id']);
            array_push($autors, $username);
        }

        //var_dump($print_message);
        //var_dump($autors);
        //var_dump($info_subject);

        require(dirname(__FILE__).'/../Views/forum_single_Views.php');
    }





    $title = 'Forum';
    $section = 'Le Forum';
    require(dirname(__FILE__).'/../Views/template.php');
?>
        