<?php
echo "WORK";
// RECUPERER LA REPONSE DE LA CARTE DAVANT ICI
if(!isset($_SESSION['cpt']))
{
    nb_card($iddeck, $list);
    $_SESSION['cpt'] =

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

if ($cpt < $_SESSION['nb_card'])
{
    $choice = rand(0, 100);

    if ($choice < 35)
    {
        //include("./modeles/quest1.php");
        quest1($iddeck, $list);
    }
    else
    {
        //include("./modeles/quest2.php");
        quest2($iddeck, $list);
    }

    // AFFICHAGE DE LA QUESTION ICI
    include(dirname(__FILE__).'/../vues/affichage_question.php');

    if ($cpt === 0) {
        $list += '\''.$IDDELAQUESTION.'\'';

    }
    else
    {
        $list += ', \''.$IDDELAQUESTION.'\'';
    }

    $cpt++;
}

$_SESSION['cpt'] = $cpt;

?>
