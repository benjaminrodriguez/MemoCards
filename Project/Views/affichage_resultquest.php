<?php
ob_start();
if (isset($_SESSION['listend'][0])) {
    foreach ($_SESSION['listend'][0] as $key => $value)
    {
        echo "Question n° ". (intval($key)+1)."<br><br>";
        if ($value === "T")
        {
            echo "Carte :" . htmlspecialchars($_SESSION['listend'][1][$key])."<br>";
            $q = carte_quest_SELECT(htmlspecialchars($_SESSION['listend'][1][$key]));
            echo $q[0]['q'];?>
            <br>
            <font size='+1' color='green'>>>>>> Bonne!</font>
        <?php
        }
        else
        {
            echo "Carte :" . htmlspecialchars($_SESSION['listend'][1][$key])."<br>";
            $q = carte_quest_SELECT($_SESSION['listend'][1][$key]);
            echo $q[0]['q'];?>
            <br>
            <font size='+1' color='red'>>>>>> Fausse!</font>
            <?php
        }
        echo "<br><br>";
    }
} 
else 
{
?>
Vous n'avez répondu à aucune carte :c 
<?php
}
?>
<form method='post' action=''>
<input type="submit" name="end" value ="Rejouer">
</form>

<form method='post' action='index.php?page=home'>
<input type="submit" name="end" value ="Accueil">
</form>

<?php $content = ob_get_clean();?>