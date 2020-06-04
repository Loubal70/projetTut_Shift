<?php
include_once('../database.php');
if (isset($_SESSION['id'])) {
  $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
  $requser->execute(array($_SESSION['id']));
  $userinfo = $requser->fetch();
}
else {
  header('Location: ../index');
}

if (isset($_GET['id']) AND !empty($_GET['id']) AND $userinfo['administrateur'] == 1) {
  $suppr_id = htmlspecialchars($_GET['id']);
  $suppr = $bdd->prepare('DELETE FROM articles WHERE id = ?');
  $suppr->execute(array($suppr_id));

  header('Location: admin');
}

 ?>
