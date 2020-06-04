<?php
include_once('../database.php');
$requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();

if ($_SESSION['id'] == $_GET['id'] AND !empty($userinfo['reservation'])) { // On supprime la possibilité de voir les profils d'autres personnes

    if (!empty($_POST['carte']) AND !empty($_POST['expiration_post']) AND !empty($_POST['porteur_post'])) {

      $idUser = $_SESSION['id'];
      $carte = sha1($_POST['carte']);
      $expiration = sha1($_POST['expiration_post']);
      $proprio = htmlspecialchars($_POST['porteur_post']);
      $cvc = htmlspecialchars($_POST['cvc']);

      $requser = $bdd->prepare("SELECT * FROM carte_bleu WHERE idUser = ?");
      $requser->execute(array($_SESSION['id']));
      $user = $requser->rowCount();
      // echo $idUser."<br>".$carte."<br>".$expiration."<br>".$proprio."<br>".$cvc;

      if ($user == 0) {
        $bdd->exec("INSERT INTO carte_bleu(idUser,numero,expiration,proprietaire,cvc) VALUES('$idUser','$carte','$expiration','$proprio','$cvc')");
      }
      else {
        $bdd->exec("UPDATE carte_bleu SET carte = $carte, expiration = $expiration, proprietaire = $proprio, cvc = $cvc WHERE idUser = $idUser");
      }
    }


  include_once('../header.php');
 ?>
 <link rel="stylesheet" href="../assets/css/profil.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-2 menu">
          <div class="p-4 sticky-top">
            <a href="../"><img src="../assets/img/Logo_site.png" alt="Logo Shift" class="img-fluid" id="logo"></a>
            <div class="mt-5 text-center">
              <h6>Portefeuille</h6>
              <h3>0,00 €</h3>
            </div>
            <div class="mt-5">
              <div class="d-flex mb-5">
                <i class="fas fa-columns"></i>
                <span>Billetterie</span>
              </div>
              <div class="d-flex mb-5">
                <i class="fas fa-shopping-basket"></i>
                <span>Paiement</span>
              </div>
              <div class="d-flex mb-5 active">
                <i class="fas fa-clipboard-check"></i>
                <span>Confirmations</span>
              </div>
              <div class="copyright">
                <h5>Shift</h5>
                <p>Copyright ©<script type="text/javascript">document.write(new Date().getFullYear());</script> Tout droits réservés <a href="index" target="_blank">Shift</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-8 p-4" id="dashboard-responsive">
          <div class="container">
            <div class="row mb-lg-5">
              <div class="col-12 mt-5 text-center">
                <h1>Merci de votre achat</h1>
                <h4 class="text-secondary">à très vite chez Shift !</h4>
              </div>

            </div>
            <div class="row mt-5">
              <div class="col-md-6">

              </div>
              <div class="col-md-6 bg-white p-4 my-auto">
                <h5 class="font-weight-lighter">Votre achat a été confirmé, le détail de votre commande est téléchargable !</h5>
                <h5 class="font-weight-bold text-center">Rappel de votre commande :</h5><h4 class="text-center"><?= $userinfo['reservation'] ?></h4>
              </div>
            </div>

          </div>

        </div>
        <div class="col-md-12 col-lg-2 bg-white profil p-4">
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


          <?php if(isset($_SESSION['id'])) : ?>
          <div class="mt-5">
            <a href="editionprofil?id=<?= $_SESSION['id'] ?>" class="btn btn-shift"><i class="fas fa-users-cog"></i> Editer mon profil</a>
            <a href="deconnexion" class="btn btn-shift mt-3"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            <?php if ($userinfo['administrateur'] == 1) : ?>
             <a href="admin" class="btn btn-warning admin"><i class="fas fa-tools"></i> Panel d'administration</a>
            <?php endif; ?>
          </div>
        <?php endif; ?>



        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
      if ($(window).width() < 1200) {
        $( "#dashboard-responsive" ).removeClass('col-lg-8');
        $( "#dashboard-responsive" ).addClass('col-lg-10');
        $('.card-responsive').children().removeClass('col-lg-3');
        // alert('Action faite ?');
      }
    </script>

  </body>
</html>

<?php }else {
  header("Location: dashboard?id=".$_SESSION['id']);
} ?>
