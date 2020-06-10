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
          <a href="index">Accueil</a>
          <a href="index#blog" onclick="fermermenu();">Blog</a>
          <a href="infopratique">Infos Pratiques</a>
          <a href="presse">Presse</a>
          <a href="index#contact" onclick="fermermenu();">Nous contacter</a>
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

    <div class="container mt-4 p-4">
      <div class="row mb-5">
        <div class="col-md-6">
          <h1 class="emplacement text-center"><?= $infopratique[$language]['0'] ?></h1>
          <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.3386511409744!2d2.2844554156734573!3d48.83267877928493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6707227dc3507%3A0x6a2edc280a719a55!2s1%20Place%20de%20la%20Porte%20de%20Versailles%2C%2075015%20Paris!5e0!3m2!1sfr!2sfr!4v1591708797163!5m2!1sfr!2sfr" frameborder="0"
              style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-6">
          <h1 class="emplacement text-center mt-3 mt-md-0"><?= $infopratique[$language]['1'] ?></h1>
          <table class="table text-center">
            <tr>
              <th><?= $infopratique[$language]['2']['0']['0'] ?></th>
              <td>
                <?= $infopratique[$language]['2']['0']['1'] ?>
                <br><?= $infopratique[$language]['2']['0']['2'] ?>
                <br><?= $infopratique[$language]['2']['0']['3'] ?>
              </td>
            </tr>
            <tr>
              <th><?= $infopratique[$language]['2']['1']['0'] ?></th>
              <td>
                <?= $infopratique[$language]['2']['1']['1'] ?>
                <br><?= $infopratique[$language]['2']['1']['2'] ?>
                <br><?= $infopratique[$language]['2']['1']['3'] ?>
              </td>
            </tr>
            <tr>
              <th><?= $infopratique[$language]['2']['2']['0'] ?></th>
              <td>
                <?= $infopratique[$language]['2']['2']['1'] ?>
                <br><?= $infopratique[$language]['2']['2']['2'] ?>
                <br><?= $infopratique[$language]['2']['2']['3'] ?>
              </td>
            </tr>
            <tr>
              <th><?= $infopratique[$language]['2']['3']['0'] ?></th>
              <td>
                <?= $infopratique[$language]['2']['3']['1'] ?>
                <br><?= $infopratique[$language]['2']['3']['2'] ?>
                <br><?= $infopratique[$language]['2']['3']['3'] ?>
              </td>
            </tr>
            <tr>
              <th><?= $infopratique[$language]['2']['4']['0'] ?></th>
              <td>
                <?= $infopratique[$language]['2']['4']['1'] ?>
                <br><?= $infopratique[$language]['2']['4']['2'] ?>
                <br><?= $infopratique[$language]['2']['4']['3'] ?>
              </td>
            </tr>
          </table>
        </div>

        <div class="col-12 mt-5">
          <h1 class="emplacement text-center"><?= $infopratique[$language]['3']['0'] ?></h1>
          <p class="text-center p-ul">
            <?= $infopratique[$language]['3']['1'] ?>
            <ul class="text-center list-unstyled">
              <li><?= $infopratique[$language]['3']['2'] ?></li>
              <li><?= $infopratique[$language]['3']['3'] ?></li>
              <li><?= $infopratique[$language]['3']['4'] ?></li>
              <li><?= $infopratique[$language]['3']['5'] ?></li>
            </ul>
          </p>
        </div>

      </div>

      <hr class="w-75">

      <div class="row">
        <div class="col-12">
          <h1>Goodies</h1>
          <div class="position-relative">
            <div class="row justify-content-center">

              <div class="col-md-3 mb-sm-3 mb-0">
                <img src="assets/img/Visuels/Goodies/GOODIESECOCUP.jpg" class="img-fluid" alt="Eco Cup Goodies SHIFT">
              </div>

              <div class="col-md-3 mb-sm-3 mb-0">
                <img src="assets/img/Visuels/Goodies/GOODIESTSHIRT blanc.jpg" class="img-fluid" alt="Eco Cup Goodies SHIFT">
              </div>

              <div class="col-md-3 mb-sm-3 mb-0">
                <img src="assets/img/Visuels/Goodies/GOODIESTSHIRT noir.jpg" class="img-fluid" alt="Eco Cup Goodies SHIFT">
              </div>

            </div>
          </div>

          <a href="#" class="btn btn-shift d-table mb-4 ml-auto mr-auto"><?= $infopratique[$language]['4'] ?></a>
          <a href="#" class="btn btn-secondary d-table font-weight-bold ml-auto mr-auto"><?= $infopratique[$language]['5'] ?></a>

        </div>
      </div>

    </div>
    <div class="container-fluid bg-red">
      <div class="row align-items-center">
        <div class="col-md-6 p-5">
          <div class="d-block">
            <h4 class="text-white font-weight-bold text-center mb-4"><?= $infopratique[$language]['6'] ?></h4>
          </div>
          <div class="row bg-white p-3 align-items-center justify-content-center">
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/1200px-PlayStation_logo.svg.png" class="img-fluid" alt="PlayStation">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/1200px-Xbox_one_logo.svg.png" class="img-fluid" alt="XBOX One">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/corsair-gaming-logo-png-8.png" class="img-fluid" alt="Corsair">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/logitech.png" class="img-fluid" alt="Logitech">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/coca.png" class="img-fluid" alt="CocaCola">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/SFR-logo.png" class="img-fluid" alt="SFR">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/Leader_Price_2010_Logo.svg.png" class="img-fluid" alt="Leader Price">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/RGB_VEOLIA_HD.png" class="img-fluid" alt="Veolia">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/edf.png" class="img-fluid" alt="EDF">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/1200px-GIGN_logo.svg.png" class="img-fluid" alt="GIGN">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/oculus-logo-7074DF63CC-seeklogo.com.png" class="img-fluid" alt="Oculus">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center">
              <img src="assets/img/sponsors/square-enix-logo.png" class="img-fluid" alt="Square Enix">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center mb-0">
              <img src="assets/img/sponsors/besthesda.png" class="img-fluid" alt="Besthesda">
            </div>
            <div class="col-4 col-lg-4 col-xl-3 text-center mb-0">
              <img src="assets/img/sponsors/Nintendo-logo-red.png" class="img-fluid" alt="Nintendo">
            </div>
          </div>
        </div>

        <div class="col-md-6 bg-white p-5 text-center">
          <img src="<?= $infopratique[$language]['7'] ?>" class="img-fluid" alt="Planning">
        </div>

      </div>
    </div>

    <script type="text/javascript" src="assets/js/menu.js"></script>
  </body>
</html>
