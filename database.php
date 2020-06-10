<?php
session_start();
try{

   $bdd = new PDO("mysql:host=localhost; dbname=louisbho_shift", "louisbho_shift", "motdepassebdd");

  // Travail en local
   //$bdd = new PDO("mysql:host=127.0.0.1; dbname=louisbho_shift", "root", "");
}catch(PDOException $e){
   die('Erreur : '.$e->getMessage());
}
 ?>
