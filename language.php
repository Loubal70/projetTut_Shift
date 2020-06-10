<?php
$fr_select="";
$en_select="";
$language="";

if (!isset($_GET['language']) AND empty($_GET['language'])) {
  $_GET['language']="fr";
}
if ((isset($_GET['language']) AND $_GET['language'] == 'en') OR !isset($_GET['language'])) {
  $en_select="selected";
  $fr_select="";
  $language="en";
}
else {
  $fr_select="selected";
  $en_select="";
  $language="fr";
}

  $menu = array(
    "fr" => array(
      "Accueil",
      "Blog",
      "Infos Pratiques",
      "Presse",
      "Nous contacter"
    ),
    "en" => array(
      "Home",
      "Blog",
      "Informations",
      "Press",
      "Contact us"
    )
  );

  $index = array(
    'fr' => array(
      "Rejoindre l'expérience",
      "Préparez votre visite",
      "Obtenez plus d'informations sur SHIFT",
      "Dates et Horaires",
      "Tarifs",
      "Nous vous donnons rendez-vous le samedi et dimanche 21 et 22 novembre 2020 aux Portes de Versaille à Paris de 12h à 22h le samedi et 12h à 21h le dimanche pour une expérience hors du commun.
       <br><br>Retrouver des évènements avec vos influenceurs préférés, des séances de dédicasse pour tous. L'ensembles des invités auront accès à des
       jeux en avant première, toutes informations est à bien noter pour avoir la chance de pouvoir y profiter !",

       array("Tarif compris pour les deux jours","Compris dans les pass","Pass standard","35 €","Accès au salon + restauration","Pass VIP","60 €","Pass standard + accès prioritaire","Pass Malin","99 €","Pass VIP + réduction sur les stands"),

       array("Nous contacter","Restez en lien","Faites nous savoir ce que vous en pensez !","Nom","Prénom","Mail","Numéro de téléphone","Message","Envoyer"),

       "Les cookies nous aident à fournir nos services. En utilisant nos services, vous acceptez notre utilisation des cookies. <a href='./mentions-légales' target='_blank' style='display:block; text-decoration: underline;'>Plus de détails</a>",
       "https://www.youtube.com/embed/Yv4IuYDr69E",
       "Actualités"
    ),
      'en' => array(
        "Join the experience",
        "Organize your day",
        "Learn more about SHIFT",
        "Dates and Times",
        "Prices",
        "We invite you to meet on Saturday and Sunday, November 21 and 22, 2020 at the Portes de Versaille in Paris from 12 p.m. to 10 p.m. on Saturday and from 12 p.m. to 9 p.m. on Sunday for an extraordinary experience.
          <br><br>Find events with your favorite influencers, dedication sessions for all. All the guests will have access to games in preview, all information should be noted for the chance to be able to enjoy it!",

        array("Price included for the two days", "Included in the passes", "Standard pass", "35 €", "Lounge access + catering", "VIP pass", "60 €", "Standard pass + priority access "," Smart Pass "," 99 € "," VIP Pass + reduction on stands "),

        array("Contact us", "Stay in touch", "Let us know what you think!", "Last name", "First name", "Mail", "Phone number", "Message", "Send"),
        "Cookies help us to provide our services. By using our services, you accept our use of cookies. <a href='./mentions-légales' target='_ blank' style ='display: block; text-decoration: underline;'> More details </a>",
        "https://www.youtube.com/embed/oEz_2sqCiWM",
        "News"
  )
);

  $connexion = array(
    'fr' => array(
      "Inscription à SHIFT",
      array('Votre pseudo','Votre Mail','Confirmer votre adresse mail','Votre mot de passe','Confirmer votre mot de passe',"Je m'inscris","Se connecter","Mot de passe oublié ?"),
      array(
        'Pas encore de compte ?',
        "Pas de problème ! Il est temps de remédier à ça !<br>La réservation de billets nécéssite la création d'un compte !"
      ),
      array(
        "Vous avez déjà un compte ?",
        "Pour vous connecter, merci de renseigner vos informations personnelles
        <br>après avoir cliqué sur le bouton ci-dessous"
      )
    ),
    'en' => array(
      "Registration to SHIFT",
      array('Your username', 'Your Mail', 'Confirm your email address', 'Your password', 'Confirm your password', 'Subscribe',"Connect","Forgot your password ?"),
      array(
        'No account yet ?',
        "No problem ! It's time to remedy this! <br> Booking tickets requires creating an account!"
      ),
      array(
        "Already have an account ?",
        "To connect, please enter your personal information
        <br>after clicking on the button below"
      )
    )
  );

  $dashboard = array(
    'fr' => array(
      array(
        "Portefeuille","Billetterie","Paiement","Confirmations","Tout droits réservés","Bon retour ", "Te voici dans la sélection des billets !"
      ),
      array(
        array(
          "Pass standard :","Accès au salon<br>+<br>Restauration sur place","Prix : 35 €"
        ),
        array(
          "Pass VIP :", "Pass standard<br>+<br>Accès prioritaire","Prix : 60 €"
        ),
        array(
          "Pass MALIN :", "Pass VIP<br>+<br>Réduction sur les stands","Prix : 99 €"
        )
      ),
      array("Ajouter au panier","Votre panier","Merci de choisir un article...","Valider le panier", "Supprimer", "Prix","Valider la commande"),
      array("Editer mon profil","Editer mes données bancaires","Déconnexion","Panel d'administration"),
      "Merci de valider votre mail afin de pouvoir accéder à votre espace client"
    ),
    'en' => array(
      array(
        "Wallet", "Ticketing", "Payment", "Confirmations","All rights reserved","Welcome back ", "Here you are in the ticket selection !"
      ),
      array(
        array(
          "Standard pass:", "Lounge access <br> + <br> Catering on site", "Price: 35 €"
        ),
        array(
          "VIP Pass:", "Standard Pass <br> + <br> Priority Access", "Price: 60 €"
        ),
        array(
          "MALIN Pass:", "VIP Pass <br> + <br> Discount on stands", "Price: 99 €"
        )
      ),
      array("Add to Cart","Shopping Basket","Please choose an article ...","Validate your shopping basket","Delete","Price","Validate the order"),
      array("Edit my profile", "Edit my bank details", "Logout", "Administration panel"),
      "Please validate your email in order to be able to access your customer area"
    )
  );

  $paiement = array(
    'fr' => array(
      array('Paiement du ticket','Votre panier est vide, vous ne pouvez que changer votre carte bancaire'),
      array('Vos données bancaires ont déjà été sauvegardé, vous pouvez les modifier à tout moment ou les supprimer.','Supprimer mes données bancaires'),
      array('Numéro de carte','Nom du porteur de carte','Valider la carte bleue'),
    ),
    'en' => array(
      array ('Payment of the ticket', 'Your basket is empty, you can only change your bank card'),
      array ('Your bank details have already been saved, you can change them at any time or delete them.', 'Delete my bank details'),
      array ('Card number', 'Name of card holder','Validate the credit card')
    )
  );

  $edit_profil = array(
    'fr' => array(
      "Édition de mon profil",
      "Remplacer la photo",
      "Maximum 2 Mo",
      "Mot de passe",
      "Confirmation de mot de passe",
      "Mettre à jour mon profil",
      "Retour au tableau de bord"
    ),
    'en' => array(
      "Editing my profile",
      "Replace photo",
      "Maximum 2 MB",
      "Password",
      "Password confirmation",
      "Update my profile",
      "Back to the dashboard"
    )
  );

  $confirmation = array(
    "fr" => array(
      "Merci de votre achat",
      "à très vite chez Shift !",
      "Votre achat a été confirmé, le détail de votre commande est téléchargable !",
      "Rappel de votre commande :",
      "Créer le pdf"
    ),
    "en" => array(
      "Thank you for your purchase",
      "see you soon at Shift!",
      "Your purchase has been confirmed, the details of your order can be downloaded!",
      "Reminder of your order:",
      "Create pdf"
    )
  );

  $infopratique = array(
    "fr" => array(
      "emplacement",
      "restauration",
      array(
        array("McDonald's","A <b>1</b> minute du salon","Moyenne de prix : <b>10 €</b>","4 Place de la Porte de Versailles, 75015 Paris"),
        array("Bar PAUL","A <b>1</b> minute du salon","Moyenne de prix : <b/>3-9 €</b>","Paris Expo Porte D"),
        array("Gourmet","A <b>2</b> minutes du salon","Moyenne de prix : <b>18 €</b>","Place de la Porte de Versailles, 75015 Paris"),
        array("Verre galant","A <b>3</b> minutes du salon","Moyenne de prix : <b>20 €</b>","256 Rue de la Croix Nivert, 75015 Paris"),
        array("SUSHIKEN","A <b>3</b> minutes du salon","Moyenne de prix : <b>16-30 €</b>","12 rue Ernest Renan")
      ),
      array("Transports","Plusieurs modes de transports s'offrent à vous !","<b>Train :</b> ligne N","<b>Metro :</b> ligne 12","<b>Tramway :</b> lignes T2 et T3A","<b>Bus :</b> lignes 126, 62 et 80"),
      "Disponible lors des événements SHIFT !",
      "Et bien d'autres",
      "Merci à tous nos partenaires !",
      "assets/img/programme [FR].PNG"
    ),
    "en" => array(
      "location",
      "restoration",
      array (
        array ("McDonald's", "<b>1</b> minute from the lounge", "Average price: <b>10 €</b>", "4 Place de la Porte de Versailles, 75015 Paris"),
        array ("Bar PAUL", "<b>1</b> minute from the show", "Average price: <b/>3-9 €</b>", "Paris Expo Porte D"),
        array ("Gourmet", "<b>2</b> minutes from the lounge", "Average price: <b>18 €</b>", "Place de la Porte de Versailles, 75015 Paris"),
        array ("Gallant glass", "<b>3</b> minutes from the lounge", "Average price: <b>20 €</b>", "256 Rue de la Croix Nivert, 75015 Paris"),
        array ("SUSHIKEN", "<b>3</b> minutes from the lounge", "Average price: <b>16-30 €</b>", "12 rue Ernest Renan")
      ),
      array ("Transport", "Several modes of transport available to you!", "<b> Train: </b> line N", "<b> Metro: </b> line 12", "<b > Tramway: </b> lines T2 and T3A "," <b> Bus: </b> lines 126, 62 and 80 "),
      "Available at SHIFT events!",
      "And many others",
      "Thanks to all of our partners !",
      "assets/img/programme [EN].PNG"
    )
  );

  $presse = array(
    "fr" => array(
      "Presse",
      "Informations utiles",
      "Nous mettons à disposition pour tous, le communiqué ainsi que le dossier de presse portant pour thème l'événement SHIFT !
      <br>Vous retrouvrez ci-dessous également des informations sur l'agence en charge de l'organisation et de la promotion de l'événement.",
      "Votre appareil ne supporte pas la visualisation de pdf, vous pouvez télécharger la prise de note en cliquant ici",
      "Dossier de presse :",
      "Télécharger le dossier de presse",
      "A propos de MediaBind :",
      "Télécharger le rapport d'agence",
      "assets/pdf/communique_presse [FR].pdf",
      "Télécharger notre flyer !"
    ),
    "en" => array(
      "Press",
      "Useful information",
      "We are making available to everyone the press release and the press kit on the theme of the SHIFT event!
      <br> You will also find below information about the agency in charge of organizing and promoting the event. ",
      "Your device does not support viewing of pdf, you can download the note taking by clicking here",
      "Press kit :",
      "Download the press kit",
      "About MediaBind :",
      "Download the agency report",
      "assets/pdf/communique_presse [EN].pdf",
      "Download our flyer!"
    )
  );

  $admin = array(
    "fr" => array(
      array("Panel d'administration","Personnes enregistrées","Billets achetés","Articles publiés","Liens","Retour au tableau de bord"),
      array("Espace Membres :","Affiche les 10 dernières personnes inscrites","Membre","Administrateur","Supprimer"),
      array("Publication d'articles :","Modification d'articles :","Votre message a bien été posté !","Remplissez tous les champs, s'il vous plaît", "Titre","Contenu de l'article (Html Compatible)","Envoyer l'article","Votre message a bien été mis à jour !"),
      array("Liste des articles :","Modifier","Supprimer"),
    ),
    "en" => array(
      array ("Administration panel", "Registered persons", "Tickets purchased", "Published articles","Links","Back to the dashboard"),
      array ("Members Area:", "Displays the last 10 people registered", "Member", "Administrator", "Delete"),
      array ("Publication of articles:","Editing articles:","Your message has been posted!","Fill in all the fields, please", "Title", "Content of the article (Html ​​Compatible)", "Send the article","Your message has been updated!"),
      array ("List of articles:", "Modify", "Delete"),
    )
  );

 ?>
