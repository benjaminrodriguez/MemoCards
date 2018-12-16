<?php
ob_start();
if (isset($_SESSION['listend'][0])) {
    foreach ($_SESSION['listend'][0] as $key => $value)
    {
        echo "<p style='font-size:20px'><b>Question n° ". (intval($key)+1)."</b></p><br><br>";
        echo "<div class='well' style='font-size:15px'><b>Carte : " . htmlspecialchars($_SESSION['listend'][1][$key])."</b><br><br>";
        $q = carte_quest_SELECT(htmlspecialchars($_SESSION['listend'][1][$key]));
        ?>
        <div class="well" style="font-size:18px">
        <?php echo $q[0]['q']; ?>
        </div>
        <br><?php
        if ($value === "T")
        {
            echo"<font size='+1' color='green'>Bonne réponse !</font></div>";
        
        }
        else
        {

            echo "<font size='+1' color='red'>Mauvaise réponse !</font></div>";
            
        }
        echo "<br><br>";
    }
} 
else 
{
?>
<div class='well' style='font-size:20px'>
Vous n'avez répondu à aucune carte :c 
</div>
<?php
}
?>
<form method='post' action=''>
<input type="submit"  class="btn btn-success" name="end" value ="Rejouer">
</form>

<form method='post' action='index.php?page=inventory'>
<input type="submit" name="end" class="btn btn-info" value ="Retour Inventaire">
</form>

<?php $content = ob_get_clean();?>