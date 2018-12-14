// Contrôle du courriel en fin de saisie
//CONTROLE MAIL
document.getElementById("email").addEventListener("input", function (e) {
    var validiteCourriel = "";
    var couleurMsg = "red";
    if (e.target.value.indexOf("@" && ".") === -1) {
        // Le courriel saisi ne contient pas le caractère @
        validiteCourriel = "Adresse invalide";
    } else {
      validiteCourriel = "Adresse valide";
      var couleurMsg = "green"; 
    }
    var aideCourrielElt = document.getElementById("aideCourriel");
    document.getElementById("aideCourriel").textContent = validiteCourriel;
    aideCourrielElt.style.color = couleurMsg;
});/*
  //CONTROLE NUMERO DE TELEPHONE
  document.getElementById("phone").addEventListener("input", function (e) {
    var validitePhone = "";
    var phone = e.target.value;
    var couleurMsg = "red";
    var type = typeof(phone);
    if(type != "number"){
        validitePhone = "Numero de telephone invalide";
    } else if(type == "number"){
    if (phone.length != 10) {
        // Le courriel saisi ne contient pas le caractère @
        validitePhone = "Numero de telephone invalide";
    } else if(phone.length = 10) {
      validitePhone = "Numero de telephone valide";
      var couleurMsg = "green"; 
    }
    var aidePhoneElt = document.getElementById("aidePhone");
    document.getElementById("aidePhone").textContent = validitePhone;
    aidePhoneElt.style.color = couleurMsg;
}});  */