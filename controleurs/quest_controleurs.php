<?php
echo "WORK";
if (!isset($_SESSION['deck']))
{
    $_POST['deck'] = 1;
    $_SESSION['deck'] = $_POST['deck'];
    include(dirname(__FILE__).'/../vues/affichage_debquest.php');
    if (isset($_SESSION['list']))
    {
        unset($_SESSION['list']);
    }
    if (isset($_SESSION['cpt']))
    {
        unset($_SESSION['cpt']);
    }
    if (isset($_SESSION['cptall']))
    {
        unset($_SESSION['cptall']);
    }
    if (isset($_SESSION['iddelaquestiondavant']))
    {
        unset($_SESSION['iddelaquestiondavant']);
    }

}
else
{
    if (isset($_SESSION['list']))////////////////////////
    {
        $list = $_SESSION['list'];
    }
    else
    {
        $list = [];

    }
    //var_dump($list);
    // RECUPERER LA REPONSE DE LA CARTE DAVANT ICI

    if (isset($_GET['qcm'])) {
        $_SESSION['qcm'] = $_GET['qcm'];
    }
    if (isset($_SESSION['listend'])) {
        $listend = $_SESSION['listend'];
    }
    if (isset($_GET['q'])) {
        $_SESSION['q'] = $_GET['q'];
    }

    if(!isset($_SESSION['cpt'])) ////////////////////////
    {
        $_SESSION['cpt'] = 1;
    }

    if(!isset($_SESSION['cptall']))
    {
        $_SESSION['cptall'] = nb_card_select($_SESSION['deck']);
        $_SESSION['cptall'] = intval($_SESSION['cptall'][0]['count']);
        //total of cards in the deck
    }

    //var_dump($_SESSION['cptall']);

    if (isset($_POST['answer']))
    {
        // RECUPERER INFO DE LA QUESTION
        //echo $_SESSION['iddelaquestiondavant'];
        $listend[0][] = $_POST['answer'];
        $listend[1][] = $_SESSION['iddelaquestiondavant'];
        //$listend[$_SESSION['iddelaquestiondavant']] = $_POST['answer'];

        $getquest = carte_recup_select($_SESSION['iddelaquestiondavant']);
        $played_card = $getquest[0]['played_cards'];
        $level_card = $getquest[0]['level_cards'];
        $chain = $getquest[0]['chain'];

        //var_dump($getquest);
        if ($_POST['answer'] === 'T')
        {
            $played_card++;
            $level_card++;
            $chain++;
        }
        else if ($_POST['answer'] === 'F')
        {
            $played_card++;
            $level_card--;
            $chain = 0;
        }
        if ($chain === 3)
        {
            if ($level_card < 3) {
                $level_card = 3;
            }
        }
        carte_UPDATE($getquest[0]['id'], $played_card, $chain, $level_card);
        // /echo "cc";
    }


    if (isset($listend))
    {
        $_SESSION['listend'] = $listend;
    }

    if (isset($_POST['fin']))
    {
        $_SESSION['cpt'] = $_SESSION['cptall'] + 1;
    }

    var_dump($_SESSION['cpt']);
    var_dump($_SESSION['cptall']);

    if ($_SESSION['cpt'] <= intval($_SESSION['cptall']))
    {
        $choice = rand(0, 100);
        $choice = 30;
        //var_dump($list);
        $liststr = implode(",",$list);
        //var_dump($liststr);

        if ($choice < 35)
        {
            //include("./modeles/quest1.php");
            $questions = quest1_select($_SESSION['deck'], $liststr);
        }
        else
        {
            //include("./modeles/quest2.php");
            $questions = quest2_select($_SESSION['deck'], $liststr);
        }
        //var_dump($questions);
        $IDDELAQUESTION = $questions[0]['id'];
        $list[]= $IDDELAQUESTION;
        //var_dump($list);

        //var_dump(intval($IDDELAQUESTION));

        $ans = verso_recup_select($IDDELAQUESTION);
        //var_dump($ans);
        //echo $IDDELAQUESTION;

        // AFFICHAGE DE LA QUESTION ICI
        include(dirname(__FILE__).'/../vues/affichage_quest.php');


        $_SESSION['cpt']++;
        $_SESSION['list'] = $list;
        $_SESSION['iddelaquestiondavant'] = $IDDELAQUESTION;
    }


    else
    {
        if (isset($_SESSION['listend']))
        {
            //var_dump($listend);
            foreach ($_SESSION['listend'][0] as $key => $value)
            {
                echo "n° ". (intval($key)+1)."<br><br>";
                if ($value === "T")
                {
                    echo "Question :" . $_SESSION['listend'][1][$key]." >>>>> Bonne!";
                }
                else
                {
                    echo "Question :" .$_SESSION['listend'][1][$key]." >>>>> Fausse!";
                }
                echo "<br><br>";
            }
        }
        unset($_SESSION['deck']);
        unset($_SESSION['listend']);
        unset($_SESSION['liste']);
    }
}

?>
