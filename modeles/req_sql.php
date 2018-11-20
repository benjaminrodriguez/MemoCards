<?php
  //CONNEXION A LA BDD
  try
  {
          $bdd = new PDO('mysql:host=localhost;dbname=MemoCards;charset=utf8', 'root', 'toor');
  }
  catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }

  function verifyPseudoPass()
  {
    $pseudo = $bdd->prepare('SELECT *
                              FROM user
                              WHERE username=? AND password=?');
    $pseudo->execute(array($_POST['username'],$_POST['password']));
    $resultat=$pseudo->fetch();
    $isPasswordCorrect = password_verify($_SESSION['password'], $resultat['password']);
  }

  function inscription()
  {
    $passhache = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $inscription = $bdd->prepare('INSERT INTO user (pseudo,pwd,mail,statut) VALUES (:pseudo,:pass,:mail,:statut)');
    $inscription->execute(array(
                                  'pseudo'=>$_POST['pseudo'],
                                  'pass'=>$passhache,
                                  'mail'=>$_POST['mail'],
                                  'statut'=>$_POST['statut']
                                ));
  }
?>
