# SHIFT - Par MediaBind (ProjetTut MMI1 2020)


## Table des matières

- [À propos](#à-propos)
- [Voir le site internet](#le-site)
- [Installation](#installation)
  - [Dépendance requise](#dépendance-requise)
  - [Installation classique](#installation-classique)
- [Crédits](#crédits)
- [Aide](#aide)

## À propos

Ce projet a été réalisé dans le cadre de la fin d'année des MMI à Lens ! Le but fut de créer sa propre agence ayant pour tache de faire la promotion d'un événement créé par nos soins.

## Le site
Le projet comportait la création d'un site internet pour son événement. Le strict minimum était le visuel du site (Html/Css), cependant nous avons fait le choix de créer un site à minima fonctionnel avec création de compte client, modification de profil, achat simplifié de billets, génération de billets, gestion administratif : création et gestions d'articles automatique / gestion des derniers utilisateurs, traduction du site et documents en anglais... Le tout étant responsive pour tout types d'appareils !

**Lien :** `https://shift.louisb-host.fr/`

## Installation

### Dépendance requise
- Wamp / Mamp ou un équivalent pour **php & SQL (MariaDB / phpmyadmin)** !

### Installation classique

Pour l'installation du site, glissez l'entièreté du site dans wamp et importer la **base de donnée** dans phpmyadmin de *préférence* !
Pour le bon fonctionnement du site, nous avons intégré automatiquement la librairie **mpdf** en charge de générer les billets.

⚠️ Attention la création de compte nécéssite une **confirmation par mail** donc un serveur **SMTP** (gestion de mails) ⚠️

2 options s'offrent à vous : 
  - Valider le compte manuellement dans la BDD table users --> 'confirme' = 1
  - Installation une extension à Wamp / Mamp... : [sendmail](https://www.glob.com.au/sendmail/), des documentations sont disponible sur internet pour l'installation.

## Crédits

- Développeur : Louis Boulanger MMI1B2

## Aide

Par soucis de temps, il est possible qu'il y est des petits bugs mais tout doit normalement fonctionner sans problème !
Je reste disponible sur Loubal#2385 pour toutes questions !
