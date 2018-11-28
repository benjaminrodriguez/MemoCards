<?php
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
?>
