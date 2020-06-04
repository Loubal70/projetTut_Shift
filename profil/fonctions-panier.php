<?php

// Se retrouver sur ce fichier :
//  array_search — Recherche dans un tableau la clé associée à la première valeur
//  array_push — Empile un ou plusieurs éléments à la fin d'un tableau

// Système de suppression avec un panier « tampon » qui va être notre panier sans les éléments à supprimer.



// function creationPanier(){
//    if (!isset($_SESSION['panier'])){
//       $_SESSION['panier']=array();
//       $_SESSION['panier']['libelleProduit'] = array();
//       $_SESSION['panier']['qteProduit'] = array();
//       $_SESSION['panier']['prixProduit'] = array();
//       $_SESSION['panier']['verrou'] = false; // Lorsque je veux payer, je vérouille panier pour qu'on ne puisse plus ajouter
//    }
//    return true;
// }
//
// function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){
//
//    // Si le panier existe
//    if (creationPanier() && !isVerrouille())
//    {
//       // Si le produit existe déjà on ajoute seulement la quantité
//       $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
//
//       if ($positionProduit !== false)
//       {
//          $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
//       }
//       else
//       {
//          // Sinon on ajoute le produit
//          array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
//          array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
//          array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
//       }
//    }
//    else
//    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
// }
//
// function supprimerArticle($libelleProduit){
//    //Si le panier existe
//    if (creationPanier() && !isVerrouille())
//    {
//       // Panier temporaire
//       $tmp=array();
//       $tmp['libelleProduit'] = array();
//       $tmp['qteProduit'] = array();
//       $tmp['prixProduit'] = array();
//       $tmp['verrou'] = $_SESSION['panier']['verrou'];
//
//       for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
//       {
//          if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
//          {
//             array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
//             array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
//             array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
//          }
//
//       }
//
//       $_SESSION['panier'] =  $tmp;
//       // On efface notre panier temporaire
//       unset($tmp);
//    }
//    else
//    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
// }
//
// function modifierQTeArticle($libelleProduit,$qteProduit){
//    //Si le panier existe
//    if (creationPanier() && !isVerrouille())
//    {
//       //Si la quantité est positive on modifie sinon on supprime l'article
//       if ($qteProduit > 0)
//       {
//          //Recherche du produit dans le panier
//          $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
//
//          if ($positionProduit !== false)
//          {
//             $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
//          }
//       }
//       else
//       supprimerArticle($libelleProduit);
//    }
//    else
//    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
// }
//
// function MontantGlobal(){
//    $total=0;
//    for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
//    {
//       $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
//    }
//    return $total;
// }
//
// function isVerrouille(){
//    if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
//    return true;
//    else
//    return false;
// }



 ?>
 <?php


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
   // unset($_SESSION['panier']);
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
