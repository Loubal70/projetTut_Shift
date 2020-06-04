<?php
include_once('database.php');
include_once('header.php');
include_once('language.php');

  if (isset($_GET['article_id']) AND !empty($_GET['article_id'])) {
    $get_id = htmlspecialchars($_GET['article_id']);

    $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($get_id));

    if ($article->rowCount() == 1) { // Un article a été trouvé
      $article = $article->fetch(); // Trouver notre article dans la bdd
      $titre = $article['titre'];
      $contenu = htmlspecialchars_decode($article['contenu']);
    }else {
      die('Cet article n\'existe pas !');
    }
  }
  else {
    header('Location: index');
  }


 ?>
</head>
<body>
  <header>
    <div id="menu" class="items d-flex">
        <a href="#">Accueil</a>
        <a href="#">Blog</a>
        <a href="#">Nous contactez</a>
    </div>
  </header>
  <div class="left">
    <i class="fas fa-bars" id="iconemenuo" onclick="ouvrirmenu()"></i>
    <i class="fas fa-times" id="iconemenuec" onclick="fermermenu()"></i>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="logo d-none d-xl-block">
          <video src="assets/img/resize.mp4" autoplay loop muted width="400" class="d-block m-auto"></video>
          <img src="assets/img/Logo_site.png" alt="Logo Mobile" class="img-fluid d-lg-none" id="img_logo">
        </div>
      </div>
    </div>
    <div class="row mt-5 mt-xl-0 pl-md-5 pl-xl-0">
      <div class="col-12">
        <h1 class="text-center mb-5"><?= $titre ?></h1>
        <p class="mb-5"><?= $contenu ?></p>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="assets/js/menu.js"></script>
</body>
</html>
