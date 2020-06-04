<?php
include_once('../database.php');

  if (isset($_SESSION['id'])) { // Est-ce que la personne est connecté ?
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if (isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']); // htmlspecialchars sert à sécuriser la variable pour éviter des injections SQL
      $insertpseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: dashboard?id='.$_SESSION['id']);
    }

    if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']); // htmlspecialchars sert à sécuriser la variable pour éviter des injections SQL
      $insertmail = $bdd->prepare("UPDATE users SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: dashboard?id='.$_SESSION['id']);
    }

    if (isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);

      if ($mdp1 == $mdp2) {
        $insertmdp = $bdd->prepare('UPDATE users SET password = ? WHERE id = ?');
        $insertmdp->execute(array($mdp1, $_SESSION['id']));
        header('Location: dashboard?id='.$_SESSION['id']);
      }
      else {
        $msg = "Vos deux mots de passe ne correspondent pas !";
      }
    }

    if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
      $tailleMax = 2097152 ; // en octets (2 Mo)
      $extensionsValides = array('jpg','jpeg','gif','png');
      if ($_FILES['avatar']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        // strtolower : permet de mettre en minuscule une chaine de caractères
        // substr : permet d'ignorer un caractère de la chaine --> ici "."
        // strrchr : permet de prendre l'extension du fichier
        if (in_array($extensionUpload, $extensionsValides)) { // On voit si l'extension mise est bien valide
          // Vérification terminée, créons la gestion vers le serveur
          $chemin = "../assets/img/Users/avatars/".$_SESSION['id'].".".$extensionUpload;
          $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
          if ($resultat) {
            $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
              'avatar' => $_SESSION['id'].".".$extensionUpload,
              'id' => $_SESSION['id']
            ));
            header('Location: dashboard?id='.$_SESSION['id']);
          }
          else {
            $msg = "Erreur lors de l'upload de votre photo de profil";
          }
        }
        else {
          $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
      }
      else {
        $msg = "Votre photo de profil ne doit pas dépasser 2 Mo";
      }
    }




    // if (isset($_POST['newpseudo']) AND $_POST['newpseudo'] == $user['pseudo']) {
    //   header('Location: dashboard?id='.$_SESSION['id']);
    // }
    include_once("../header.php");
 ?>

  </head>
  <body class="mt-5">
    <div class="text-center">
      <h2>Edition de mon profil</h2>
        <form action="" method="post" align='left' class="container mt-3" enctype="multipart/form-data">
          <label>Avatar :</label>
          <input type="file" name="avatar">
          <br><br>

          <label>Pseudo :</label>
          <input type="text" name="newpseudo" class="form-control w-50" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>"><br><br>
          <label>Mail :</label>
          <input type="email" name="newmail" class="form-control w-50" placeholder="Mail" value="<?php echo $user['mail']; ?>"><br><br>
          <label>Mot de passe :</label>
          <input type="password" name="newmdp1" class="form-control w-50" placeholder="Mot de passe"><br><br>
          <label>Confirmation de mot de passe :</label>
          <input type="password" name="newmdp2" class="form-control w-50" placeholder="Confirmation du mot de passe"><br><br>
          <input type="submit" class="btn btn-shift" value="Mettre à jour mon profil">
        </form>
        <a href="dashboard?id=<?= $_SESSION['id']?>" class="btn btn-shift d-block m-3">Retour au tableau de bord</a>
        <?php if (isset($msg)) {echo $msg; } ?>

    </div>
  </body>
</html>
<?php


}
else {
  header('Location: ../connexion.php');
}
 ?>
