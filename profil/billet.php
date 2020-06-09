<?php
include_once('../database.php');
$requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();

  if ($userinfo['reservation'] == "pass_standard") {
    $userinfo['reservation'] = "PASS STANDARD";
  }
  elseif ($userinfo['reservation'] == "pass_vip") {
    $userinfo['reservation'] = "PASS VIP";
  }
  elseif ($userinfo['reservation'] == "pass_malin") {
    $userinfo['reservation'] = "PASS MALIN";
  }

use Mpdf\Mpdf;

require('../assets/php/vendor/autoload.php');
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
$mpdf->WriteHTML("
<h1>SHIFT - Billetterie / ticket office</h1>
<br>
<p>L'équipe de Shift vous remercie de l'achat de votre billet pour la première édition du salon !
Ce billet est valable pour les 2 jours (21 et 22 novembre 2020), merci de le garder tout le temps sur vous et de vous munir de votre pièce d'identité
afin de pouvoir profiter du salon sans problèmes !
<br>
<br> # --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<br><br>

The Shift team thanks you for purchasing your ticket for the first edition of the show!
This ticket is valid for 2 days (November 21 and 22, 2020), please keep it with you at all times and bring your identity document
so you can enjoy the show without problems!
</p>

");
$user_name = '<h3 style="position: absolute; bottom:14em;left:3.8em; z-index: 1;">'.$userinfo['reservation'].'</h3>';
$user_name .= '<h2 style="position: absolute; bottom:11em;left:6em; z-index: 1; color: rgb(202,0,51);">'.$userinfo['pseudo'].'</h2>';
$user_name .= '<h4 style="position: absolute; bottom:0em;left:1.8em; z-index: 1;">21 & 22 Novembre (November) 2020</h4>';
$mpdf->WriteHTML($user_name);
// the last "false" allows a full page picture
$mpdf->Image('../assets/img/Billet_Blanc.png', 0, 90, 0, 120, 'png', '', true, false);
$mpdf->AddPage();
$mpdf->WriteHTML("
<h1>Nos sponsors / participants</h1>
<p>
  Nous avons le plaisir d'accueillir les plus grands du jeux vidéos pour cette première édition :
  <br>
  <br> # ------------------------------------------------------------------------------<br>
  <br>
  We are pleased to welcome the biggest companies in video games for this first edition:
  <br>PlayStation, XBOX, Corsair, Logitech G, Coca Cola, SFR, Leader Price, Veolia, EDF, GIGN, Oculus, Square Enix, Bethesda Softworks
</p>

");
$mpdf->Image('../assets/img/Billet_Blanc (dos).png', 0, 90, 0, 120, 'png', '', true, false);

$mpdf->Output();
