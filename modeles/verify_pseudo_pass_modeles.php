<?php
    $pseudo = $bdd->prepare('SELECT *
          FROM user
          WHERE username=? AND password=?');
          $pseudo->execute(array($_POST['username'],$_POST['password']));
          $resultat=$pseudo->fetch();
          $isPasswordCorrect = password_verify($_SESSION['password'], $resultat['password']);
?>