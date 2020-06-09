<?php
  if (isset($_POST['mailform'])) {

  $header = "MIME-Version: 1.0\r\n";
  $header.= 'From:"SHIFT - Projet Étudiant"<contact@shift.louisb-host.fr>'."\n";
  $header.= 'Content-Type:text/html; charset="utf-8"'."\n";
  $header.= 'Content-Transfer-Encoding: 8bit';


  // Pour mettre des images, mettre une source hébergé sur un site
  $message = '
    <html>
      <body>
        <div align="center">
          Test envoi de mail avec php<br>
        </div>
      </body>
    </html>
  ';

  mail("louis.boulanger.work@gmail.com", "Test PHP", $message, $header);
  }
?>
<form action="" method="post">
  <input type="submit" name="mailform" value="Recevoir un mail">
</form>
