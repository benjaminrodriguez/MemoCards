<?php
    if (isset($_GET['action']) && $_GET['action'] == 'warn' && isset($_GET['deck_id']))
    {
        // ADD NOTIF
        $warn = '<a href="index.php?page=application&id='.$_GET['deck_id'].'">Ce deck a été signalé</a>';
        newnotif_INSERT($warn, $_SESSION['id']);
        header('Location: index.php?page=application&id='.$_GET['deck_id']);
        exit();
    }
    
    if (isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['deck_id']))
    {
        deck_unshare_UPDATE($_GET['deck_id']);
        header('Location: index.php?page=store');
        exit();
       
    }

    //new_mark_INSERT($_SESSION['id'], $_GET['id'], $_GET['mark']);

    if (isset($_GET['id']) )
    {
        $deck = deck_by_id_SELECT($_GET['id']);
        $comments = comments_application_SELECT($_GET['id']);
    } 


    if (isset($_GET['newdeck'])) {
        passed_INSERT($_SESSION['id'], $_GET['newdeck']);
        header('Location: index.php?page=inventory');
        exit();
    }

    $note_exist = false;
    if (isset($_GET['mark'])) {
        foreach($comments as $key => $value){
            if(intval($comments[$key]['autor']) === $_SESSION['id'] && isset($comments[$key]['comment'])) {
                $note_exist = true;
                $id_note = $comments[$key]['id'];
            }
        }

        if($note_exist === true){
            new_mark_UPDATE($_GET['mark'], $id_note);
            header('Location: index.php?page=application&id='.$_GET['id']);
        } else {
            new_comment_INSERT('', $_SESSION['id'], $_GET['id'], NULL);
            header('Location: index.php?page=application&id='.$_GET['id']);
        }
    }

    $content_exist = false;
    if(isset($_POST['new_comment'])){
        foreach($comments as $key => $value){
            if(intval($comments[$key]['autor']) === $_SESSION['id'] && isset($comments[$key]['comment'])) {
                $content_exist = true;
                $id_content = $comments[$key]['id'];
            }
        }

        if($content_exist === true){
            new_comment_UPDATE($_POST['my_comment'], $id_content);
            header('Location: index.php?page=application&id='.$_GET['id']);
        }else {
            
            new_comment_INSERT($_POST['my_comment'], $_SESSION['id'], $_GET['id'], NULL);
            header('Location: index.php?page=application&id='.$_GET['id']);
        }
    }



    require_once("./Views/application_Views.php");
    require_once('./Views/template_application_Views.php');

    var_dump($comments);

?>