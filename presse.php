<?php
include_once('database.php');
include_once('header.php');
include_once('language.php');
?>
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/infopratique.css" rel="stylesheet">
</head>
  <body>
    <header>
      <div id="menu" class="items d-flex">
        <a href="index?language=<?= $_GET['language'] ?>"><?= $menu[$language]['0'] ?></a>
        <a href="index?language=<?= $_GET['language'] ?>#blog" onclick="fermermenu();"><?= $menu[$language]['1'] ?></a>
        <a href="infopratique?language=<?= $_GET['language'] ?>"><?= $menu[$language]['2'] ?></a>
        <a href="presse?language=<?= $_GET['language'] ?>"><?= $menu[$language]['3'] ?></a>
        <a href="index?language=<?= $_GET['language'] ?>#contact" onclick="fermermenu();"><?= $menu[$language]['4'] ?></a>
      </div>
      <nav class="container-fluid">
        <div class="left position-initial">
          <i class="fas fa-bars" id="iconemenuo" onclick="ouvrirmenu()"></i>
          <i class="fas fa-times" id="iconemenuec" onclick="fermermenu()" style="height: 72px;"></i>
        </div>
        <div class="logo">
          <video src="assets/img/resize.mp4" autoplay loop muted width="400" id="logo"></video>
          <img src="assets/img/Logo_site.png" alt="Logo Mobile" class="img-fluid d-lg-none" id="img_logo">
        </div>
        <div class="right">
          <a href="<?php
            if (isset($_SESSION['id'])) {
              echo "profil/dashboard?id=".$_SESSION['id'].'&language='.$_GET['language'];
            }
            else {
              echo "connexion?language=".$_GET['language'];
            }

           ?>" class="my-auto"><i class="fas fa-user"></i></a>
           <select onchange="set_language()" name="language" id="language" class="mdb-select md-form">
             <option value="fr" <?= $fr_select ?>>FR</option>
             <option value="en" <?= $en_select ?>>EN</option>
           </select>
          <script type="text/javascript">
            function set_language(){
              var language = document.getElementById('language').value;
              window.location.href= '?language='+language;
            }
          </script>
        </div>
      </nav>
    </header>

    <div class="container mt-4 p-3">
      <h2 class="presse"><?= $presse[$language]['0'] ?></h2>
      <h2 class="text-center font-weight-bold text-uppercase pt-5"><?= $presse[$language]['1'] ?></h2>
      <p class="text-center"><?= $presse[$language]['2'] ?></p>
      <div class="embed-responsive embed-responsive-16by9">
        <object class="embed-responsive-item" data="<?= $presse[$language]['8'] ?>
          " type="application/pdf" title="Communiqué de presse SHIFT">
            <p class="mt-5 text-center">
              <a href="<?= $presse[$language]['8'] ?>"><?= $presse[$language]['3'] ?></a>
            </p>
        </object>
      </div>
      <div class="row text-center mt-5">
        <div class="col-md-6">
          <h2><?= $presse[$language]['4'] ?></h2>
          <a href="assets/pdf/dossier_de_presse_.pdf" class="btn btn-shift my-3" target="_blank"><i class="fas fa-download"></i> <?= $presse[$language]['5'] ?></a>
        </div>
        <div class="col-md-6">
          <h2><?= $presse[$language]['6'] ?></h2>
          <a href="assets/pdf/media_bind.pdf" class="btn btn-shift my-3" target="_blank"><i class="fas fa-download"></i> <?= $presse[$language]['7'] ?></a>
        </div>
        <div class="col-12">
          <a href="assets/img/VISUEL_FLYER-210x297mm.png" target="_blank" class="btn btn-shift my-3"><i class="fas fa-download"></i> <?= $presse[$language]['9'] ?></a>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="assets/js/menu.js"></script>
  </body>
</html>
