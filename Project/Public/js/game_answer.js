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
        document.getElementById("msgrep").innerHTML = "<font size='3'>Mauvaise réponse :c</font>";      
    } else {
        larep.style.color = "#45a247";
        document.getElementById("msgrep").innerHTML = "<font size='3'>Bonne réponse :></font>";
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