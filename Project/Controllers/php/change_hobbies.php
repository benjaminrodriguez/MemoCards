<?php
    if (isset($_POST['hobbies'])) 
    {
        inscription_insert_hobbies_one(htmlspecialchars($_POST['hobbies']));
        inscription_insert_hobbies_two($_SESSION['id']);
        //require(dirname(__FILE__).'/../Public/js/create_account.js');
        exit;
    }
?>