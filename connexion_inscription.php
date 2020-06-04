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
              $add_member = $bdd->prepare("INSERT INTO users(pseudo, mail, password) VALUES(?, ?, ?) ");
              $add_member->execute(array($pseudo, $mail, $mdp));
              $erreur = "Votre compte a bien été créé !<br><br> <a href=\"connexion\" class='text-white'>» Me connecter «</a>";
              // header('Location: index.php');
            }
            else{
              $erreur = "Vos mots de passes ne correspondent pas !";
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
#datenaissance
{
  color: white;
  font-size: 20px;
  text-align: center;
  padding: 20px;
  background-color: var(--rouge_f);
}
</style>
</head>
<body>
  <video src="assets/img/resize.mp4" autoplay loop muted width="400" id="logo"></video>
  <div class="container">
    <h4 class="text-center mb-5">Vous allez être redirigé dans <span id="compteur">10</span> secondes.</h4>
    <h2 class="text-center my-auto" id="datenaissance">
      <?php if (isset($erreur)) {echo $erreur;} ?>
    </h2>
  </div>
  <script type="text/javascript">
function countdown() {
    var compteur = document.getElementById('compteur');
    if (parseInt(compteur.innerHTML) <= 1) {
        location.href = '/connexion';
    }
    compteur.innerHTML = parseInt(compteur.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>
</body>
