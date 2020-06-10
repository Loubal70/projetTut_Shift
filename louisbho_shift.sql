-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 10 juin 2020 à 16:13
-- Version du serveur :  5.7.30
-- Version de PHP : 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `louisbho_shift`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `miniature` varchar(255) DEFAULT NULL,
  `date_time_publication` datetime NOT NULL,
  `date_time_edition` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `miniature`, `date_time_publication`, `date_time_edition`) VALUES
(70, 'BILLETTERIE OUVERTE', '&lt;h1&gt;SHIFT - LA BILLETTERIE EST OUVERTE&lt;/h1&gt;&lt;br&gt;&lt;br&gt;\r\n\r\nLa premiÃ¨re Ã©dition de Shift se tiendra le 21 et 22 novembre 2020, investissant pour la premiÃ¨re fois les 1 500 mÂ² du salon de Paris Expo - Porte de Versailles.&lt;br&gt;&lt;br&gt;\r\n\r\nShift est LE rendez-vous incontournable de tous les passionnÃ©es de la culture vidÃ©o ludique de 2020, la grande fÃªte du jeu vidÃ©o. Cette annÃ©e, les acteurs majeurs de ce secteur, Ã©diteurs, constructeurs, accessoiristes, associations et mÃ©dias se regroupent pour cÃ©lÃ©brer un week-end haut en couleurs.&lt;br&gt;&lt;br&gt;\r\n\r\nPour cette premiÃ¨re Ã©dition, nous travaillons d\'arrache pieds pour vous proposer une expÃ©rience de visite toujours plus qualitative, des contenus et animations toujours plus fun, ainsi que l\'opportunitÃ© d\'assister Ã  des compÃ©titions Esports haletantes ou de rencontrer vos crÃ©ateurs de contenues prÃ©fÃ©rÃ©s pour une sÃ©ance de dÃ©dicaces.&lt;br&gt;&lt;br&gt;\r\nQue ce soit pour jouer, apprendre, dÃ©couvrir, faire des rencontres ou tout simplement passer un bon moment avec vos proches, Shift vous attend avec impatience. Il est encore trop tÃ´t pour tout vous dÃ©voiler, mais nous pouvons d\'ores et dÃ©jÃ  vous confirmer que le salon regorgera d\'activitÃ©s !&lt;br&gt;&lt;br&gt;\r\nQue vous soyez un gamer aguerri, un parent de graine de champion, ou un curieux en quÃªte d\'aventure, vous Ãªtes les bienvenus. Alors Ã  vos manettes, claviers et sourirs ! &lt;b&gt;Vous pouvez rÃ©server vos billets dÃ¨s aujourd\'hui.&lt;/b&gt;&lt;br&gt;&lt;br&gt;\r\n\r\nPour en profiter, c\'est par ici &lt;a href=&quot;https://shift.louisb-host.fr/connexion&quot; class=&quot;&quot; target=&quot;_blank&quot;&gt;Shift Billetterie&lt;/a&gt;&lt;br&gt;\r\nPour plus d\'informations, ou tout simplement pour nous saluer,  n\'oubliez pas de suivre Shift sur &lt;a href=&quot;https://www.facebook.com/ShiftGameEvent&quot; class=&quot;&quot; target=&quot;_blank&quot;&gt;Facebook&lt;/a&gt;, &lt;a href=&quot;https://twitter.com/Shift_GameEvent&quot; class=&quot;&quot; target=&quot;_blank&quot;&gt;Twitter&lt;/a&gt;, &lt;a href=&quot;https://www.instagram.com/shift_gameevent/?hl=fr&quot; class=&quot;&quot; target=&quot;_blank&quot;&gt;Instagram&lt;/a&gt;, et &lt;a href=&quot;https://www.youtube.com/channel/UCKYJl6D2hpmvgk8J_wJRnGw&quot; class=&quot;&quot; target=&quot;_blank&quot;&gt;YouTube&lt;/a&gt;,  nous vous rÃ©pondrons avec plaisir ! &lt;br&gt;\r\nÃ€ trÃ¨s vite dans les allÃ©es du salon,&lt;br&gt;&lt;br&gt;\r\nL\'Ã©quipe Shift.', 'Id_Article_70.png', '2020-06-09 16:08:27', '2020-06-10 14:32:01'),
(71, 'Utilisations des cookies', 'Information concernant l\'utilisation des cookies\r\nEn consultant le site web Ã©ditÃ© par Comexposium (le Â« Site Â»), il est possible que des cookies soient dÃ©posÃ©s sur votre terminal sous rÃ©serve, bien sÃ»r, des choix que vous auriez exprimÃ©s et que vous pouvez modifier Ã  tout moment.\r\n\r\n\r\n\r\nI. QUâ€™EST-CE QUâ€™UN COOKIE ?\r\nLes cookies sont de petits fichiers texte, image ou logiciel, qui sont placÃ©s et stockÃ©s sur votre ordinateur, votre smartphone ou tout autre appareil permettant de naviguer sur Internet, lorsque vous visitez un site Web (les Â«Cookies Â»).\r\n\r\nDe maniÃ¨re gÃ©nÃ©rale, les cookies permettent Ã  un site Internet de vous reconnaÃ®tre, de signaler votre passage sur telle ou telle page et de vous apporter ainsi un service additionnel : amÃ©lioration de votre confort de navigation, sÃ©curisation de votre connexion ou adaptation du contenu dâ€™une page Ã  vos centres dâ€™intÃ©rÃªt.\r\n\r\nLes informations stockÃ©es par les cookies, pendant une durÃ©e de validitÃ© limitÃ©e, peuvent notamment porter sur les pages visitÃ©es, le type de navigateur que vous utilisez, votre adresse IP, les informations que vous avez saisies sur un site afin de vous Ã©viter de les saisir Ã  nouveau.\r\n\r\nEn gÃ©nÃ©ral, seul lâ€™Ã©metteur d\'un cookie est susceptible de lire ou de modifier les informations contenues dans ce cookie.\r\n\r\n\r\n\r\nII. Ã€ QUOI SERVENT LES COOKIES ?\r\nLes types de Cookies dÃ©posÃ©s sur notre Site sont dÃ©crits ci-dessous.\r\n\r\n1. Les Cookies Techniques\r\nCes Cookies ont pour finalitÃ© exclusive de permettre et de faciliter la navigation dans notre Site, ainsi que lâ€™accÃ¨s aux diffÃ©rents produits et services (les Â« Cookies Techniques Â»). Les Cookies Techniques permettent en particulier de vous reconnaÃ®tre, de signaler votre passage sur telle ou telle page et ainsi dâ€™amÃ©liorer votre confort de navigation : adapter la prÃ©sentation du Site aux prÃ©fÃ©rences d\'affichage de votre terminal (langue utilisÃ©e, rÃ©solution d\'affichage), mÃ©moriser les mots de passe et autres informations relatives Ã  un formulaire que vous avez rempli sur le Site (inscription ou accÃ¨s Ã  lâ€™espace exposants). Les Cookies Techniques permettent Ã©galement de mettre en Å“uvre des mesures de sÃ©curitÃ© (câ€™est le cas par exemple lorsquâ€™il vous est demandÃ© de vous connecter Ã  nouveau Ã  lâ€™espace exposant aprÃ¨s un certain laps de temps).\r\n\r\nCes Cookies Techniques sont techniquement indispensables Ã  la navigation sur notre Site et ne peuvent donc pas Ãªtre dÃ©sactivÃ©s ou paramÃ©trÃ©s sous peine de ne plus pouvoir accÃ©der au Site et/ou aux services du Site. En effet leur suppression peut entrainer des difficultÃ©s de navigation sur notre Site ainsi que lâ€™impossibilitÃ© de valider votre commande.\r\n\r\n2. Les Cookies de Mesure dâ€™Audience\r\nLes Cookies de mesure dâ€™audienceont pour finalitÃ© de mesurer lâ€™audience des diffÃ©rents contenus et rubriques de notre Site, afin de les Ã©valuer et de mieux les organiser (les Â« Cookies de Mesure dâ€™Audience Â»). Ces Cookies permettent Ã©galement, le cas Ã©chÃ©ant, de dÃ©tecter des problÃ¨mes de navigation et par consÃ©quent dâ€™amÃ©liorer lâ€™ergonomie de nos services sur le Site. Ces Cookies ne produisent que des statistiques anonymes et des volumes de frÃ©quentation, Ã  lâ€™exclusion de toute information individuelle.\r\n\r\n3. Les Cookies Commerciaux\r\nCes cookies commerciaux collectent des informations sur votre navigation sur le Site dans le but de vous proposer des contenus publicitaires adaptÃ©s (les Â« Cookies Commerciaux Â»). Ces Cookies Commerciaux permettent donc :\r\n\r\nde comptabiliser le nombre d\'affichages des contenus publicitaires diffusÃ©s via nos espaces publicitaires;\r\n\r\nd\'identifier les publicitÃ©s ainsi affichÃ©es, le nombre d\'utilisateurs ayant cliquÃ© sur chaque publicitÃ©, leur permettant de calculer les sommes dues de ce fait et d\'Ã©tablir des statistiques;\r\n\r\nde reconnaÃ®tre votre terminal lors de votre navigation ultÃ©rieure sur tout autre site ou service sur lequel ces tiers Ã©mettent Ã©galement des cookies et, le cas Ã©chÃ©ant, d\'adapter ces sites et services tiers ou les publicitÃ©s qu\'ils diffusent, Ã  la navigation de votre terminal dont ils peuvent avoir connaissance;\r\n\r\nd\'adapter la prÃ©sentation des contenus de ces tiers aux prÃ©fÃ©rences d\'affichage de votre terminal (langue utilisÃ©e, rÃ©solution d\'affichage, systÃ¨me d\'exploitation utilisÃ©, etc)\r\n\r\nde mÃ©moriser des informations relatives Ã  un formulaire que vous avez rempli auprÃ¨s de ces tiers (inscription Ã  un de leurs services) ou Ã  des produits, services ou informations que vous avez choisis auprÃ¨s du tiers concernÃ© : achat d\'une prestation d\'un tiers, etc.).\r\n\r\n4. Les Cookies Â« RÃ©seaux Sociaux Â»\r\nLes Cookies RÃ©seaux Sociaux permettent de partager des contenus de notre Site avec dâ€™autres personnes ou de faire connaÃ®tre Ã  ces autres personnes votre consultation ou votre opinion concernant un contenu du Site. Tel est, notamment, le cas des boutons Â« partager Â», Â« jâ€™aime Â», issus de rÃ©seaux sociaux Facebook ou Twitter. Si vous interagissez au moyen des Ã©lÃ©ments Ã©manant de tiers, par exemple en cliquant sur le bouton Â« J\'aime Â» ou en laissant un commentaire, les informations correspondantes seront transmises au rÃ©seau social et publiÃ©es sur votre profil.\r\n\r\nSi vous ne souhaitez pas que le rÃ©seau social relie les informations collectÃ©es par l\'intermÃ©diaire de notre Site Ã  votre compte utilisateur, vous devez auparavant vous dÃ©connecter du rÃ©seau social.\r\n\r\nNous vous invitons Ã  consulter les politiques de protection de la vie privÃ©e de ces rÃ©seaux sociaux afin de prendre connaissance des finalitÃ©s d\'utilisation, notamment publicitaires, des informations de navigation qu\'ils peuvent recueillir grÃ¢ce Ã  ces boutons applicatifs.\r\n\r\n\r\n\r\nIII. VOS CHOIX CONCERNANT LES COOKIES\r\nEn utilisant notre Site, vous consentez Ã  lâ€™utilisation des Cookies prÃ©citÃ©s. Vous pouvez toutefois choisir Ã  tout moment de dÃ©sactiver tout ou partie de ces Cookies, Ã  lâ€™exception des Cookies techniques nÃ©cessaires au fonctionnement du site comme indiquÃ© ci-dessus.\r\n\r\nVotre navigateur peut Ã©galement Ãªtre paramÃ©trÃ© pour vous signaler les Cookies qui sont dÃ©posÃ©s dans votre terminal et vous demander de les accepter ou pas.\r\n\r\nVotre accord nâ€™est valable que pour une durÃ©e de treize mois Ã  compter de la date du premier dÃ©pÃ´t du Cookie dans votre terminal, indÃ©pendamment du nombre de visites effectuÃ©es sur le Site qui ne peut avoir pour effet de prolonger cette durÃ©e. Ã€ lâ€™expiration de ce dÃ©lai, votre accord sera de nouveau sollicitÃ© lors de votre navigation sur le Site.\r\n\r\n1. Refuser un Cookie par lâ€™intermÃ©diaire de votre logiciel de navigation\r\nVous pouvez Ã  tout moment choisir de dÃ©sactiver tout ou partie des Cookies. Votre navigateur peut Ã©galement Ãªtre paramÃ©trÃ© pour vous signaler les Cookies dÃ©posÃ©s dans votre terminal et demander de les accepter ou non (au cas par cas ou en totalitÃ©).\r\n\r\nNous vous rappelons toutefois que la dÃ©sactivation des Cookies Techniques vous empÃªchera dâ€™utiliser notre site dans des conditions normales, et notamment dâ€™accÃ©der Ã  certains services de notre site internet.\r\n\r\nSi vous choisissez de refuser lâ€™enregistrement de Cookies Techniques dans votre ordinateur ou si vous supprimez ceux qui y sont enregistrÃ©s, nous dÃ©clinons toute responsabilitÃ© pour les consÃ©quences liÃ©es au fonctionnement dÃ©gradÃ© de nos services rÃ©sultant de lâ€™impossibilitÃ© pour nous dâ€™enregistrer ou de consulter les Cookies Techniques nÃ©cessaires Ã  leur fonctionnement et que vous aurez refusÃ©s ou supprimÃ©s.\r\n\r\nLa rubrique Aide des navigateurs internet vous indique comment refuser les nouveaux cookies, obtenir un message de notification vous signalant leur rÃ©ception ou les dÃ©sactiver.\r\n\r\nPour Internet Explorerâ„¢ : ouvrez le menu Â«OutilsÂ», puis sÃ©lectionnez Â«Options internetÂ» ; cliquez sur l\'onglet Â«ConfidentialitÃ©Â» puis lâ€™onglet Â«AvancÃ©Â» choisissez le niveau souhaitÃ© ou suivez ce lien : https://support.microsoft.com/fr-fr/help/17442/windows-internet-explorer-delete-manage-cookies\r\n\r\nPour Firefoxâ„¢ : ouvrez le menu Â«OutilsÂ», puis sÃ©lectionnez Â«OptionsÂ» ; cliquez sur l\'onglet Â«Vie privÃ©eÂ» puis choisissez les options souhaitÃ©es ou suivez ce lien : https://support.mozilla.org/fr/kb/autoriser-bloquer-cookies-preferences-sites\r\n\r\nPour Chromeâ„¢ : ouvrez le menu de configuration (logo clÃ© Ã  molette), puis sÃ©lectionnez Â«OptionsÂ» ; cliquez sur Â«Options avancÃ©esÂ» puis dans la section Â«ConfidentialitÃ©Â», cliquez sur Â«ParamÃ¨tres de contenuÂ», et choisissez les options souhaitÃ©es ou suivez le lien suivant : https://support.google.com/accounts/answer/61416?hl=fr\r\n\r\nPour Safariâ„¢ : choisissez Â« Safari &gt; PrÃ©fÃ©rencesÂ» puis cliquez sur Â«SÃ©curitÃ©Â» ; Dans la section Â«Accepter les cookiesÂ» choisissez les options souhaitÃ©es ou suivez ce lien : https://support.apple.com/fr-fr/guide/safari/sfri11471/mac\r\n\r\nPour Operaâ„¢ : ouvrez le menu Â«OutilsÂ» ou Â«RÃ©glagesÂ», puis sÃ©lectionnez Â«Supprimer les donnÃ©es privÃ©esÂ»; cliquez sur l\'onglet Â«Options dÃ©taillÃ©esÂ», puis choisissez les options souhaitÃ©es ou suivez ce lien : http://help.opera.com/Windows/10.20/fr/cookies.html\r\n\r\nPour plus dâ€™informations sur la faÃ§on dont fonctionnent les cookies et la publicitÃ© ciblÃ©e, vous pouvez consulter les sites www.youronlinechoices.eu et www.allaboutcookies.org.\r\n\r\n\r\n2. Refuser un Cookie gÃ©rÃ© par nos fournisseurs\r\n\r\nLorsque vous naviguez sur notre site, des Cookies Ã©ditÃ©s par des sociÃ©tÃ©s autres que Comexposium peuvent Ãªtre placÃ©s sur votre terminal, sous rÃ©serve des choix que vous avez pu exercer antÃ©rieurement ou Ã  tout moment, dans les conditions dÃ©crites dans le prÃ©sent document.\r\n\r\nEn plus des mesures prises par Comexposium pour vÃ©rifier la lÃ©galitÃ© de ces Cookies, l\'Ã©mission et l\'utilisation de ces Cookies sont soumises aux politiques de protection de la vie privÃ©e de ces Ã©diteurs. Nous Vous informons nÃ©anmoins de l\'objet des Cookies dont nous avons connaissance et des moyens dont vous disposez pour effectuer des choix Ã  l\'Ã©gard de ces Cookies et de leurs Ã©metteurs respectifs.\r\n\r\nVous pouvez vous connecter au site Youronlinechoices, proposÃ© par les professionnels de la publicitÃ© digitale regroupÃ©s au sein de lâ€™association europÃ©enne EDAA (European Digital Advertising Alliance) et gÃ©rÃ© en France par lâ€™Interactive Advertising Bureau (IAB) France.\r\n\r\nVous pourrez ainsi connaÃ®tre les entreprises inscrites Ã  cette plate-forme et qui vous offrent la possibilitÃ© d\'accepter ou de refuser les cookies utilisÃ©s par ces entreprises pour adapter aux informations de navigation qu\'elles traitent les publicitÃ©s susceptibles d\'Ãªtre affichÃ©es lors de la consultation par votre terminal de services en ligne sur lesquels elles Ã©mettent des cookies : http://www.youronlinechoices.com/fr/controler-ses-cookies/.\r\n\r\nCette plate-forme europÃ©enne est partagÃ©e par des centaines de professionnels de la publicitÃ© sur Internet et constitue une interface centralisÃ©e vous permettant d\'exprimer vos choix Ã  l\'Ã©gard des cookies susceptibles d\'Ãªtre utilisÃ©s afin d\'adapter Ã  la navigation de votre terminal les publicitÃ©s qui y sont affichÃ©es. Notez que cette procÃ©dure n\'empÃªchera pas l\'affichage de publicitÃ©s sur les sites Internet que vous visitez. Elle ne bloquera que les technologies qui permettent d\'adapter des publicitÃ©s Ã  la navigation de votre terminal et Ã  vos centres d\'intÃ©rÃªts.\r\n\r\n3. Refuser un Cookie Ã©mis par un rÃ©seau social\r\nSi vous ne souhaitez pas que notre site enregistre des Cookies dans votre navigateur Ã  cette fin, vous pouvez cliquer sur les liens de dÃ©sactivation de ces Cookies suivants qui empÃªchera donc toute interaction avec le ou les rÃ©seaux sociaux concernÃ©s :\r\nFACEBOOK : https://www.facebook.com/help/360595310676682/\r\nTWITTER : https://support.twitter.com/articles/20171379-twitter-prend-en-charge-la-desactivation-du-suivi-dnt\r\nGOOGLE + : https://support.google.com/accounts/answer/61416\r\nLINKEDIN : http://www.linkedin.com/legal/cookie-policy\r\nYAHOO : https://info.yahoo.com/privacy/us/yahoo/cookies/\r\nYOUTUBE : https://support.google.com/accounts/answer/61416', 'Id_Article_71.png', '2020-06-10 15:58:31', NULL),
(67, 'DÃ‰COUVREZ SHIFT !', '&lt;h1&gt; LA PREMIÃˆRE Ã‰DITION DE SHIFT &lt;/h1&gt;&lt;br&gt;&lt;br&gt;\r\nShift est un Ã©vÃ©nement communautaire grand public crÃ©Ã© en 2020 par l\'agence de communication Media Bind.&lt;br&gt;\r\nUne Ã©quipe dÃ©vouÃ©e Ã  crÃ©er un week-end unique vers un objectif hors du commun : redÃ©couvrir l\'univers du jeu vidÃ©o sous toutes les plateformes disponibles Ã  ce jour (PC, PS4, XBox, Switch...).&lt;br&gt;&lt;br&gt;\r\n\r\nDÃ©diÃ© Ã  tous, que ce soit simple novice, passionnÃ© ou gameur aguerri, nos portes seront grandes ouvertes. Pouvant accueillir plus de 20 000 joueurs par jour, Shift s\'Ã©tend et investit dans les plus grands halls du Parc des expositions de la porte de Versailles Ã  Paris.&lt;br&gt;&lt;br&gt;\r\n\r\nPour cette premiÃ¨re Ã©dition, Shift vous propose 10 stands des plus grands concepteurs de jeux vidÃ©os avec Ã  l\'affiche des jeux inÃ©dits dont Shift a les exclusivitÃ©s cette annÃ©e !\r\nQue vous soyez fan de jeux d\'action, d\'aventure, de simulation, stratÃ©gies, vous aurez l\'embarras du choix.&lt;br&gt;&lt;br&gt;\r\n\r\nShift vous donne lâ€™occasion de tester les bÃªtas plus ou moins avancÃ©s de nombreux jeux comme Watch Dogs, Assassin\'s Creed Valhalla et bien d\'autres. Vous n\'avez plus d\'excuses pour ne pas venir, Shift diffusera au fur et Ã  mesure des trailers de jeux, d\'annonces, d\'animations prÃ©vues pendant ce week-end du 21 au 22 novembre 2020 ! &lt;br&gt;&lt;br&gt;\r\n\r\nDurant ces deux jours d\'Ã©vÃ©nement, de nombreuses activitÃ©s seront proposÃ©es. Ces deux jours seront rythmÃ©s par nos streamers, en effet nous avons un large choix d\'influenceurs disponible aux sÃ©ances dÃ©dicaces, comme des minis jeux avec le public sur le stand dÃ©dier au streaming oÃ¹ ils pourront vlogger l\'Ã©vÃ©nement.&lt;br&gt;&lt;br&gt;\r\nTandis qu\'en parallÃ¨le des confÃ©rences par les studios de jeux vidÃ©o, et des marques de constructeurs de console prÃ©senterons les prochaines gÃ©nÃ©rations de console et de technologies. &lt;br&gt;\r\nVous n\'aurez pas le temps de vous ennuyer ! &lt;br&gt;&lt;br&gt;\r\n\r\n\r\nEn clair, cette Ã©dition de Shift s\'annonce grandiose et vous ouvre officiellement leurs portes. &lt;br&gt;&lt;br&gt;RythmÃ©e par des confÃ©rences et attractions dans tous les stands, nous vous attendons nombreux le 21 et le 22 novembre. &lt;br&gt;&lt;br&gt;\r\n\r\nL\'Ã©quipe Shift.\r\n\r\n', 'Id_Article_67.png', '2020-06-04 12:04:22', '2020-06-09 16:58:43');

