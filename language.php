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
       "https://www.youtube.com/embed/Yv4IuYDr69E"
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
        "Cookies help us provide our services. By using our services, you accept our use of cookies. <a href='./mentions-légales' target='_ blank' style ='display: block; text-decoration: underline;'> More details </a>",
        "https://www.youtube.com/embed/oEz_2sqCiWM"
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
      array("Ajouter au panier","Votre panier","Merci de choisir un article...","Valider le panier", "Supprimer", "Prix"),
      array("Editer mon profil","Editer mes données bancaires","Déconnexion","Panel d'administration")
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
      array("Add to Cart","Shopping Basket","Please choose an article ...","Validate your shopping basket","Delete","Price"),
      array("Edit my profile", "Edit my bank details", "Logout", "Administration panel")
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
      "Rappel de votre commande :"
    ),
    "en" => array(
      "Thank you for your purchase",
      "see you soon at Shift!",
      "Your purchase has been confirmed, the details of your order can be downloaded!",
      "Reminder of your order:"
    )
  );

  $admin = array(
    "fr" => array(
      array("Panel d'administration","Personnes enregistrées","Billets achetés","Articles publiés","Liens","Retour au tableau de bord"),
      array("Espace Membres :","Affiche les 5 dernières personnes inscrites","Membre","Administrateur","Supprimer"),
      array("Publication d'articles :","Modification d'articles :","Votre message a bien été posté !","Please complete all fields", "Titre","Contenu de l'article (Html Compatible)","Envoyer l'article"),
      array("Liste des articles :","Modifier","Supprimer"),
    ),
    "en" => array(
      array ("Administration panel", "Registered persons", "Tickets purchased", "Published articles","Links","Back to the dashboard"),
      array ("Members Area:", "Displays the last 5 people registered", "Member", "Administrator", "Delete"),
      array ("Publication of articles:","Editing articles:","Your message has been posted!", "Title", "Content of the article (Html ​​Compatible)", "Send the article"),
      array ("List of articles:", "Modify", "Delete"),
    )
  );

 ?>
