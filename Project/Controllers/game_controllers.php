<?php
//require("./Controllers/php/function_game.php");

$content = 1;

if (isset($_POST['start'])) {
    $_SESSION['deck'] = $_GET['deck'];
}
if (!isset($_SESSION['deck']))
{
    $deckname = namedeck_SELECT($_GET['deck']);
    require("./Views/affichage_debquest.php");
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
    // SET THE VAR USED LATER
    if (!isset($_SESSION['list']))
    {
        $_SESSION['list'] = array();
    }
    if (!isset($_SESSION['listend'])) 
    {
        $_SESSION['listend'] = array();
    }

    if(!isset($_SESSION['cpt'])) 
    {
        $_SESSION['cpt'] = 1;
    }

    // CPTALL = TOTAL OF CARDS IN THE DECK
    if(!isset($_SESSION['cptall']))
    {   
        $_SESSION['cptall'] = nb_card_SELECT($_SESSION['deck']);
        $_SESSION['cptall'] = intval($_SESSION['cptall'][0]['count']);
    }
   

    if (isset($_POST['answer'])) 
    {
        $_SESSION['cpt']++;
            //SAVE THE ANSWERS FOR THE DISPLAY AT THE END

        $_SESSION['listend'][0][] = $_POST['answer'];
        $_SESSION['listend'][1][] = $_SESSION['iddelaquestiondavant'];

        
        //GET THE INFO ABOUT THE CARD
        $getquest = carte_recup_SELECT($_SESSION['iddelaquestiondavant']);
        $played_card = $getquest[0]['played_cards'];
        $level_card = $getquest[0]['level_cards'];
        $chain = $getquest[0]['chain'];
        $win = $getquest[0]['nb_succes'];
        

        //var_dump($getquest);

        //CHANGE THEM
        if ($_POST['answer'] === 'T')
        {
            $played_card++;
            $level_card++;
            $chain++;
            $win++;
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
        
        //UPDATE THEM
        unset($_POST['answer']);
        //var_dump($_POST);
        carte_UPDATE($getquest[0]['id'], $played_card, $chain, $level_card,$win);
        header('Location: index.php?page=game&deck='.$_SESSION['deck']);
        exit();
    }
    //var_dump($_SESSION['listend']);

    if (isset($_POST['fin']))
    {
        $_SESSION['cpt'] = $_SESSION['cptall'] + 1;
    }

    
    $testifrep = true;
    
    if (isset($_SESSION['listend'][1])) {
        $testifrep = array_search( $_SESSION['iddelaquestiondavant'], $_SESSION['listend'][1]);
        if ($testifrep !== false) {
            $testifrep = true; //lutilisateur a repondu a la question d'id stocké
            unset($_SESSION['iddelaquestiondavant']);
        }
    } 
    //var_dump($testifrep);

    if ($_SESSION['cpt'] <= intval($_SESSION['cptall']) && $testifrep === true && !isset($_SESSION['iddelaquestiondavant']))
    {
        //CHANGE THE WAY TO SELECT A CARD
        $choice = rand(0, 100);
        
        if(count($_SESSION['list']) === 0)
        {
            $liststr = "''";
        } 
        else 
        {
            $liststr = implode(",",$_SESSION['list']);
        }

        //var_dump($liststr);

        //CARD OFTEN WRONG
        if ($choice < 35)
        {
        
            //require("./modeles/quest1.php");
            $questions = quest1_SELECT($_SESSION['deck'], $liststr);
        }
        //RANDOM CARD
        else
        {
            //require("./modeles/quest2.php");
            $questions = quest2_SELECT($_SESSION['deck'], $liststr);
        }
        //var_dump($questions);


        //SAVE THE ID OF THE CHOSEN QUESTION;
        $IDDELAQUESTION = $questions[0]['id'];
        $_SESSION['list'][]= $IDDELAQUESTION;
        
        //ANSWERS OF THE CARD
        $ans = verso_recup_SELECT($IDDELAQUESTION);
        //var_dump($ans);
        //echo $IDDELAQUESTION;

        // QUESTION OF THE CARD
        $q = carte_quest_SELECT($IDDELAQUESTION);

        //require(dirname(__FILE__).'./Views/affichage_quest.php');
        
        require("./Views/affichage_quest.php");
        
        //$_SESSION['list'] = $list;
        $_SESSION['iddelaquestiondavant'] = $IDDELAQUESTION;
    }

    else if ($_SESSION['cpt'] <= intval($_SESSION['cptall'])) {
        $ans = verso_recup_SELECT($_SESSION['iddelaquestiondavant']);
        $q = carte_quest_SELECT($_SESSION['iddelaquestiondavant']);
        require("./Views/affichage_quest.php");
    }
    else
    {
        if (isset($_SESSION['listend']))
        {
        //var_dump($_SESSION['listend']);
        require("./Views/affichage_resultquest.php");
        }
        unset($_SESSION['deck']);
        unset($_SESSION['listend']);
        unset($_SESSION['list']);
        unset($_SESSION['cpt']);
        unset($_SESSION['cptall']);
        unset($_SESSION['iddelaquestiondavant']);
    }
}
require_once(dirname(__FILE__).'/../Views/template.php');

?>