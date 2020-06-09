<?php
include_once('database.php');
include_once('header.php');
include_once('language.php');
?>
<link href="assets/css/style.css" rel="stylesheet">
</head>
  <body>
    <header>
      <div id="menu" class="items d-flex">
          <a href="">Accueil</a>
          <a href="#blog" onclick="fermermenu();">Blog</a>
          <a href="#contact" onclick="fermermenu();">Nous contacter</a>
      </div>
    </header>
    <video autoplay muted loop id="fond">
      <source src="assets/img/BG_v4_opti.mp4" type="video/mp4">
    </video>

    <header class="position-relative">
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
              var language =jQuery('#language').val();
              window.location.href= '?language='+language;
            }
          </script>
        </div>
      </nav>
    </header>

    <section class="container-fluid first-index ">
      <div class="row mb-5">

        <div class="col-md-2 text-center my-auto timer">
          <div id="jours"></div>
          <div id="heures"></div>
          <div id="minutes"></div>
          <div id="secondes"></div>
        </div>

        <div class="col-md-8 mt-sm-5">

          <?php

            include_once("assets/php/carousel.php");

          $photos = [
            [
              'url' => 'assets/img/Visuels/VISUEL_RS_XBOX-1920px_1080px.png',
              'credit' => 'XBOX',
              'titre' => '',
            ],
            [
              'url' => 'assets/img/Visuels/VISUEL_RS_PLAYSTATION-1920px_1080px.png',
              'credit' => 'PlayStation',
              'titre' => '',
            ],
            [
              'url' => 'assets/img/Visuels/VISUEL_WEBSITE_NINTENDO-1110px_470px.png',
              'credit' => 'Nintendo',
              'titre' => '',
            ],
            [
              'url' => 'assets/img/Visuels/VISUEL_WEBSITE_UBISOFT-1110px_470px.png',
              'credit' => 'Ubisoft',
              'titre' => '',
            ],
            [
              'url' => 'assets/img/Visuels/VISUEL_WEBSITE_GAMES-1110px_470px.png',
              'credit' => 'Jeux',
              'titre' => '',
            ],
          ];

          // INFORMATIONS IMPORTANTES :
          // Pour mettre un lien, faites attention comment il est écrit :
          // Vous pouvez également remplacer watch?v=par devient embed/ainsi http://www.youtube.com/watch?v=eCfDxZxTBW4 --> http://www.youtube.com/embed/eCfDxZxTBW4

          $videos = [
            // [
            //   'url' => 'https://www.youtube.com/embed/H3jLkJrhHKQ',
            //   'credit' => 'Exemple de video',
            //   'titre' => 'Mon titre',
            // ],
          ];

          // Echo un code de façon plus lisible
          // echo '<pre>';

          // afficher le résultat en code html
          $options = [
            'show_title' => false,
          ];
          echo carroussel($photos, $options, $videos);


          // echo '</pre>';

          ?>


        </div>

        <div class="col-md-2 reseaux my-auto">
          <a href="https://www.facebook.com/ShiftGameEvent/" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/shift_gameevent/" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://twitter.com/Shift_GameEvent" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="https://www.youtube.com/channel/UCKYJl6D2hpmvgk8J_wJRnGw/" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>

      </div>
      <a href="connexion" class="btn btn-shift xp"><?= $index[$language]['0'] ?></a>

    </section>


    <section class="bg-white position-relative second-index pt-5 pb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="header text-center pb-5">
              <h1 class="font-weight-bold text-uppercase"><?= $index[$language]['1'] ?></h1>
              <span><?= $index[$language]['2'] ?></span>
            </div>
          </div>
        </div>
        <div class="row justify-content-center pb-5">
          <div class="col-xl-5 my-auto">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?= $index[$language]['9'] ?>" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-xl-4 mt-5 mt-xl-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Plan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?= $index[$language]['3'] ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tarifs" role="tab" aria-controls="contact" aria-selected="false"><?= $index[$language]['4'] ?></a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <img src="assets/img/Visuels/CARTE_SALON@72x.png" width="500" class="img-fluid d-block ml-auto mr-auto" alt="Plan du salon">
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p class="p-5 text-justify">
                  <?= $index[$language]['5'] ?>
                </p>
              </div>
              <div class="tab-pane fade p-2 mt-3" id="tarifs" role="tabpanel" aria-labelledby="contact-tab">
                <table class="table text-center">
                  <tr>
                    <th colspan="2"><?= $index[$language]['6']['0'] ?></td>
                    <th><?= $index[$language]['6']['1'] ?></td>
                  </tr>
                  <tr>
                    <td><?= $index[$language]['6']['2'] ?></td>
                    <td><?= $index[$language]['6']['3'] ?></td>
                    <td><?= $index[$language]['6']['4'] ?></td>
                  </tr>
                  <tr>
                    <td><?= $index[$language]['6']['5'] ?></td>
                    <td><?= $index[$language]['6']['6'] ?></td>
                    <td><?= $index[$language]['6']['7'] ?></td>
                  </tr>
                  <tr>
                    <td><?= $index[$language]['6']['8'] ?></td>
                    <td><?= $index[$language]['6']['9'] ?></td>
                    <td><?= $index[$language]['6']['10'] ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>




      </div>
    </section>


    <section class="pt-3 pb-5" id="blog">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="header text-center pb-5">
              <h1 class="font-weight-bold text-uppercase">Actualités</h1>
            </div>
          </div>
        </div>
        <div class="row">
          <?php $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');?>
        <?php while ($a = $articles->fetch()) { ?>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="article?article_id=<?= $a['id'] ?>"><img src="assets/img/Articles/<?= $a['miniature'] ?>" alt="Image" class="img-fluid rounded position-relative"></a>
              <div class="excerpt">
                <!-- <span class="post-category text-white bg-secondary mb-3">Politics</span> -->
                <h2 class="post-titre"><a href="article?article_id=<?= $a['id']?>"><?= $a['titre'] ?></a></h2>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>



    <section id="contact">
      <div class="container">
        <div class="contactinfo">
          <div>
            <h2><?= $index[$language]['7']['0'] ?></h2>
            <ul class="info">
              <li>
                <span><i class="fas fa-search-location"></i></span>
                <span><a href="https://www.google.com/maps/place/1+Place+de+la+Porte+de+Versailles,+75015+Paris/data=!4m2!3m1!1s0x47e6707227dc3507:0x6a2edc280a719a55?sa=X&ved=2ahUKEwjptLXNhuPpAhUPkxQKHaaSCF0Q8gEwAHoECAsQAQ" target="_blank" class="text-white">1 Place de la Porte de Versailles, 75015 Paris</a></span>
              </li>
              <li>
                <span><i class="fas fa-envelope-open-text"></i></span>
                <span>shift.GameEvent@gmail.com</span>
              </li>
              <li>
                <span><i class="fas fa-mobile-alt"></i></span>
                <span>+33 6 00 00 00 00</span>
              </li>
              <li>
                <span><i class="fab fa-discord"></i></span>
                <span>Soon...</span>
              </li>
            </ul>
            <ul class="sci">
              <li><a href="https://www.facebook.com/ShiftGameEvent/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://www.instagram.com/shift_gameevent/" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li><a href="https://twitter.com/Shift_GameEvent" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UCKYJl6D2hpmvgk8J_wJRnGw/" target="_blank"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="contactForm">
          <h2><?= $index[$language]['7']['1'] ?></h2>
          <p><?= $index[$language]['7']['2'] ?></p>

          <div class="formBox">
              <form action="" method="post">
                <div class="inputBox w-50">
                  <label for="form_nom"><?= $index[$language]['7']['3'] ?></label>
                  <input type="text" id="form_nom" class="form-control" required>

                </div>
                <div class="inputBox w-50">
                  <label for="form_prenom"><?= $index[$language]['7']['4'] ?></label>
                  <input type="text" id="form_prenom" class="form-control" required>
                </div>
                <div class="inputBox w-50">
                  <label for="form_mail"><?= $index[$language]['7']['5'] ?></label>
                  <input type="email" id="form_mail" class="form-control" required>
                </div>
                <div class="inputBox w-50">
                  <label for="form_tel"><?= $index[$language]['7']['6'] ?></label>
                  <input type="tel" id="form_tel" class="form-control" required>
                </div>
                <div class="inputBox w-100">
                  <label for="form_message"><?= $index[$language]['7']['7'] ?></label>
                  <textarea id="form_message" rows="8" cols="80" class="form-control" required></textarea>
                </div>
                <div class="inputBox w-100">
                  <input type="submit" value="<?= $index[$language]['7']['8'] ?>" class="btn btn-shift">
                </div>
              </form>

              <?php

              if(isset($_POST['message'])){
                  $entete  = 'MIME-Version: 1.0' . "\r\n";
                  $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                  $entete .= 'From: ' . $_POST['email'] . "\r\n";

                  $message = '<h1>Message envoyé depuis la page Contact de monsite.fr</h1>
                  <p><b>Nom : </b>' . $_POST['name'] . '<br>
                  <b>Email : </b>' . $_POST['email'] . '<br>
                  <b>Message : </b>' . $_POST['message'] . '</p>';

                  $retour = mail('louisbal70@gmail.com', 'Envoi depuis page Contact', $message, $entete);
                  if($retour) {
                      echo '<p>Votre message a bien été envoyé.</p>';
                  }
              }
              ?>

          </div>

        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="font-small">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© <script type="text/javascript">
              document.write(new Date().getFullYear());

            </script> Copyright :
        <a href="https://shift.louisb-host.fr/"> shift.louisb-host.fr/</a> - Tout droit réservés
      </div>

    </footer>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/compteur.js"></script>
    <!-- Version jQuery pour le carrousel -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.5/owl.carousel.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
              $('.owl-carousel').owlCarousel({
                loop:false,
                rewind:true,
                margin:10,
                nav:false,
                dots:true,
                video:true,
                lazyLoad: true,
                caption:true,
                autoplay:true,
                // autoplayTimeout:4000, // Time Before Change (4s)
                smartSpeed:500, // Transition-delay (500ms)
                autoplayHoverPause:true,
                // navText:["<img id='left-arrow' src='assets/img/left-arrow.svg'>","<img id='right-arrow' src='assets/img/right-arrow.svg'>"],
                responsive:{
                    0:{
                        items:1
                    },
                    3000:{
                        items:1
                    }
                }
              });

            });

    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.min.js"></script>
    <script language="javascript">
        $(function() {
            toastr.options = {
               "closeButton": true,
               "debug": false,
               "positionClass": "toast-bottom-left",
               // "showDuration": "10000",
               // "hideDuration": "100",
               "timeOut": "0",
               // "extendedTimeOut": "1000",
               "showEasing": "swing",
               "hideEasing": "linear",
               "showMethod": "fadeIn",
               "hideMethod": "fadeOut",
            }
      toastr.info("<p><?= $index[$language]['8'] ?></p>");
        });
    </script>
    <script type="text/javascript" src="assets/js/menu.js"></script>
  </body>
</html>
