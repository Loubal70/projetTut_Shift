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
    require('../language.php');
 ?>
 <link rel="stylesheet" href="../assets/css/style.css">
 <link rel="stylesheet" href="../assets/css/connexion.css">

 <style media="screen">
   .modification-container{
     left: 0;
     width: 50%;
   }
   @media screen and (max-width: 1800px){
     .form-editionprofil.w-35{
       width: 50%!important;
     }
   }
   @media screen and (max-width: 1200px){
     .form-editionprofil.w-35{
       width: 75%!important;
     }
   }
   @media screen and (max-width: 992px){
     .modification-container{
       width: 100%;
     }
     .overlay-responsive{
       display: none;
     }
   }
 </style>

  </head>
  <body >

    <div class="container my-auto h-100" id="container">
    <div class="form-container modification-container">

        <form action="" method="post" class="container ml-auto mr-auto" enctype="multipart/form-data">
          <div class="d-flex justify-content-center">
            <!-- <img src="../assets/img/Logo_site.png" class="img-fluid" alt="Logo"> -->
            <h1 class="mt-3 mt-xl-2 mb-5 mb-xl-3 text-uppercase font-weight-bold"><?= $edit_profil[$language]['0'] ?></h1>
          </div>
          <div class="d-flex justify-content-center align-items-center">
            <?php
            if (!empty($user['avatar'])) {
              echo "<img src=\"../assets/img/Users/avatars/".$user['avatar']."\" alt='Photo de profil' class='rounded-circle p-2' width='150' height='150' style='border: 3px solid var(--rouge_f); padding: 6px'>";
            }
            else {
              echo "<img src=\"../assets/img/Users/avatars/no_image.jpg\" alt=\"Photo de profil\" class='rounded-circle p-2' width='150' height='150' style='border: 3px solid var(--rouge_f); padding: 6px'>";
            }
             ?>
             <div class="m-3">
               <label for="file" class="mb-0 edit_photo"><?= $edit_profil[$language]['1'] ?></label>
               <input type="file" name="avatar" class="form-control-file ml-auto mr-auto w-auto d-none" id="file">
               <p class="ml-3 mr-3 mt-0 mb-0"><small class="text-secondary"><?= $edit_profil[$language]['2'] ?></small></p>
             </div>

          </div>

          <br>
          <label>Pseudo :</label>
          <input type="text" name="newpseudo" class="form-control form-editionprofil w-35 ml-auto mr-auto" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>"><br>
          <label>Mail :</label>
          <input type="email" name="newmail" class="form-control form-editionprofil w-35 ml-auto mr-auto" placeholder="Mail" value="<?php echo $user['mail']; ?>"><br>
          <label><?= $edit_profil[$language]['3']. " : " ?></label>
          <input type="password" name="newmdp1" class="form-control form-editionprofil w-35 ml-auto mr-auto" placeholder="<?= $edit_profil[$language]['3'] ?>"><br>
          <label><?= $edit_profil[$language]['4']. " : " ?></label>
          <input type="password" name="newmdp2" class="form-control form-editionprofil w-35 ml-auto mr-auto" placeholder="<?= $edit_profil[$language]['4'] ?>"><br>
          <div class="d-flex justify-content-center align-items-center mt-3">
            <input type="submit" class="btn btn-danger" value="<?= $edit_profil[$language]['5'] ?>">
            <a href="dashboard?id=<?= $_SESSION['id']."&language=".$_GET['language']?>" class="btn text-secondary"><?= $edit_profil[$language]['6'] ?></a>
          </div>
        </form>
    </div>
    <div class="overlay-container overlay-responsive">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <img src="../assets/img/Users/Mesa de trabajo 1.svg" alt="Edition de profil - Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

  </body>
</html>
<?php


}
else {
  header('Location: ../connexion.php');
}
 ?>
