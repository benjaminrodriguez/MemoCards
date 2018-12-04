<?php
    if (isset($_POST['choix_forum']) && $_POST['choix_forum'] == 'write_topic')
    {
        write_topic_INSERT(htmlspecialchars($_POST['content']), intval($_SESSION['id']), intval($_GET['id']));   
    }
?>