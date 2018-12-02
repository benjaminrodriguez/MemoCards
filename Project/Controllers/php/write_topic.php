<?php
        write_topic_INSERT(htmlspecialchars($_POST['content']),intval($_SESSION['id']), intval($_GET['id']));   
?>