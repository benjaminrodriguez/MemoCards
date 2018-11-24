<?php
echo "WORK";

$iddeck = 1;

if (isset($_SESSION['list'])) {
    $list = $_SESSION['list'];
} else {
    $list = '';

}
// RECUPERER LA REPONSE DE LA CARTE DAVANT ICI

if (isset($_GET['qcm'])) {
    $_SESSION['qcm'] = $_GET['qcm'];
}
if (isset($_GET['q'])) {
    $_SESSION['q'] = $_GET['q'];
}

if(!isset($_SESSION['cpt']))
{
    $_SESSION['cpt'] = 1;
}

if(!isset($_SESSION['cptall']))
{
    $_SESSION['cptall'] = nb_card_select($iddeck);
}


if (isset($answer))
{
    if ($answer === true)
    {
        $played_card++;
        $level_card++;
        $chain++;
    }
    else if ($answer === false)
    {
        $played_card++;
        $level_card--;
        $chain = 0;
    }
    if ($chain === 3) {
        if ($level_card < 3) {
            $level_card = 3;
        }
    }
}

if ($_SESSION['cpt'] <= $_SESSION['cptall'])
{
    $choice = rand(0, 100);
    $choice = 40;
    if ($choice < 35)
    {
        //include("./modeles/quest1.php");
        $questions = quest1_select($iddeck, $list);
    }
    else
    {
        //include("./modeles/quest2.php");
        $questions = quest2_select($iddeck, $list);
    }
    //var_dump($questions);
    $IDDELAQUESTION = $questions[0]['id'];
    var_dump(intval($IDDELAQUESTION));

    $ans = verso_recup($IDDELAQUESTION);
    var_dump($ans);

    // AFFICHAGE DE LA QUESTION ICI
    include(dirname(__FILE__).'/../vues/affichage_quest.php');

    if ($_SESSION['cpt'] === 1) {
        $list += '\''.intval($IDDELAQUESTION).'\'';

    }
    else
    {
        $list += ', \''.intval($IDDELAQUESTION).'\'';
    }

    $_SESSION['cpt']++;
    $_SESSION['list'] = $list;
}

//$_SESSION['cpt'] = $cpt;

?>
