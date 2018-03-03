-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 02 Mars 2018 à 16:07
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog-php`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `comment_date`, `post_id`, `report`) VALUES
(5, 'gb', '+1', '2018-02-15 12:21:41', 2, 0),
(17, 'manu', '+1 !', '2018-02-25 12:07:55', 1, 0),
(19, 'tom', 'genial !', '2018-02-27 16:01:48', 1, 0),
(20, 'joe', 'super article !\r\n', '2018-02-28 17:30:08', 4, 0),
(24, 'tom', 'je partirais bien moi aussi ;D', '2018-02-28 17:55:55', 4, 0),
(25, 'tom', 'Super ça donne envie.', '2018-02-28 17:56:53', 4, 0),
(31, 'john', 'super !', '2018-02-28 18:09:10', 3, 0),
(32, 'joe', 'trop bien !', '2018-02-28 18:13:44', 3, 0),
(34, 'jeff', 'bon voyage', '2018-02-28 18:31:17', 2, 0),
(35, 'cedric', 'TU ES UN BOULET ', '2018-03-01 12:09:09', 4, 1),
(36, 'sophie', 'fais toi plez ! ', '2018-03-01 14:49:27', 2, 0),
(41, 'joe', ':D', '2018-03-01 15:15:28', 2, 0),
(42, 'Matieu', 'bye', '2018-03-01 15:15:42', 2, 0),
(43, 'Matieu', 'bon ovyage !', '2018-03-01 15:20:27', 2, 0),
(44, 'Matieu', 'bon ovyage !', '2018-03-01 15:20:35', 2, 0),
(45, 'roger', 'au revoir', '2018-03-01 15:22:18', 2, 1),
(46, 'jerome', 'les valises, quelles galères. ', '2018-03-01 15:26:21', 1, 0),
(50, 'Mathieu', '+1', '2018-03-01 15:35:25', 1, 0),
(52, 'joe', 'super !', '2018-03-01 15:49:44', 2, 0),
(53, 'fabrice', 'super gagnotte jeux concour sur mon site http://concour.blablabla.fr', '2018-03-01 15:50:27', 2, 1),
(55, 'regis', 'tchutchu !!', '2018-03-02 16:43:48', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `post_thumbnail`) VALUES
(2, 'Jour "J" : Je m\'envole pour l\'Alaska', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>', '2018-01-20 16:28:41', 'on-s-envole.jpg'),
(3, 'Une ballade en chiens de traîneaux.  ', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel lacus orci. Ut lectus metus, lacinia ac purus eu, interdum consectetur nunc. Mauris convallis neque viverra enim accumsan luctus. Donec semper egestas nunc, sed congue mi iaculis quis. Vestibulum lacinia lobortis orci non volutpat. Nam aliquam consequat ex, et consequat odio tempus vel. Nam placerat ligula lacus, id pharetra tellus pretium non. Nullam viverra eget ante et maximus. Quisque vel interdum odio. Vivamus quam orci, aliquam non libero at, vulputate elementum justo. Donec a orci risus. Nam in est fringilla, tempor lorem vitae, venenatis sapien. Duis nisl neque, sollicitudin in malesuada quis, mattis pharetra libero. Integer vitae lacus lectus. In pretium magna id rutrum suscipit.\r\n</p>\r\n<p>\r\nEtiam maximus quis tortor ut placerat. Morbi tincidunt posuere dolor, quis elementum est luctus in. Quisque ut augue est. Quisque pretium tincidunt venenatis. Mauris tristique vitae est eu porta. Etiam viverra, arcu ut auctor tincidunt, magna velit mattis lacus, sodales dapibus sem turpis eu tellus. Donec sit amet suscipit augue, vel auctor ex. Sed ligula ante, fringilla non maximus ut, sagittis at tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras vestibulum nunc sed turpis auctor, vel vehicula lectus efficitur. Ut sagittis ac lorem nec euismod. Sed vitae ligula aliquet, posuere nisi non, hendrerit elit. Nulla facilisi. Cras commodo iaculis odio, quis facilisis risus convallis nec.\r\n</p>\r\n<p>\r\nDuis malesuada tincidunt tincidunt. Nulla blandit et diam vitae auctor. Nullam fringilla, sapien a pretium aliquet, massa mi sodales massa, vitae luctus nisl neque non felis. Fusce eu tincidunt quam. Praesent arcu massa, lacinia non diam vitae, elementum convallis justo. Sed accumsan velit a diam sagittis porta. In commodo sed nulla ac volutpat. Morbi odio massa, finibus vitae risus a, mollis congue odio. Aenean fringilla sit amet tortor sed venenatis. Vivamus non ultricies turpis. Integer a tincidunt turpis. Suspendisse lectus elit, rhoncus sed arcu non, rhoncus cursus sapien. Nullam mi augue, vehicula eu porta sed, egestas nec lacus. Cras aliquam diam id turpis volutpat vehicula.\r\n</p>\r\n<p>\r\nMaecenas egestas tellus sed lectus pretium pretium. Vestibulum id est congue, consectetur purus id, cursus lorem. Duis varius turpis in eros eleifend condimentum. Fusce condimentum diam lobortis, bibendum metus ut, pretium enim. Sed eget nunc a lacus accumsan lacinia. Aenean ornare leo eget ante porta, consequat volutpat eros aliquet. Donec in tempor dolor. Ut et mauris sed mauris scelerisque rhoncus. Duis viverra lacus ac metus congue maximus. Maecenas aliquam, purus sed ultricies molestie, ex risus semper quam, dignissim mattis tellus turpis ac diam. Phasellus rutrum urna quis magna congue, in faucibus odio tempus. Maecenas nec sagittis justo. Nulla a eleifend tellus. Duis et tincidunt nisl. Nam eu facilisis nisl, eget hendrerit velit.\r\n</p>', '2018-02-22 14:53:51', 'volcano-2788089_1920.jpg'),
(4, 'A bord de l\'Alaska Railroad !', '<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><h3>Section 1.10.32 du "De Finibus Bonorum et Malorum" de Ciceron (45 av. J.-C.)</h3><p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>\r\n<h3>Traduction de H. Rackham (1914)</h3>\r\n<p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>\r\n<h3>Section 1.10.33 du "De Finibus Bonorum et Malorum" de Ciceron (45 av. J.-C.)</h3>\r\n<p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p>\r\n<h3>Traduction de H. Rackham (1914)</h3>\r\n<p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</p>', '2018-02-22 14:57:18', 'train-railroad.jpg'),
(6, 'Préparation du voyage', 'Metuentes igitur idem latrones Lycaoniam magna parte campestrem cum se inpares nostris fore congressione stataria documentis frequentibus scirent, tramitibus deviis petivere Pamphyliam diu quidem intactam sed timore populationum et caedium, milite per omnia diffuso propinqua, magnis undique praesidiis conmunitam.\r\n\r\nIam in altera philosophiae parte. quae est quaerendi ac disserendi, quae logikh dicitur, iste vester plane, ut mihi quidem videtur, inermis ac nudus est. tollit definitiones, nihil de dividendo ac partiendo docet, non quo modo efficiatur concludaturque ratio tradit, non qua via captiosa solvantur ambigua distinguantur ostendit; iudicia rerum in sensibus ponit, quibus si semel aliquid falsi pro vero probatum sit, sublatum esse omne iudicium veri et falsi putat.\r\n\r\nAlios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis, amicitias esse expetendas; itaque, ut quisque minimum firmitatis haberet minimumque virium, ita amicitias appetere maxime; ex eo fieri ut mulierculae magis amicitiarum praesidia quaerant quam viri et inopes quam opulenti et calamitosi quam ii qui putentur beati.', '2018-01-18 16:57:22', 'preparer-voyage-etranger.jpg'),
(7, 'Une journée  avec les baleines', 'Tempore quo primis auspiciis in mundanum fulgorem surgeret victura dum erunt homines Roma, ut augeretur sublimibus incrementis, foedere pacis aeternae Virtus convenit atque Fortuna plerumque dissidentes, quarum si altera defuisset, ad perfectam non venerat summitatem.\r\n\r\nHinc ille commotus ut iniusta perferens et indigna praefecti custodiam protectoribus mandaverat fidis. quo conperto Montius tunc quaestor acer quidem sed ad lenitatem propensior, consulens in commune advocatos palatinarum primos scholarum adlocutus est mollius docens nec decere haec fieri nec prodesse addensque vocis obiurgatorio sonu quod si id placeret, post statuas Constantii deiectas super adimenda vita praefecto conveniet securius cogitari.\r\n\r\nEodem tempore Serenianus ex duce, cuius ignavia populatam in Phoenice Celsen ante rettulimus, pulsatae maiestatis imperii reus iure postulatus ac lege, incertum qua potuit suffragatione absolvi, aperte convictus familiarem suum cum pileo, quo caput operiebat, incantato vetitis artibus ad templum misisse fatidicum, quaeritatum expresse an ei firmum portenderetur imperium, ut cupiebat, et cunctum.\r\n\r\nItaque verae amicitiae difficillime reperiuntur in iis qui in honoribus reque publica versantur; ubi enim istum invenias qui honorem amici anteponat suo? Quid? Haec ut omittam, quam graves, quam difficiles plerisque videntur calamitatum societates! Ad quas non est facile inventu qui descendant. Quamquam Ennius recte.\r\n\r\nAlii nullo quaerente vultus severitate adsimulata patrimonia sua in inmensum extollunt, cultorum ut puta feracium multiplicantes annuos fructus, quae a primo ad ultimum solem se abunde iactitant possidere, ignorantes profecto maiores suos, per quos ita magnitudo Romana porrigitur, non divitiis eluxisse sed per bella saevissima, nec opibus nec victu nec indumentorum vilitate gregariis militibus discrepantes opposita cuncta superasse virtute.', '2018-02-15 17:01:28', 'humpback-whale-1744273_1280.jpg'),
(9, 'Une nuit au étrange couleurs', 'Siquis enim militarium vel honoratorum aut nobilis inter suos rumore tenus esset insimulatus fovisse partes hostiles, iniecto onere catenarum in modum beluae trahebatur et inimico urgente vel nullo, quasi sufficiente hoc solo, quod nominatus esset aut delatus aut postulatus, capite vel multatione bonorum aut insulari solitudine damnabatur.\r\n\r\nAtque, ut Tullius ait, ut etiam ferae fame monitae plerumque ad eum locum ubi aliquando pastae sunt revertuntur, ita homines instar turbinis degressi montibus impeditis et arduis loca petivere mari confinia, per quae viis latebrosis sese convallibusque occultantes cum appeterent noctes luna etiam tum cornuta ideoque nondum solido splendore fulgente nauticos observabant quos cum in somnum sentirent effusos per ancoralia, quadrupedo gradu repentes seseque suspensis passibus iniectantes in scaphas eisdem sensim nihil opinantibus adsistebant et incendente aviditate saevitiam ne cedentium quidem ulli parcendo obtruncatis omnibus merces opimas velut viles nullis repugnantibus avertebant. haecque non diu sunt perpetrata.\r\n\r\nEt est admodum mirum videre plebem innumeram mentibus ardore quodam infuso cum dimicationum curulium eventu pendentem. haec similiaque memorabile nihil vel serium agi Romae permittunt. ergo redeundum ad textum.', '2018-03-02 17:03:53', 'northern-light-2387777_1920.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
