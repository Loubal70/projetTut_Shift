<?php
include_once('../database.php');
$requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();
// --------------------------------------------------------------------
$req_carte = $bdd->prepare("SELECT * FROM carte_bleu WHERE idUser = ?");
$req_carte->execute(array($_SESSION['id']));
$carteinfo = $req_carte->fetch();

include_once('../language.php');
if (isset($_GET['id']) AND $_GET['id'] > 0 AND isset($_SESSION['id']) AND $_SESSION['id'] == $_GET['id'] AND isset($_GET['language'])) { // On supprime la possibilité de voir les profils d'autres personnes
  include_once('../header.php');
 ?>
 <link rel="stylesheet" href="../assets/css/profil.css">
  </head>
  <body>
       <?php if ($userinfo['confirme'] == 0){ ?>

         <div class="container-fluid">
           <div class="col-12 text-center mt-5">
             <video src="../assets/img/resize.mp4" autoplay loop muted width="400" class="ml-0"></video>
             <a href="deconnexion?language=<?= $_GET['language'] ?>"><h3 class="btn btn-shift">Merci de valider votre mail afin de pouvoir accéder à votre espace client</h3></a>
           </div>
         </div>
       <?php }else{?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-3 col-xl-2 menu">
          <div class="p-4 sticky-top">
            <a href="../"><img src="../assets/img/Logo_site.png" alt="Logo Shift" class="img-fluid" id="logo"></a>
            <div class="mt-5 text-center">
              <h6><?= $dashboard[$language]['0']['0'] ?></h6>
              <h3>0,00 €</h3>
            </div>
            <div class="mt-5">
              <div class="d-flex mb-5 active">
                <i class="fas fa-columns"></i>
                <span><?= $dashboard[$language]['0']['1'] ?></span>
              </div>
              <div class="d-flex mb-5">
                <i class="fas fa-shopping-basket"></i>
                <span><?= $dashboard[$language]['0']['2'] ?></span>
              </div>
              <div class="d-flex mb-5">
                <i class="fas fa-clipboard-check"></i>
                <span><?= $dashboard[$language]['0']['3'] ?></span>
              </div>
              <div class="copyright">
                <h5>Shift</h5>
                <p>Copyright ©<script type="text/javascript">document.write(new Date().getFullYear());</script> <?= $dashboard[$language]['0']['4'] ?> <a href="index" target="_blank">Shift</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-7 col-xl-8 p-4" id="dashboard-responsive">
          <button type="button" id="sidebar" class="btn btn-shift p-0 ">
             <i class="fa fa-bars m-0" aria-hidden="true"></i>
          </button>
          <div class="container">
            <div class="row mb-lg-5">
              <div class="col-12 bg-retour">
                <h4><?= $dashboard[$language]['0']['5'] ?> <?= $userinfo['pseudo'] ?> !</h4>
                <p class="mb-0"><?= $dashboard[$language]['0']['6'] ?></p>
              </div>
            </div>

            <div class="row justify-content-around mt-3 card-responsive">

              <div class="col-12 col-md-6 col-lg-3 text-center">
                <div class="col-12 card-shift">
                  <h3><?= $dashboard[$language]['1']['0']['0'] ?></h3>
                  <h4><?= $dashboard[$language]['1']['0']['1'] ?></h4>
                  <h5><?= $dashboard[$language]['1']['0']['2'] ?></h5>
                  <!-- <h4 class="mb-2">Prix :</h4> -->
                  <!-- <h3>40,00 €</h3> -->
                </div>
                <form action="" method="post">
                    <input type="submit" name="pass_standard" value="<?= $dashboard[$language]['2']['0'] ?>" class="btn btn-shift mt-5 ml-auto mr-auto">
                </form>
              </div>

              <div class="col-12 col-md-6 col-lg-3 text-center">
                <div class="col-12 card-shift">
                  <h3><?= $dashboard[$language]['1']['1']['0'] ?></h3>
                  <h4><?= $dashboard[$language]['1']['1']['1'] ?></h4>

                  <h5><?= $dashboard[$language]['1']['1']['2'] ?></h5>
                  <!-- <h4 class="mb-2">Prix :</h4> -->
                  <!-- <h3>40,00 €</h3> -->
                </div>
                <form action="" method="post">
                    <input type="submit" name="pass_vip" value="<?= $dashboard[$language]['2']['0'] ?>" class="btn btn-shift mt-5 ml-auto mr-auto">
                </form>
              </div>
              <div class="col-12 col-md-6 col-lg-3 text-center">
                <div class="col-12 card-shift">
                  <h3><?= $dashboard[$language]['1']['2']['0'] ?></h3>
                  <h4><?= $dashboard[$language]['1']['2']['1'] ?></h4>

                  <h5><?= $dashboard[$language]['1']['2']['2'] ?></h5>
                  <!-- <h4 class="mb-2">Prix :</h4>
                  <h3>40,00 €</h3> -->
                </div>
                <form action="" method="post">
                    <input type="submit" name="pass_malin" value="<?= $dashboard[$language]['2']['0'] ?>" class="btn btn-shift mt-5 ml-auto mr-auto">
                </form>
              </div>
            </div>


          </div>
          <?php include_once('fonctions-panier.php'); ?>
          <div class="container panier">
            <h4><?= $dashboard[$language]['2']['1'] ?></h4>
            <div class="row">

              <div class="col-lg-6">

                <div class="card minh-card">


                  <table class="table">
                    <tr>
                      <td>ID Article</td>
                      <td><?= $dashboard[$language]['2']['5'] ?></td>
                      <td></td>
                    </tr>
                    <?php if (!empty($_SESSION['panier']['id_article'])) :?>
                     <tr>
                       <td><?= $_SESSION["panier"]['id_article'][0] ?></td>
                       <td><?= $_SESSION["panier"]['prix'][0] ?> €</td>
                       <td>
                         <form action="" method="post">
                           <input type="submit" name="supp_<?= $_SESSION["panier"]['id_article'][0] ?>" value="<?= $dashboard[$language]['2']['4'] ?>" class="btn btn-shift-delete mt-0 pt-0 pb-0">
                         </form>
                       </td>
                     </tr>
                   <?php endif; ?>

                  </table>

                </div>
              </div>

              <div class="col-lg-6 d-flex justify-content-center align-items-baseline my-auto mt-md-5">



                  <?php if (empty($_SESSION['panier']['id_article']['0'])){ ?>
                      <a class="btn btn-shift mt-sm-3 m-0 bg-secondary" disabled><?= $dashboard[$language]['2']['2'] ?></a>
                  <?php }else {
                    $panier = $_SESSION['panier']['id_article'][0];
                    $req_reservation = $bdd->prepare("UPDATE users SET reservation = ? WHERE id = ?");
                    $req_reservation->execute(array($panier, $userinfo['id']));
                    if (isset($carteinfo) AND !empty($carteinfo)) {
                      echo '<a class="btn btn-shift mt-sm-3 m-0" href="confirmation?id='.$_SESSION['id']."&language=".$_GET['language'].'">'.$dashboard[$language]['2']['3'].'</a>';
                    }
                    else {
                      echo '<a class="btn btn-shift mt-sm-3 m-0" href="paiement?id='.$_SESSION['id']."&language=".$_GET['language'].'">'.$dashboard[$language]['2']['3'].'</a>';
                    }

                  } ?>
              </div>

            </div>

          </div>


        </div>
        <div class="col-md-12 col-lg-2 col-xl-2 bg-white profil p-4">
          <?php
          if (!empty($userinfo['avatar'])) {
            echo "<img src=\"../assets/img/Users/avatars/".$userinfo['avatar']."\" alt='Photo de profil' class='rounded-circle ml-auto mr-auto d-block mt-4' width='150' height='150' style='border: 3px solid var(--rouge_f); padding: 6px'>";
          }
          else {
            echo "<img src=\"../assets/img/Users/avatars/no_image.jpg\" alt=\"Photo de profil\" class='rounded-circle ml-auto mr-auto d-block mt-4' width='150' height='150' style='border: 3px solid var(--rouge_f); padding: 6px'>";
          }
           ?>

          <div class="mt-3 text-center">
            <span><?= $userinfo['pseudo'] ?></span>
          </div>


          <?php

          if(isset($_SESSION['id'])) : ?>
          <div class="mt-5">
            <a href="editionprofil?id=<?= $_SESSION['id']."&language=".$_GET['language'] ?>" class="btn btn-shift"><i class="fas fa-users-cog"></i> <?= $dashboard[$language]['3']['0'] ?></a>

            <?php if($carteinfo['idUser'] == $_SESSION['id']) : ?>
              <a href="paiement?id=<?= $_SESSION['id']."&language=".$_GET['language'] ?>" class="btn btn-shift mt-3"><i class="fas fa-users-cog"></i> <?= $dashboard[$language]['3']['1'] ?></a>
            <?php endif; ?>
            <a href="deconnexion<?= "?language=".$_GET['language']?>" class="btn btn-shift mt-3"><i class="fas fa-sign-out-alt"></i> <?= $dashboard[$language]['3']['2'] ?></a>
            <?php if ($userinfo['administrateur'] == 1) : ?>
             <a href="admin<?= "?language=".$_GET['language'] ?>" class="btn btn-warning admin"><i class="fas fa-tools"></i> <?= $dashboard[$language]['3']['3'] ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>



        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
      if ($(window).width() < 1200) {
        $( "#dashboard-responsive" ).removeClass('col-xl-8');
        $( "#dashboard-responsive" ).addClass('col-xl-10');
        $('.card-responsive').children().removeClass('col-lg-3');
        // alert('Action faite ?');
      }
      $('#sidebar').click(function(){
        if ($(this).hasClass('active')) {
          $(".menu").removeClass('active');
          setTimeout(function(){$('#sidebar').css('opacity', '0');}, 300);
          setTimeout(function(){ $("#sidebar").removeClass('active'); $('#sidebar').css('opacity', '1');}, 1000);
        }
        else {
          $(".menu").addClass('active');
          setTimeout(function(){$('#sidebar').css('opacity', '0');}, 300);
          setTimeout(function(){ $("#sidebar").addClass('active'); $('#sidebar').css('opacity', '1');}, 1000);
        }
      })
    </script>

  </body>
</html>

<?php } }else {
  header("Location: ../index.php");
  // echo $_GET['language'];
}

?>
