<?php
  function inscription ($username,$date_naissance,$statut)
  {
  global bdd();
  // INSCRIPTION
  echo'inscription modele'
          $inscription = $bdd->prepare(
          'INSERT INTO user (username,password,date_de_naissance,statut) 
          VALUES (:username,:password,:date_de_naissance,:statut);
          ');
          $inscription->execute(array(
            'username'=>?,
            'password'=>?,
            'date_de_naissance'=>?,
            'statut'=>?
          ));
  }
?>