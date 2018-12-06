<?php 
    if (!isset($_GET['subject_id']))
    { 
?>
    <form action='' method='POST'>
        <button class="btn btn-lg btn-primary btn-block" name="choix_forum" value="creer_sujet">Créer un sujet</button>
    </form>
<?php 
    }
    if (!isset($_GET['subject_id']) && isset($_POST['choix_forum']) 
        && $_POST['choix_forum'] === 'creer_sujet' 
        && $_GET['choix_forum'] !== 'delete_message')
    {
?>
    <form action='' method='POST'>

        <input type='text' name='title' placeholder="Titre" required><br>

        <textarea name='content' rows="4" cols="50" placeholder="Describe here" required> </textarea><br>

        <input type="hidden" name="choix_forum" value="creer_sujet" >

        <button class="btn btn-lg btn-primary" type="submit">Créer sujet</button>
    </form>
<?php
    }
   
    if (isset($print_message[$key]) && isset($_GET['subject_id'])) 
    {
        echo $print_message[$key]['content_message'].' le '.
        $print_message[$key]['date'].' par '.
        $print_message[$key]['username']. '<a href="./index?page=forum&choix_forum=delete_message&message_num='
        .$print_message[$key]['id'].'&subject_id='.$_SESSION['subject_id'].'"> Supprimer mon message</a><br><br>' ;
    }

    if (isset($_GET['subject_id']) && isset($_SESSION['print_messages']) && $_SESSION['print_messages'] == false)
    {
    $_SESSION['print_messages'] = true;
?>
    <form action='' method='POST'>

    <textarea name='content' rows="4" cols="50" placeholder="Describe yourself here" required> </textarea><br>

    <input type="hidden" name="choix_forum" value="write_topic" >

    <button class="btn btn-lg btn-primary" type="submit">Poster message</button>
    </form>
<?php
    } 
?>