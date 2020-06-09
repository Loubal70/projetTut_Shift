<?php

include_once('database.php');
include_once('language.php');


// Formulaire de connexion

if (isset($_POST['formconnexion'])) {

  $mailconnect = htmlspecialchars($_POST['mailconnect']);
  $mdpconnect = sha1($_POST['mdpconnect']);
  if (!empty($mailconnect) AND !empty($mdpconnect)) {
    $requser = $bdd->prepare("SELECT * from users WHERE mail = ? AND password = ?");
    $requser->execute(array($mailconnect, $mdpconnect));
    $userexist = $requser->rowCount(); // Compte le nombre de rangée pour l'utilisateur donné
    if ($userexist == 1) {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['mail'] = $userinfo['mail'];
      header("Location: profil/dashboard?id=".$_SESSION['id']."&language=".$_GET['language']);
      // echo $_GET['language'];
    }
    else {
      $erreur = "Votre mail ou votre mot de passe ne correspond pas !";
    }
  }
  else {
    $erreur = "Tous les champs doivent être complétés !";
  }
}


// Formulaire d'inscription


if (isset($_POST['forminscription'])) { // isset = si var n'est pas null

  $pseudo = htmlspecialchars($_POST['pseudo']);
  $mail = htmlspecialchars($_POST['mail']);
  $mail2 = htmlspecialchars($_POST['mail2']);
  $mdp = sha1($_POST['mdp']);
  $mdp2 = sha1($_POST['mdp2']);

  if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {


    $pseudolength = strlen($pseudo);
    if ($pseudolength <= 255) {
      $reqpseudo = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
      $reqpseudo->execute(array($pseudo));
      $pseudoexist = $reqpseudo->rowCount(); // On compte combien de fois ce mail existe
      if ($pseudoexist == 0) {
        if ($mail == $mail2) {
          $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
          $reqmail->execute(array($mail));
          $mailexist = $reqmail->rowCount(); // On compte combien de fois ce mail existe
          if ($mailexist == 0) {

            if ($mdp == $mdp2) {

              $longueurKey = 15;
              $key = "";
              for ($i=1; $i < $longueurKey; $i++) {
                $key .= mt_rand(0,9); // Fonction plus aléatoire et rapide que rand
              }

              $add_member = $bdd->prepare("INSERT INTO users(pseudo, mail, password, confirmkey) VALUES(?, ?, ?, ?) ");
              $add_member->execute(array($pseudo, $mail, $mdp, $key));

              // Système d'envoi de mail pour la vérification
              $header = "MIME-Version: 1.0\r\n";
              $header.= 'From:"SHIFT - Projet Étudiant"<contact@shift.louisb-host.fr>'."\n";
              $header.= 'Content-Type:text/html; charset="utf-8"'."\n";
              $header.= 'Content-Transfer-Encoding: 8bit';


              // Pour mettre des images, mettre une source hébergé sur un site
              $message = '
                <html>
                  <body>
                    <div align="center">
                    <h3>Bienvenue dans l\'aventure SHIFT ! <br>Afin de pouvoir accéder à votre tableau de bord, merci de confirmer votre compte client ! Un mail arrivera d\'ici 30 minutes</h3>
                      <a href="https://pshift.louisb-host.fr/confirmation_mail?pseudo='.urlencode($pseudo).'&key='.$key.'">Confirmez votre compte</a>
                    </div>
                  </body>
                </html>
              ';

              // $mail = destinataire
              mail($mail, "Confirmation de compte", $message, $header);
              $erreur = "Votre compte a bien été créé ! Vous pouvez dès à présent, le confirmer par mail !<br><br> <a href=\"connexion\" class='text-white'>» Me connecter «</a>";
              // header('Location: index.php');
              }
              else{
                $erreur = "Vos mots de passes ne correspondent pas !";
              }
            }
            else{
              $erreur = "Votre mail n'existe pas !";
            }
          }
          else {
            $erreur = "L'adresse mail est déjà utilisée !";
          }
        }
        else {
          $erreur = "Vos adresses mail ne correspondent pas !";
        }
      }
      else {
        $erreur = "Votre pseudo est déjà pris !";
      }

    }
    else {
      $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
    }
  }
  else {
    $erreur = "Tous les champs doivent être complétés !";
  }

include_once('header.php');

 ?>
<style media="screen">
#logo{
  position: relative;
  top: 25vh;
  left: 50%;
  transform: translateX(-50%);
  margin-left: 0px;
}
.container{
  position: relative;
  top: 25vh;
}
@media screen and (max-width: 992px){
  #logo {
      display: block;
      top: 0;
  }
  .container{
    top: 0;
  }
}
#timetoredirige
{
  color: white;
  font-size: 20px;
  text-align: center;
  padding: 20px;
  background-color: var(--rouge_f);
}
</style>
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <video src="assets/img/resize.mp4" autoplay loop muted width="400" id="logo" class="ml-0"></video>
  <div class="container">
    <h4 class="text-center mb-5">Vous allez être redirigé dans <span id="compteur">10</span> secondes.</h4>
    <h2 class="text-center my-auto" id="timetoredirige">
      <?php if (isset($erreur)) {echo $erreur;} ?>
    </h2>
  </div>
  <script type="text/javascript">
function countdown() {
    var compteur = document.getElementById('compteur');
    if (parseInt(compteur.innerHTML) <= 1) {
        location.href = 'connexion?language=<?= $_GET['language']?>';
    }
    compteur.innerHTML = parseInt(compteur.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>
</body>
