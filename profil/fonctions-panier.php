<?php

// Se retrouver sur ce fichier :
// Il y a beaucoup de d'informations pour s'y retrouver !
//  array_search — Recherche dans un tableau la clé associée à la première valeur
//  array_push — Empile un ou plusieurs éléments à la fin d'un tableau

 $_SESSION['panier'] = array();
/* Subdivision du panier */
$_SESSION['panier']['id_article'] = array();
$_SESSION['panier']['qte'] = array();
$_SESSION['panier']['prix'] = array();


 /* Article exemple */
 function pass_standard(){
   $select = array();
   $select['id'] = "pass_standard";
   $select['qte'] = 1;
   $select['prix'] = 35;
   ajout($select);
 }
 function pass_vip(){
   $select = array();
   $select['id'] = "pass_vip";
   $select['qte'] = 1;
   $select['prix'] = 60;
   ajout($select);
 }
 function pass_malin(){
   $select = array();
   $select['id'] = "pass_malin";
   $select['qte'] = 1;
   $select['prix'] = 99;
   ajout($select);
 }

 function ajout($select)
 {
   array_push($_SESSION['panier']['id_article'],$select['id']);
   array_push($_SESSION['panier']['qte'],$select['qte']);
   array_push($_SESSION['panier']['prix'],$select['prix']);
 }

 function supprim_article($ref_article)
 {
     $suppression = false;
     /* création d'un tableau temporaire de stockage des articles */
     $panier_tmp = array("id_article"=>array(),"qte"=>array(),"taille"=>array(),"prix"=>array());
     /* Comptage des articles du panier */
     $nb_articles = count($_SESSION['panier']['id_article']);
     /* Transfert du panier dans le panier temporaire */
     for($i = 0; $i < $nb_articles; $i++)
     {
         /* On transfère tout sauf l'article à supprimer */
         if($_SESSION['panier']['id_article'][$i] != $ref_article)
         {
             array_push($panier_tmp['id_article'],$_SESSION['panier']['id_article'][$i]);
             array_push($panier_tmp['qte'],$_SESSION['panier']['qte'][$i]);
             array_push($panier_tmp['taille'],$_SESSION['panier']['taille'][$i]);
             array_push($panier_tmp['prix'],$_SESSION['panier']['prix'][$i]);
         }
     }
     /* Le transfert est terminé, on ré-initialise le panier */
     $_SESSION['panier'] = $panier_tmp;
     /* Option : on peut maintenant supprimer notre panier temporaire: */
     unset($panier_tmp);
     $suppression = true;
     return $suppression;
 }

 if (!empty($_POST['pass_standard'])) {
   pass_standard();
 }

 if (!empty($_POST['pass_vip'])) {
   pass_vip();
 }

 if (!empty($_POST['pass_malin'])) {
   pass_malin();
 }

 if (!empty($_POST['"supp_".$_SESSION["panier"][\'id_article\'][0]'])) {
    supprim_article($_SESSION["panier"]['id_article'][0]);
 }

 ?>
