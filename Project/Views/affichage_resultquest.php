<?php
ob_start();
foreach ($_SESSION['listend'][0] as $key => $value)
{
    echo "Question n° ". (intval($key)+1)."<br><br>";
    if ($value === "T")
    {
        echo "Carte :" . $_SESSION['listend'][1][$key]."<br>";
        $q = carte_quest_SELECT($_SESSION['listend'][1][$key]);
        echo $q[0]['q'];?>
        <br>
        <font size='+1' color='green'>>>>>> Bonne!</font>
    <?php
    }
    else
    {
        echo "Carte :" . $_SESSION['listend'][1][$key]."<br>";
        $q = carte_quest_SELECT($_SESSION['listend'][1][$key]);
        echo $q[0]['q'];?>
        <br>
        <font size='+1' color='red'>>>>>> Fausse!</font>
        <?php
    }
    echo "<br><br>";
}
?>