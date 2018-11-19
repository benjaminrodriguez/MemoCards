<?php

if ($answer === true)
{
    $level_card++;
    $chain++;
}
else if ($answer === false)
{
    $level_card++;
    $chain = 0;
}
if ($chain === 3) {
    $level_card--;
    $chain = 0;
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