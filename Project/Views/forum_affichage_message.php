<?php
    echo $print_message[$key]['content_message'].' le '.
    $print_message[$key]['date'].' par '.
    $print_message[$key]['username']. '<a href="./index?page=forum&choix_forum=delete_message&message_num='
    .$print_message[$key]['id'].'&subject_id='.$_SESSION['subject_id'].'"> Supprimer mon message</a><br><br>' ;
?>