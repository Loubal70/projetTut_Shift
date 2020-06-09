<?php
  include_once('database.php');

  include_once('header.php');

  include_once('language.php');

?>
 <link rel="stylesheet" href="assets/css/style.css">
 <link rel="stylesheet" href="assets/css/connexion.css">
  </head>
  <body>
    <!-- <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7 bg-purple p-0">
            <h1>Bon retour <br>parmis nous !</h1>
        </div>
        <div class="col-lg-5 text-center my-auto">
          <img src="img/connexion_user.png" alt="" class="img-fluid">
          <h2 class="mt-5">Connexion</h2>
          <br><br>

          <form action="" method="post" class="w-50 ml-auto mr-auto">
            <input type="email" name="mailconnect" placeholder="Mail"><br>
            <input type="password" name="mdpconnect" placeholder="Mot de passe"><br>
            <input type="submit" name="formconnexion" value="Se connecter">
          </form>
          <?php// if (isset($erreur)) {echo $erreur;} ?>
        </div>
      </div>
    </div> -->

<div class="container my-auto h-100" id="container">
    <div class="form-container sign-up-container">
        <form action="connexion_inscription?language=<?= $_GET['language'] ?>" method="post">
            <h1 class="mb-2"><?= $connexion[$language]['0'] ?></h1>
            <h5 id="info" class="mb-3"> </h5>
            <input type="text" placeholder="<?= $connexion[$language]['1']['0'] ?>" name="pseudo" class="form-control form-connexion" id="pseudo" value="<?php if(isset($pseudo) AND isset($pseudoexist) AND $pseudoexist == 0){echo $pseudo;} ?>">
            <input type="email" name="mail" placeholder="<?= $connexion[$language]['1']['1'] ?>" class="form-control form-connexion" id="mail" value="<?php if(isset($mail) AND isset($mailexist) AND $mailexist == 0){echo $mail;} ?>">
            <input type="email" name="mail2" placeholder="<?= $connexion[$language]['1']['2'] ?>" class="form-control form-connexion" id="mail2" autocomplete="off">

            <input type="password" name="mdp" placeholder="<?= $connexion[$language]['1']['3'] ?>" class="form-control form-connexion" id="mdp">
            <input type="password" name="mdp2" placeholder="<?= $connexion[$language]['1']['4'] ?>" class="form-control form-connexion" id="mdp2">
            <button type="submit" name="forminscription" class="mt-3"><?= $connexion[$language]['1']['5'] ?></button>
        </form>
    </div>
    <div class="form-container connecter-container">
        <form action="connexion_inscription<?= "?language=".$_GET['language'] ?>" method="post">
            <h1 class="mb-5"><?= $connexion[$language]['1']['6'] ?></h1>
            <input type="email" placeholder="Email" class="form-control form-connexion" name="mailconnect">
            <input type="password" placeholder="<?= $connexion[$language]['1']['3'] ?>" class="form-control form-connexion" name="mdpconnect">
            <a href="#"><?= $connexion[$language]['1']['7'] ?></a>
            <button type="submit" name="formconnexion"><?= $connexion[$language]['1']['6'] ?></button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1><?= $connexion[$language]['3']['0'] ?></h1>
                <p><?= $connexion[$language]['3']['1'] ?></p>
                <button class="btn-outline-light" id="connexion"><?= $connexion[$language]['1']['6'] ?></button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1><?= $connexion[$language]['2']['0'] ?></h1>
                <p><?= $connexion[$language]['2']['1'] ?></p>
                <button class="btn-outline-light" id="inscription"><?= $connexion[$language]['1']['5'] ?></button>
            </div>
        </div>
    </div>
</div>
  <script type="text/javascript">
const inscriptionButton = document.getElementById('inscription');
const connexionButton = document.getElementById('connexion');
const container = document.getElementById('container');

inscriptionButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

connexionButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});
document.getElementById('mail2').onpaste = function(){
  document.getElementById("info").innerHTML = "Merci de recopier et de ne pas copier / coller votre adresse mail !";
  return false;
}
document.getElementById('mdp2').onpaste = function(){
  document.getElementById("info").innerHTML = "Merci de recopier et de ne pas copier / coller votre mot de passe !";
  return false;
}

  </script>
  </body>
</html>