-- --------------------------------------------------------

--
-- Structure de la table `carte_bleu`
--

CREATE TABLE `carte_bleu` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  `proprietaire` varchar(255) NOT NULL,
  `cvc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carte_bleu`
--

INSERT INTO `carte_bleu` (`id`, `idUser`, `numero`, `expiration`, `proprietaire`, `cvc`) VALUES
(5, 14, '9375048d24787709f6128de614de1e3ad1219163', '4a7c9f93e2417187f814079e6c47a3271aaa7b93', '1141141', '141'),
(6, 17, '9375048d24787709f6128de614de1e3ad1219163', '297beb01dd21c5a2aad009da6abb91d4bc0fdc6d', 'Pluchard Arthur', '544'),
(8, 15, '9375048d24787709f6128de614de1e3ad1219163', 'ac1ab23d6288711be64a25bf13432baf1e60b2bd', 'PUTENEGRE', '896'),
(9, 2, '9375048d24787709f6128de614de1e3ad1219163', '3f6565c76837bcbe086fb5d262f18c232dee76e8', 'jfgjfgjf', '453');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) DEFAULT NULL,
  `reservation` varchar(255) DEFAULT NULL,
  `administrateur` tinyint(3) NOT NULL DEFAULT '0',
  `confirmkey` varchar(255) DEFAULT NULL,
  `confirme` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `password`, `inscription`, `avatar`, `reservation`, `administrateur`, `confirmkey`, `confirme`) VALUES
