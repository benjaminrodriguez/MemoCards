<?php

// RECUPERER LA REPONSE DE LA CARTE DAVANT ICI

if ($answer === true)
{
    $level_card++;
    $chain++;
}
else if ($answer === false)
{
    $level_card--;
    $chain = 0;
}
if ($chain === 3) {
    if ($level_card < 3) {
        $level_card = 3;
    }
}

if ($cpt < $nb_card) 
{
    $choice = rand(0, 100);
    
    if ($choice < 35) 
    {
        include("./modeles/quest1.php");
    }
    else    
    {
        include("./modeles/quest2.php");
    }

    // AFFICHAGE DE LA QUESTION ICI
    
    if ($cpt === 0) {
        $list += '\''.$IDDELAQUESTION.'\'';

    }
    else 
    {
        $list += ', \''.$IDDELAQUESTION.'\'';
    }
    
    $cpt++;
}


?>
