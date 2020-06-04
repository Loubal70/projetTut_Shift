<?php

include_once('../database.php');

$requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();

  if (!isset($_SESSION['id']) AND $userinfo['administrateur'] == 1 ) {
    header('Location: index');
  }

  if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {

    $req = $bdd->prepare('DELETE FROM users WHERE id = ?');
    $req->execute(array($_GET['supprimer']));
    header('Location: admin');
  }

 $membres = $bdd->query('SELECT * FROM users ORDER BY id DESC LIMIT 5');


 // Système d'articles :

 $mode_edition = 0;

 if (isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $edit_article->execute(array($edit_id));

   if ($edit_article->rowCount() == 1) {

     $edit_article = $edit_article->fetch();

   }else {
     die('Erreur : L\'article n\'existe pas ! <a href="admin">Retour</a>');
   }

 }


 if (isset($_POST['article_titre'], $_POST['article_contenu'])) {
   if (!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {

     $article_titre = htmlspecialchars($_POST['article_titre']);
     $article_contenu = htmlspecialchars($_POST['article_contenu']);

     if ( $mode_edition == 0) {

       if (isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) {
         $ins = $bdd->prepare('INSERT INTO articles (titre, contenu, date_time_publication) VALUES (?,?, NOW())');
         $ins->execute(array($article_titre, $article_contenu));

         $lastid = $bdd->lastInsertId();

         // var_dump($_FILES['miniature']);
         // var_dump($_FILES['miniature']['tmp_name']);
         // echo $lastid;

         // exif_imagetype - Détermine le type d'une image
         // int 2 --> JPEG
         // int 3 --> PNG (voir doc pour plus)

         if (exif_imagetype($_FILES['miniature']['tmp_name'] ) == 2 OR exif_imagetype($_FILES['miniature']['tmp_name'] ) == 3) {
           if (exif_imagetype($_FILES['miniature']['tmp_name'] ) == 2) {
             $extension = ".jpeg";
           }
           elseif (exif_imagetype($_FILES['miniature']['tmp_name'] ) == 3) {
             $extension = ".png";
           }
           $chemin = "../assets/img/Articles/Id_Article_".$lastid.$extension;
           // echo $chemin;
           move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
             $miniature = "Id_Article_".$lastid.$extension;
             $update = $bdd->prepare('UPDATE articles SET miniature = ? WHERE id = ?');
             $update->execute(array($miniature, $lastid));
           $message = "Votre message a bien été posté !";
           header('Refresh: 3; URL=admin');
         }
         else {
           $erreur = "L'image doit être au format PNG";
         }
       }
       else {
         $erreur = "L'image est obligatoire !";
       }
     }
     else {
         $update = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ?, date_time_edition = NOW() WHERE id = ?');
         $update->execute(array($article_titre, $article_contenu, $edit_id));

         $message = "Votre message a bien été mis à jour !";
         header('Refresh: 3; URL=admin');
     }

   }
   else {
     $erreur = "Veuillez remplir tous les champs";
   }
 }


 ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container-fluid mt-4">
      <h1 class="text-center bg-dark pt-3 pb-3 text-white">Panel d'administration</h1>

      <div class="row mt-5">
        <div class="col-lg-5 ml-md-5">

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row justify-content-center text-white">
        <div class="col-md-6 col-lg-4 bg-danger p-3 ">
          <h3 class="text-center">Espace Membres : </h3>
          <p class="text-center"><i>Affiche les 5 dernières personnes inscrites</i></p>
          <ul>
            <?php while ($m = $membres->fetch()) { ?>
              <li>Membres n° <?= $m['id'] ?> : <?= $m['pseudo'] ?> - <a href="admin?supprimer=<?= $m['id'] ?>" class="text-white font-weight-bold">Supprimer</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="col-md-6 col-lg-4 bg-warning p-3">

          <!-- Système d'articles -->

          <?php
            if($mode_edition == 1){
              $titre = "Modification d'articles :";
            }
            else {
              $titre = "Publication d'articles :";
            }
          ?>

          <h3 class="text-center"><?= $titre ?></h3>
          <?php if (isset($erreur)): ?>
            <div class="alert alert-danger alert-link text-center" role="alert">
              <?= $erreur ?>
            </div>
          <?php endif; ?>

          <?php if (isset($message)): ?>
            <div class="alert alert-success alert-link text-center" role="alert">
              <?= $message ?>
            </div>
          <?php endif; ?>

          <form method="post" enctype="multipart/form-data">
            <br>
            <input type="text" name="article_titre" class="form-control" placeholder="Titre" <?php if($mode_edition == 1){ ?> value="<?= $edit_article['titre'] ?>"<?php } ?>>
            <br>
            <?php if ($mode_edition == 0) :?>
              <input type="file" name="miniature" class="form-control-file"><br>
            <?php endif; ?>

            <textarea rows="8" cols="80" name="article_contenu" class="form-control" placeholder="Contenu de l'article (Html Compatible)"><?php if($mode_edition == 1){ ?><?= $edit_article['contenu'] ?><?php } ?></textarea>
            <br>
            <input type="submit" class="btn btn-danger d-block ml-auto" value="Envoyer l'article">
          </form>




        </div>
        <div class="col-md-6 col-lg-4 bg-danger mt-md-3 mt-lg-0 p-3">
          <h3 class="text-center">Liste des articles :</h3>
          <?php
            $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
            while ($a = $articles->fetch()) { ?>
              <li><a href="article?article_id=<?= $a['id']?>" class="text-white"><?= $a['titre'] ?></a> | <a href="?edit=<?= $a['id'] ?>" class="text-white font-weight-bold">Modifier </a> | <a href="delete_article.php?id=<?= $a['id'] ?>" class='text-white'>Supprimer</a></li>
          <?php } ?>
        </div>
      </div>
    </div>

  </body>
</html>
