<?php

include_once('../database.php');
require('../language.php');

$requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();

  if (!isset($_SESSION['id']) OR $userinfo['administrateur'] != 1 ) {
    header('Location: ../index');
  }

  if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {

    $req = $bdd->prepare('DELETE FROM users WHERE id = ?');
    $req->execute(array($_GET['supprimer']));
    header('Location: admin');
  }

 $membres = $bdd->query('SELECT * FROM users ORDER BY id DESC LIMIT 10');


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
           $message = $admin[$language]['2']['2'];
           header('Refresh: 3; URL=admin?language='.$language);
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

         $message = $admin[$language]['2']['7'];
         header('Refresh: 3; URL=admin?language='.$language);
     }

   }
   else {
     $erreur = $admin[$language]['2']['3'];
   }
 }

include_once('../header.php');

 ?>
 <link rel="stylesheet" href="../assets/css/profil.css">
</head>
  <body>
    <div class="container-fluid mt-4 mb-3">
      <h1 class="text-center bg-dark pt-3 pb-3 text-white"><?= $admin[$language]['0']['0'] ?></h1>

      <div class="row mt-4 mb-3">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-4 my-auto">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="numbers">
                      <p class="card-category"><?= $admin[$language]['0']['1'] ?></p>
                      <?php
                        $nbr_user_req = $bdd->query('SELECT * FROM users');
                        $nbr_user = $nbr_user_req->rowCount();

                       ?>
                      <p class="card-title mb-0"><?= $nbr_user ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-4 my-auto">
                      <div class="icon-big text-center icon-warning">
                        <i class="fa fa-shipping-fast"></i>
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="numbers">
                        <p class="card-category"><?= $admin[$language]['0']['2'] ?></p>
                        <?php
                          $nbr_user_req = $bdd->query('SELECT * FROM users WHERE reservation NOT LIKE "" ');
                          $nbr_user = $nbr_user_req->rowCount();

                         ?>
                        <p class="card-title mb-0"><?= $nbr_user ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-4 my-auto">
                        <div class="icon-big text-center icon-warning">
                          <i class="fas fa-newspaper"></i>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="numbers">
                          <p class="card-category"><?= $admin[$language]['0']['3'] ?></p>
                          <?php
                            $nbr_article_req = $bdd->query('SELECT * FROM articles');
                            $nbr_article = $nbr_article_req->rowCount();

                           ?>
                          <p class="card-title mb-0"><?= $nbr_article ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 h-100">
                <div class="card card-stats">
                  <div class="card-body ">
                    <p class="card-category text-center mb-1"><?= $admin[$language]['0']['4'] ?> :</p>
                    <a href="dashboard?id=<?= $_SESSION['id']."&language=".$_GET['language'] ?>" class="btn btn-shift my-auto"><?= $admin[$language]['0']['5'] ?></a>
                  </div>
                </div>
              </div>
      </div>
    </div>

    <div class="container-fluid w-95">
      <div class="row justify-content-center panel-admin">
        <div class="col-md-6 col-lg-4 p-3">
          <div class="col-12 bg-white p-3 h-100">
            <h3 class="text-center pt-3"><?= $admin[$language]['1']['0'] ?></h3>
            <p class="text-center"><i><?= $admin[$language]['1']['1'] ?></i></p>

            <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th class="text-center">Pseudo</th>
                          <th class="text-center">Rôle</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($m = $membres->fetch()) { ?>
                        <tr>
                          <td><?= $m['id'] ?></td>
                          <td class="text-center"><?= $m['pseudo'] ?></td>
                          <td class="text-center">
                            <?php
                              if ($m['administrateur'] == "1") {
                                echo "<span class='badge badge-danger'>".$admin[$language]['1']['3']."</span>";
                              }
                              else {
                                echo "<span class='badge badge-success'>".$admin[$language]['1']['2']."</span>";
                              }
                             ?>
                          </td>
                          <td class="text-center">
                            <a href="admin?supprimer=<?= $m['id'] ?>" class="text-white font-weight-bold badge badge-danger"><?= $admin[$language]['1']['4'] ?></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 p-3">
          <div class="col-12 bg-white p-3 h-100">
            <!-- Système d'articles -->

            <?php
              if($mode_edition == 1){
                $titre = $admin[$language]['2']['1'];
              }
              else {
                $titre = $admin[$language]['2']['0'];
              }
            ?>

            <h3 class="text-center pt-3"><?= $titre ?></h3>
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

            <form action="" method="post" enctype="multipart/form-data">
              <br>
              <input type="text" name="article_titre" class="form-control form-admin" placeholder="<?= $admin[$language]['2']['4'] ?>" <?php if($mode_edition == 1){ ?> value="<?= $edit_article['titre'] ?>"<?php } ?>>
              <?php if ($mode_edition == 0) :?>
                <input type="file" name="miniature" class="form-control-file"><br>
              <?php endif; ?>

              <textarea rows="8" cols="80" name="article_contenu" class="form-control form-admin" placeholder="<?= $admin[$language]['2']['5'] ?>"><?php if($mode_edition == 1){ ?><?= $edit_article['contenu'] ?><?php } ?></textarea>
              <br>
              <input type="submit" class="btn btn-danger d-block ml-auto mb-3" value="<?= $admin[$language]['2']['6'] ?>">
            </form>

          </div>
        </div>

        <div class="col-md-6 col-lg-4 mt-md-3 mt-lg-0 p-3">
          <div class="col-12 bg-white h-100 p-3">
            <h3 class="text-center pt-3"><?= $admin[$language]['3']['0'] ?></h3>
            <?php
              $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
              while ($a = $articles->fetch()) { ?>
                <li><a href="article?article_id=<?= $a['id']?>" class="text-dark"><?= $a['titre'] ?></a> |
                  <a href="?edit=<?= $a['id']."&language=".$language ?>" class="text-dark font-weight-bold"><?= $admin[$language]['3']['1'] ?> </a> |
                  <a href="delete_article.php?id=<?= $a['id']."&language=".$language ?>" class="text-dark font-weight-bold"><?= $admin[$language]['3']['2'] ?></a>
                </li>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
