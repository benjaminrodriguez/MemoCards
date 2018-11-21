<?php
  // INSCRIPTION
  echo'inscription modele'
    $passhache = password_hash($_POST['password'], PASSWORD_BCRYPT);
          $inscription = $bdd->prepare('INSERT INTO user (username,password,date_de_naissance,statut) VALUES (:username,:password,:date_de_naissance,:statut);');
          $inscription->execute(array(
            'username'=>$_POST['username'],
            'password'=>$passhache,
            'date_de_naissance'=>$_POST['date_de_naissance'],
            'statut'=>'membre'
          ));
?>