// Contrôle du courriel en fin de saisie
//CONTROLE MAIL
document.getElementById("email").addEventListener("input", function (e) {
    var validiteCourriel = "";
    var couleurMsg = "red";
    var textSansEspace = $('#email').val().replace(/ /g,"");
    
   if ((e.target.value.indexOf("@") === -1 ) || (e.target.value.indexOf(".") === -1 )) {
       if(e.target.value.indexOf(".") === -1) {
            // Le courriel saisi ne contient pas le caractère @
            validiteCourriel = "Adresse invalide";
       }
       validiteCourriel = "Adresse invalide";
    } else {
      validiteCourriel = "Adresse valide";
      var couleurMsg = "green"; 
    }


    var aideCourrielElt = document.getElementById("aideCourriel");
    document.getElementById("aideCourriel").textContent = validiteCourriel;
    aideCourrielElt.style.color = couleurMsg;
});
  
  //CONTROLE USERNAME
  document.getElementById("username").addEventListener("input", function (e) {
    var validiteName = "";
    var couleurMsg = "red";

        if((document.getElementById('username').value==' ') || (document.getElementById('username').value=='')
        || document.getElementById('username').value.length < 4 || document.getElementById('username').value.length > 255){
            validiteName = "Username invalide";
        } else {
            validiteName = "Username valide";
            couleurMsg = "green";
        }
    var aideNameElt = document.getElementById("aideName");
    document.getElementById("aideName").textContent = validiteName;
    aideNameElt.style.color = couleurMsg;
}); 



//CONTROLE MOT DE PASSE
/*function password() {
    var mdp = document.getElementById("mdp").value;
    var confirm = document.getElementById("mdp2").value;
    var validitePass = "";
    var couleurMsg = "red";

    if (mdp === confirm) {
        validitePass = "Mot de passe valide";
        couleurMsg = "green";
    } else {
        validitePass = "Mot de passe invalide";
    }
    var aidePass = document.getElementById("aidePass");
    document.getElementById("aidePass").textContent = validitePass;
    aidePassElt.style.color = couleurMsg;
} */