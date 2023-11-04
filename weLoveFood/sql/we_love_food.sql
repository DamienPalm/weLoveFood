-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 nov. 2023 à 23:28
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `we_love_food`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `review` int(11) NOT NULL DEFAULT 3
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `recipe_id`, `comment`, `created_at`, `review`) VALUES
(2, 3, 1, 'deuxième commentaire', '2021-07-06 13:56:48', 0),
(1, 1, 1, 'Premier commentaire\n', '2021-07-06 13:56:48', 1),
(3, 2, 1, "J'adore le cassoulet mais je préfère manger des kebabs !", '2021-07-06 13:56:48', 3),
(5, 2, 1, 'Et de 5 ! trop bien la recette :)', '2021-07-06 14:10:50', 3),
(7, 2, 1, 'Test de 5', '2021-07-06 14:14:39', 5);

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `recipe` text NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `author` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `recipe`, `is_enabled`, `author`) VALUES
(1, 'Cassoulet Toulousain', "Le cassoulet (de l'occitan cassolet, caçolet) est une spécialité régionale du Languedoc, à base de haricots secs, généralement blancs, et de viande. À son origine, il était à base de fèves. Le cassoulet tient son nom de la cassole en terre cuite émaillée dite caçòla1 en occitan et fabriquée à Issel.\r\n\r\n", 1, 'mickael.andrieu@exemple.com'),
(2, 'Couscous', "Le couscous (en berbère : ⵙⴽⵙⵓ seksu ou ⴽⵙⴽⵙⵓ keskesu, en arabe maghrébin : الطعام، كسكسي، كسكس، سكسو, seksu, kuskus, kusksi, kesksu, t’am) est d'une part une semoule de blé dur préparée à l'huile d'olive (un des aliments de base traditionnel de la cuisine des pays du Maghreb) et d'autre part, une spécialité culinaire issue de la cuisine berbère, à base de couscous, de légumes, d'épices, d'huile d'olive et de viande (rouge ou de volaille) ou de poisson.", 0, 'mickael.andrieu@exemple.com'),
(3, 'Escalope milanaise', "L'escalope à la milanaise ou escalope milanaise ou côtelette à la milanaise (cotoletta alla milanese, en italien, co(s)toleta a la milanesa en langue lombarde, du français « côtelette ») est une spécialité culinaire des cuisine milanaise, cuisine lombarde et cuisine italienne, à base de côtelette ou d'escalope panée de viande de veau (variété de cotoletta traditionnellement prise dans le faux-filet). Elle aurait été introduite à Milan par les Français lors des guerres napoléonniennes et est devenu un des emblèmes culinaires de la ville, avec les risotto à la milanaise, panettone et polenta. Elle est traditionnellement cuite au beurre, et généralement servie avec des légumes ou salade, avec éventuellement du jus de citron. En Italie, ce mets ne se sert pas avec des pâtes. En France, le morceau de veau est cuisiné et servi désossé.", 1, 'mathieu.nebra@exemple.com'),
(4, 'Salade Romaine', "La salade César (en anglais : Caesar salad ; en espagnol : ensalada César ; en italien : Caesar salad) est une recette de cuisine de salade composée de la cuisine américaine, traditionnellement préparée en salle à côté de la table, à base de laitue romaine, œuf dur, croûtons, parmesan et de sauce César à base de parmesan râpé, huile d'olive, pâte d'anchois, ail, vinaigre de vin, moutarde, jaune d'œuf et sauce Worcestershire.", 0, 'laurene.castor@exemple.com'),
(10, 'Paella', "La paella (/pa.e.la/ ou /pa.e.ja/, mot valencien signifiant « poêle (à frire) ») est une spécialité culinaire traditionnelle espagnole à base de riz rond (riz bomba), originaire de la région de Valence, qui tient son nom de la poêle qui sert à la cuisiner. Elle est à ce jour un des plats emblématiques traditionnels et populaire en particulier dans sa région d'origine, ainsi que de la cuisine espagnole en général, connue dans le monde entier, et déclinée en de nombreuses variantes selon les régions.", 1, 'mathieu.nebra@exemple.com'),
(11, 'Tartiflette', "La tartiflette (dérivé de tartifle ou tartiflâ, pomme de terre en savoyard) est une recette de cuisine à base de gratin de pommes de terre, d'oignons, de lardons et de crème, le tout gratiné au reblochon (fromage AOP des pays de Savoie).", 1, 'mickael.andrieu@exemple.com'),
(12, 'Steak tartare', "Le steak tartare ou tartare est une recette à base de viande de bœuf ou de viande de cheval crue, généralement hachée gros, ou coupée en petits cubes au couteau (d'où l'appellation de « tartare au couteau »). La recette actuelle figure dans Le Guide culinaire d'Auguste Escoffier de 1903 sous le nom de « beefsteak à l'américaine ».\r\n\r\nLe filet américain, spécialité belge, est inspiré du steak tartare avec une découpe de la viande beaucoup plus fine.", 0, 'mickael.andrieu@exemple.com'),
(13, 'Quiche lorraine', "La quiche lorraine est une variante de quiche, une tarte salée de la cuisine lorraine et de la cuisine française, à base de pâte brisée ou de pâte feuilletée, de migaine (œufs, crème fraîche) et de lardons.", 1, 'laurene.castor@exemple.com');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `age`) VALUES
(1, 'Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'S3cr3t', 34),
(2, 'Mathieu Nebra', 'mathieu.nebra@exemple.com', 'MiamMiam', 34),
(3, 'Laurène Castor', 'laurene.castor@exemple.com', 'laCasto28', 28);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
