<?php
    $input = array(
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/black.png", 
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/blue.png", 
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/freeze.png", 
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/green.png", 
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/grey.png",
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/orange.png",
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/pink.png",
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/purple.png",
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/red.png",
    "https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/yellow.png"
    );
    $rand_keys = array_rand($input, 2);
    $profile_picture = $input[$rand_keys[1]];
?>  