(1, 'Loubal70', 'louisbal70@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-05-28 20:13:43', '1.gif', 'pass_vip', 1, '', 1),
(2, 'ChoquetThÃ©o', 'choquet.theo@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-05-29 10:57:46', '2.png', 'pass_standard', 1, '', 1),
(5, 'IzzyDie', 'valentinbaviere1@gmail.com', '2629705f97f3cda6082a15243bb0af1f23fb807e', '2020-06-01 10:08:13', NULL, NULL, 0, '', 0),
(14, 'Visiteur3', 'pefoyew373@lywenw.com', '17429d52d87f743e5394c57e112dc505e12587db', '2020-06-08 09:48:15', '14.png', 'pass_malin', 1, '02145871386003', 1),
(15, 'GOUGNAFIÃ‰', 'jeuxdenr@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-06-08 09:52:38', '15.png', 'pass_malin', 0, '01597614318804', 1),
(16, 'Balfoo', 'balfoo09@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-06-08 09:56:49', '16.png', NULL, 0, '81307541242676', 1),
(17, 'DelzarGANGGANG', 'arthurpluchard@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2020-06-09 08:12:29', '17.gif', 'pass_malin', 0, '90545221235261', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carte_bleu`
--
ALTER TABLE `carte_bleu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `carte_bleu`
--
ALTER TABLE `carte_bleu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carte_bleu`
--
ALTER TABLE `carte_bleu`
  ADD CONSTRAINT `carte_bleu_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
