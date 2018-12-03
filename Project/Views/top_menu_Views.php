<?php $title="Mon Menu" ?>
<? ob_start(); ?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">

<a class="navbar-brand" href="index.php?page=home"><img src="./Public/img/logo.png" width="70" height="55" border="0" /></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    <li class="nav-item active">
      <a class="nav-link" href="index.php?page=home"><b><h3>Accueil</h3></b><span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="index.php?page=profile"><b><h3>Mon Profil</h3></b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="index.php?page=stats"><b><h3>Mes Stats</h3></b></a>
    </li>
  

    <li class="nav-item active">
      <a class="nav-link" href="index.php?page=inventory"><b><h3>Mon Inventaire</h3></b></a>
    </li>
  
    <li class="nav-item active">
      <a class="nav-link" href="index.php?page=store"><b><h3>Cards Store</h3></b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="index.php?page=forum"><b><h3>Forum</h3></b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="index.php?page=test"><b><h3>Jouer</h3></b></a>
    </li>

    <li class="nav-item active">
      <img src=" <?php echo $_SESSION['profile_picture']; ?>" alt="" height="120" width="170" >  
    </li>

    <li class="nav-item active">
      <?php echo $_SESSION['username'].'<br>'.$_SESSION['statut']; ?>
    </li>

  </ul>

  <!-- <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" name="recherche" value="" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form> -->
</div>
</nav>


<div class="container" style="margin-top:60px;">


<?php $content = ob_get_clean(); ?>
<?php require(dirname(__FILE__).'/template.php'); ?>