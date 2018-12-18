<?php
$id = $_SESSION['id'];
//var_dump($_SESSION);
$listiddeck = deckunsub_SELECT($id);
//var_dump($listiddeck);

foreach ($listiddeck as $key => $value) {
    //echo $value['id'];

    $listidrecto = unsub_SELECT('recto.id','recto', 'deck_id', $value['id']);
    //var_dump($listidrecto);
    foreach ($listidrecto as $key2 => $value2) {

        $listidversosu = succunsub_SELECT($value2["id"]);
        //var_dump($listidversosu);
        foreach ($listidversosu as $key3 => $value3) {
            $listidsucc = unsub_SELECT('id','succes_rate', 'verso_id', $value3['id']);
            foreach ($listidsucc as $key4 => $value4) {
                //del
                var_DELETE('succes_rate','id',$value4['id']);
            }
        }

        $listidverso = unsub_SELECT('verso.id','verso', 'recto_id', $value2['id']);
        foreach ($listidverso as $key5 => $value5) {
            var_DELETE('verso','id',$value5['id']);
        }
        var_DELETE('recto','id',$value2['id']);
    }
    var_DELETE('passed','deck_id',$value['id']);
    //delpasse
    var_DELETE('hashtag_has_deck','deck_id',$value['id']);
    //del#
    var_DELETE('deck','id',$value['id']);
    //eldeck
}
//delhobbies
var_DELETE('hobbies_has_user','user_id',$id);

unsub_subject_UPDATE($id);
var_DELETE('user','id',$id);
//echo'dndejnendjendjen';

/*
succes_rate_unsub_DELETE($id);
verso_unsub_DELETE($id);
recto_unsub_DELETE($id);
hashtag_unsub_DELETE($id);
hobbies_unsub_DELETE($id);
passed_unsub_DELETE($id);
deck_unsub_DELETE($id);
//user_unsub_DELETE($id);*/

session_unset();
session_destroy();
session_write_close();
header('Location: index.php');
exit;
?>