<?php ob_start(); ?>
<form method="post" action="" id="monFormulaire">
<p style="font-size:25px"><b>
Question n° <?php echo intval($_SESSION['cpt']);?>
</b></p><br>
<div class="well" style="font-size:18px">
<?php echo $q[0]['q']; ?>
</div>
<br>
<div class="well">
<?php
for ($x=0; $x < count($ans) ; $x++) {
    
        echo "<br><label id='span$x'><input type='radio' name='answer' class='jsrep' value='".$ans[$x]['statut_cards']."' id='$x' required>
        <font size='3'>".$ans[$x]['answer_cards']."</font></label>";

}
// var_dump($value);

    //echo "<br><input type='radio' name='answer' value='".$value."' required> ".$key;

?>
</div>
<p id="msgrep"></p>
<br>

<input type="submit" name="bouton" class="btn btn-success" value="Valider">
</form>


<form method="post" action="">
<input type="submit" name="fin" value="Finir" class="btn btn-danger">
</form>








<script>
var formElement = document.querySelector('#monFormulaire');
formElement.addEventListener('submit', nomDeFonction)

function nomDeFonction(event)
{
    //console.log('nomDeFonction début');
    var liste = document.getElementsByClassName('jsrep');
    var x = 0;
    var indice;

    event.preventDefault();

    while (typeof indice === 'undefined') {
        
        if (liste[x].checked === true ) {
            indice = x;
        }
        x++;
    }
    larep = document.getElementById('span'+indice); 
    if (liste[indice].value === "F") {
        larep.style.color = "#b92b27";
        document.getElementById("msgrep").innerHTML = "<div class='well'><font size='4' color='red'>Fais un effort sérieux...</font></div>";      
    } else {
        larep.style.color = "#45a247";
        document.getElementById("msgrep").innerHTML = "<div class='well'><font size='4' color='green' >Bonne réponse!</font></div>";
    }
    setTimeout(function () { document.getElementById('monFormulaire').submit(); }, 1000);
    
    /*for (i = 0; i < liste.length;i++) { 
        if (liste[i].checked === true) {
            larep = document.getElementById('span'+i); 
            if (liste[i].value === "F") {
                larep.style.color = "#b92b27";
                document.getElementById("msgrep").innerHTML = "<font size='3'>Mauvaise réponse :c</font>";
                
            } else {
                larep.style.color = "#45a247";
                document.getElementById("msgrep").innerHTML = "<font size='3'>Bonne réponse :></font>";
            }
        }

        if (liste[i].checked === false && i < 2) {
            event.preventDefault();
            setTimeout(function () { nomDeFonction(event); }, 1000);
            console.log('nomDeFonction checked false');

        } else if (liste[i].checked === true && i === 3) {
            console.log(i);
            document.getElementById('monFormulaire').submit();
        }
    } */



}
</script>
<?php $content = ob_get_clean();?>