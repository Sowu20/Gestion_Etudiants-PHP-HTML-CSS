-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 juin 2024 à 15:17
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `temps` varchar(1000) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `email` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `contenu`, `temps`, `auteur`, `email`) VALUES
(1, 'Maxime ea doloremque', 'Sed ea laborum perfe', '07-06-2024 (Fri) 00:38:37', 'Eum assumenda perfer', 'jepene@mailinator.com'),
(2, ';jhgfxdxscdgfvhbjnku,ji', 'ijhjgvcfdxsfdcfgsdvhyjyujgbhgrdhcfgsddrzqsedzrestfgyrhtfhgyvhcgdvchvvfcgvdgchvyjtfghygrdrsdtgthfyjgjgutydyfredrtstfedftgyfgutfhygdftfdgfyrtfghugugyfgtyuhgutfgtfghugugtfytf', '07-06-2024 (Fri) 01:45:37', 'iujjfhgxfcxcgcfhvjhkjlk', 'elio@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `annonce_id` int NOT NULL,
  `com` text NOT NULL,
  `auteur` varchar(65) NOT NULL,
  `email` varchar(200) NOT NULL,
  `temps` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `heure` timestamp NOT NULL,
  `lieu` varchar(30) NOT NULL,
  `liste_participants` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_m` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(65) NOT NULL,
  `email` varchar(120) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `entreprise` varchar(30) NOT NULL,
  `date_inscription` date NOT NULL,
  `img` varchar(54) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_m`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_m`, `nom`, `prenom`, `email`, `poste`, `entreprise`, `date_inscription`, `img`) VALUES
(1, 'Et velit unde eius v', 'Aliqua Accusamus ad', 'duxaluc@mailinator.com', 'Quia sed beatae ipsu', 'Id ipsum cumque et ', '0000-00-00', ''),
(2, 'Et velit unde eius v', 'Aliqua Accusamus ad', 'duxaluc@mailinator.com', 'Quia sed beatae ipsu', 'Id ipsum cumque et ', '0000-00-00', ''),
(3, 'Et velit unde eius v', 'Aliqua Accusamus ad', 'duxaluc@mailinator.com', 'Quia sed beatae ipsu', 'Id ipsum cumque et ', '0000-00-00', ''),
(4, 'Et velit unde eius v', 'Aliqua Accusamus ad', 'duxaluc@mailinator.com', 'Quia sed beatae ipsu', 'Id ipsum cumque et ', '0000-00-00', ''),
(5, 'Et velit unde eius v', 'Aliqua Accusamus ad', 'duxaluc@mailinator.com', 'Quia sed beatae ipsu', 'Id ipsum cumque et ', '0000-00-00', ''),
(6, 'In eos modi error te', 'Sapiente quod ut mai', 'sosit@mailinator.com', 'Qui dolor omnis et q', 'Consequatur et omnis', '1991-05-26', ' '),
(7, 'Enim et vero minima ', 'Magni voluptatem des', 'pacic@mailinator.com', 'In eu rerum est dolo', 'Anim ea facere in vo', '2007-12-14', '273995.jpg'),
(8, 'Enim et vero minima ', 'Magni voluptatem des', 'pacic@mailinator.com', 'In eu rerum est dolo', 'Anim ea facere in vo', '2007-12-14', '273995.jpg'),
(9, 'Quidem et nemo quia ', 'Perferendis proident', 'zuvit@mailinator.com', 'Temporibus sequi mol', 'Dolore magna et alia', '1994-03-06', '1180404.jpg'),
(10, 'Quidem et nemo quia ', 'Perferendis proident', 'zuvit@mailinator.com', 'Temporibus sequi mol', 'Dolore magna et alia', '1994-03-06', '1180404.jpg'),
(11, 'Quidem et nemo quia ', 'Perferendis proident', 'zuvit@mailinator.com', 'Temporibus sequi mol', 'Dolore magna et alia', '1994-03-06', '1180404.jpg'),
(12, 'Vel commodo nihil do', 'Non error dolore rer', 'poti@mailinator.com', 'Non occaecat nemo co', 'Assumenda magni volu', '2000-12-07', ' '),
(13, 'Laudantium iste eos', 'Dolorem quod eum mod', 'joxewinim@mailinator.com', 'Sed autem quam sit ', 'Sed excepturi enim i', '2014-07-26', '15227.png'),
(14, 'Laudantium iste eos', 'Dolorem quod eum mod', 'joxewinim@mailinator.com', 'Sed autem quam sit ', 'Sed excepturi enim i', '2014-07-26', '15227.png'),
(15, 'Dolore fugiat eos v', 'Beatae molestiae ven', 'garo@mailinator.com', 'Quis sapiente nisi n', 'Commodi earum evenie', '1987-08-06', '15227.png'),
(16, 'Qui quasi aut sit ea', 'Eum quo labore digni', 'fakym@mailinator.com', 'Sint architecto quo ', 'Porro esse quos inv', '2005-11-09', '1180404.jpg'),
(17, 'Incidunt velit dol', 'Nam ut aut qui vitae', 'jaxoh@mailinator.com', 'Molestias at hic quo', 'Veniam dolor quia v', '1981-06-11', '1180404.jpg'),
(18, 'Vitae ea dolor paria', 'Voluptas quo perfere', 'rohofevo@mailinator.com', 'Deserunt animi ex v', 'Dolorum in odit dolo', '1991-08-18', '1180404.jpg'),
(19, 'Elit id saepe modi', 'Animi ullamco disti', 'tivi@mailinator.com', 'Ea quisquam perspici', 'Officia sint incidu', '1973-05-16', ' '),
(20, 'Dignissimos impedit', 'Cumque aute aut quid', 'jylip@mailinator.com', 'Ex voluptatibus expe', 'Itaque harum elit i', '1978-10-23', ' '),
(21, 'Veuiller entrer votre nom', 'Veuiller entrer votre prénom', 'exemple@gmail.com', 'Veuiller entrer votre poste', 'Veuiller entrer votre entrepri', '0000-00-00', '782f032235bd4b00c80de140b8e70538.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_mes` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(65) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_mes`, `nom`, `email`, `sujet`, `msg`) VALUES
(1, 'Ipsa facilis et eni', 'waxylo@mailinator.com', 'Fuga Delectus repu', 'Neque et atque repud jyfggcgfrdhghb gthrvdhfgfrxqqdswqsrgyhujklklmjhnbgvcfvscxvgbhj,kl;,jgbvcxws<dxf gjk;ml,wndecgbn jvh;bv j;ygvfd ydrgn;hfknkjgbndvjn sj;dgfnsngv jhdxgcjgfjgjbvkndfhvhsfdjvbdjdhbvfhshdvgfjdvhjvbdsjdhb dbjhvjkhfdsvkhkhqkegqvkghkvehhnkqyhuqgrfqgrvurbruvbjygfhjhjegjgdjbqjdgcqbkhbcjkhcerkycgukgvekhcebjevjggfdsdqsdfghjklmkljhgbcvxcv bn,,nvccxwxcvbjjghfgdfdfuiiuiyutyretyuiojkhbvcfghjkkjhjghfdfghjkjhcvxfghjkhgfdsfghj;,nbvccduyutrertyuigfwxcvhjkkhjghgfddghhlkfrtyuiiouuertyuiojhcvxvbnjghfddss'),
(2, 'Ipsa facilis et eni', 'waxylo@mailinator.com', 'Fuga Delectus repu', 'Neque et atque repud jyfggcgfrdhghb gthrvdhfgfrxqqdswqsrgyhujklklmjhnbgvcfvscxvgbhj,kl;,jgbvcxws<dxf gjk;ml,wndecgbn jvh;bv j;ygvfd ydrgn;hfknkjgbndvjn sj;dgfnsngv jhdxgcjgfjgjbvkndfhvhsfdjvbdjdhbvfhshdvgfjdvhjvbdsjdhb dbjhvjkhfdsvkhkhqkegqvkghkvehhnkqyhuqgrfqgrvurbruvbjygfhjhjegjgdjbqjdgcqbkhbcjkhcerkycgukgvekhcebjevjggfdsdqsdfghjklmkljhgbcvxcv bn,,nvccxwxcvbjjghfgdfdfuiiuiyutyretyuiojkhbvcfghjkkjhjghfdfghjkjhcvxfghjkhgfdsfghj;,nbvccduyutrertyuigfwxcvhjkkhjghgfddghhlkfrtyuiiouuertyuiojhcvxvbnjghfddss'),
(3, 'Ipsa facilis et eni', 'waxylo@mailinator.com', 'Fuga Delectus repu', 'Neque et atque repud jyfggcgfrdhghb gthrvdhfgfrxqqdswqsrgyhujklklmjhnbgvcfvscxvgbhj,kl;,jgbvcxws<dxf gjk;ml,wndecgbn jvh;bv j;ygvfd ydrgn;hfknkjgbndvjn sj;dgfnsngv jhdxgcjgfjgjbvkndfhvhsfdjvbdjdhbvfhshdvgfjdvhjvbdsjdhb dbjhvjkhfdsvkhkhqkegqvkghkvehhnkqyhuqgrfqgrvurbruvbjygfhjhjegjgdjbqjdgcqbkhbcjkhcerkycgukgvekhcebjevjggfdsdqsdfghjklmkljhgbcvxcv bn,,nvccxwxcvbjjghfgdfdfuiiuiyutyretyuiojkhbvcfghjkkjhjghfdfghjkjhcvxfghjkhgfdsfghj;,nbvccduyutrertyuigfwxcvhjkkhjghgfddghhlkfrtyuiiouuertyuiojhcvxvbnjghfddss');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `entreprise` varchar(120) NOT NULL,
  `date_publication` date NOT NULL,
  `date_cloture` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `pwd`) VALUES
(1, 'Dicta sapiente labor', 'qezu@mailinator.com', 'Pa$$w0rd!'),
(2, 'Zazou', 'zk@gmail.com', 'zk228'),
(3, 'Non in eveniet haru', 'pyroc@mailinator.com', 'Pa$$w0rd!'),
(4, 'Non in eveniet haru', 'pyroc@mailinator.com', 'Pa$$w0rd!'),
(5, 'Modi unde et volupta', 'huxilucihu@mailinator.com', 'Pa$$w0rd!'),
(6, 'Magni in id volupta', 'wevaqyt@mailinator.com', 'Pa$$w0rd!'),
(7, 'Magni in id volupta', 'wevaqyt@mailinator.com', 'Pa$$w0rd!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
