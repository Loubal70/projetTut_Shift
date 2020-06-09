<?php
session_start();
$_SESSION = array();
session_destroy();

include_once('../language.php');
header('Location: ../connexion?language='.$_GET['language']);

 ?>
