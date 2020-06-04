<?php
include_once('../database.php');
include_once('../language.php');
if ($_GET['id'] == $_SESSION['id']) { // On supprime la possibilité de voir les profils d'autres personnes
  $getid = intval($_GET['id']); // Retourne la valeur numérique entière en nombres
  $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
  $requser->execute(array($getid));

  $userinfo = $requser->fetch();

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
              <h6><?= $dashboard[$language]['0']['0'] ?></h6>
              <h3>0,00 €</h3>
            </div>
            <div class="mt-5">
              <div class="d-flex mb-5">
                <i class="fas fa-columns"></i>
                <span>Billetterie</span>
              </div>
              <div class="d-flex mb-5 active">
                <i class="fas fa-shopping-basket"></i>
                <span>Paiement</span>
              </div>
              <div class="d-flex mb-5">
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


        <?php
            // Système de calcul
            if (isset($_SESSION['panier']['prix']['0'])) {
              $taxe = ( ($_SESSION['panier']['prix']['0'] / 100) * 20 );
              $prix_taxé = ( $_SESSION['panier']['prix']['0'] + $taxe );
            }

         ?>


        <div class="col-md-12 col-lg-8 p-4" id="dashboard-responsive">
          <div class="container">
            <div class="row mb-lg-5">
              <div class="col-12 mt-5 text-center">
                <h1>Paiement du ticket</h1>
                <?php if (isset($_SESSION['panier']['prix']['0'])) {
                  echo "<p class=\"prix\"><span>HT".$_SESSION['panier']['prix']['0']." €</span><span>TVA".$taxe." €</span> <span>TTC". $prix_taxé." €</span></p>";
                  }
                  else {
                    echo "<p>Votre panier est vide, vous ne pouvez que changer votre carte bancaire !</p>";
                  }
                 ?>
              </div>

            </div>



                <?php
                if (!empty($_POST['carte']) AND !empty($_POST['expiration_post']) AND !empty($_POST['porteur_post'])) {

                  $idUser = $_SESSION['id'];
                  $carte = sha1($_POST['carte']);
                  $expiration = sha1($_POST['expiration_post']);
                  $proprio = htmlspecialchars($_POST['porteur_post']);
                  $cvc = htmlspecialchars($_POST['cvc']);
                }
                  $reqcarte = $bdd->prepare("SELECT * FROM carte_bleu WHERE idUser = ?");
                  $reqcarte->execute(array($_SESSION['id']));
                  $user = $reqcarte->rowCount();


                  if ($user == 1) {
                 ?>
           <div class="row mb-lg-5">
             <div class="col-12 bg-retour">
                <h5 class="text-center">Vos données bancaires ont déjà été sauvegardé, vous pouvez les modifier à tout moment ou les supprimer.</h5>
                <form action="" method="post">
                  <input class="btn btn-shift ml-auto mr-auto" type="submit" name="delete_carte" value="Supprimer mes données bancaires">
                </form>
              </div>
            </div>

          <?php };

            if (!empty($_POST['delete_carte'])) {
              $reqdelete = $bdd->prepare('DELETE FROM carte_bleu WHERE idUser = ?');
              $reqdelete->execute(array($_SESSION['id']));
            }

           ?>

            <div class="row justify-content-center">
              <div class="col-7">

                <object id="svg" data="../assets/img/CREDIT-CARD.svg" type="image/svg+xml">
                  <img src="../assets/img/CREDIT-CARD.svg" alt="Carte de Crédit" class="img-fluid">
                </object>

                <form action=<?= 'confirmation?id='.$_SESSION['id'] ?> method="post">
                  <table class="w-100">
                    <tr>
                      <td class="paiement"><input type="text" name="carte" placeholder="Numéro de carte" class="form-control mt-4" required maxlength="16" onkeypress="blocage();"></td>
                      <td><input type="text" name="expiration_post" placeholder="MM/AA" class="form-control mt-4" required id="carte" minlength="4" maxlength="4" onkeypress="blocage();" onkeyup="expiration();"></td>
                    </tr>
                    <tr>
                      <td class="paiement"><input type="text" name="porteur_post" placeholder="Nom du porteur de carte" class="form-control paiement" required id="porteur_id" onkeyup="porteur();" maxlength="28"></td>
                      <td><input type="text" name="cvc" placeholder="Cvc" class="form-control" required minlength="3" maxlength="3"></td>
                    </tr>
                  </table>

                  <input type="submit" name="carte" value="Valider la carte bleue" class="btn btn-shift ml-auto mr-auto">
                </form>

                <script type="text/javascript">


                  function blocage(){
                    // Blocage par rapport à la table ascii : j'autorise 0 ou 9 (valeur ascii : 48 et 57)
                    // 8 -> Backspace
                    if((event.keyCode < 48 || event.keyCode > 57 )
                       && (event.keyCode!=8)){
                        event.returnValue=false;
                    }
                  }

                  function expiration(){
                    let t = document.getElementById("svg");
                    let tt = t.contentDocument;
                    let ttt = tt.getElementById("expiration");

                    let carte1 = document.getElementById('carte').value.substr(0, 2);
                    let carte2 = document.getElementById('carte').value.substr(2, 4);

                    ttt.innerHTML = carte1+" / "+carte2;
                  }

                  function porteur(){
                    let t = document.getElementById("svg");
                    let tt = t.contentDocument;
                    let ttt = tt.getElementById("votre_nom");
                    ttt.innerHTML = document.getElementById('porteur_id').value;
                  }

                </script>


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
