-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 08:07 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `chapterTitle` varchar(255) NOT NULL,
  `chapterDescription` varchar(255) NOT NULL,
  `chapterNumber_assigned` int(30) NOT NULL,
  `chapterSubject` varchar(255) NOT NULL,
  `chapterCreated_on` date NOT NULL,
  `chapterUpdated_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `chapterTitle`, `chapterDescription`, `chapterNumber_assigned`, `chapterSubject`, `chapterCreated_on`, `chapterUpdated_on`) VALUES
(2, 'Basic Fundamentals', 'hgsdfhfs', 11, '4', '2018-11-12', '0000-00-00'),
(3, 'Operating System', 'dhfgjd', 12, '1', '2018-11-13', '2018-11-30'),
(4, 'Window', 'Here You Learn About Window 7', 121, '5', '2018-11-13', '2018-11-13'),
(6, 'Printers', 'Here You Learn about  different printers', 20, '6', '2018-11-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `classTitle` varchar(255) NOT NULL,
  `classDescription` varchar(255) NOT NULL,
  `classDuration` varchar(255) NOT NULL,
  `clasCreated_on` date NOT NULL,
  `classUpdated_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classTitle`, `classDescription`, `classDuration`, `clasCreated_on`, `classUpdated_on`) VALUES
(1, 'B.sc', 'fdfsdf', '3 Years', '0000-00-00', '2018-11-12'),
(7, 'B.Tech', 'jgdsjg', '4 Years', '2018-11-12', '0000-00-00'),
(8, 'A', 'jdfgyds', '1year', '2018-11-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pdo`
--

CREATE TABLE `pdo` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdo`
--

INSERT INTO `pdo` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `status`) VALUES
(15, 'Eric', 'Natividad', 'Dragon Souveniers, Ltd.', 'EricNatividad@gmail.com', '77dcd555f38b965d220a13a3bb080260', 'Blocked'),
(16, 'Jeff', 'Young', 'Muscle Machine Inc', 'JeffYoung@gmail.com', '7f15f1ad99c489dc0314952535e424d5', 'Unblocked'),
(17, 'Kelvin', 'Leong', 'Diecast Classics Inc.', 'KelvinLeong@gmail.com', '8cdaea2a5cf19cc337a1441ca7f83d42', 'Blocked'),
(18, 'Juri', 'Hashimoto', 'Technics Stores Inc.', 'JuriHashimoto@gmail.com', '1b887d4572186931b6881db43c619365', ''),
(19, 'Wendy', 'Victorino', 'Handji Gifts& Co', 'WendyVictorino@gmail.com', 'c76a34da758cd9990482a75c7fab4df0', ''),
(20, 'Veysel', 'Oeztan', 'Herkku Gifts', 'VeyselOeztan@gmail.com', '5df4a27669edb90b1ec22db9121c322e', 'Unblocked'),
(21, 'Keith', 'Franco', 'American Souvenirs Inc', 'KeithFranco@gmail.com', 'e6e30c037d0b75caa94827ead86b4edf', 'Unblocked'),
(22, 'Isabel ', 'de Castro', 'Porto Imports Co.', 'Isabel de Castro@gmail.com', '870f9beef523c4072190128ef26d2192', ''),
(23, 'Martine ', 'Rancé', 'Daedalus Designs Imports', 'Martine Rancé@gmail.com', '4d41a1925057b6a7cf24f91de2a98cb7', ''),
(24, 'Marie', 'Bertrand', 'La Corne D\'abondance, Co.', 'MarieBertrand@gmail.com', '879eb8aa505a968b831812aeb836c2a9', ''),
(25, 'Jerry', 'Tseng', 'Cambridge Collectables Co.', 'JerryTseng@gmail.com', 'dbaf60f3a397e1d27630a459c1700ea7', ''),
(26, 'Julie', 'King', 'Gift Depot Inc.', 'JulieKing@gmail.com', '2964815d03a032c8ca37ac5d557647dd', ''),
(27, 'Mory', 'Kentary', 'Osaka Souveniers Co.', 'MoryKentary@gmail.com', 'b3110ed4e43873a45e5d7f14f3450ac9', ''),
(28, 'Michael', 'Frick', 'Vitachrome Inc.', 'MichaelFrick@gmail.com', '3e06fa3927cbdf4e9d93ba4541acce86', ''),
(29, 'Matti', 'Karttunen', 'Toys of Finland, Co.', 'MattiKarttunen@gmail.com', '8edbd0899d7e6ba7dcb875aeedda50b4', ''),
(30, 'Rachel', 'Ashworth', 'AV Stores, Co.', 'RachelAshworth@gmail.com', 'bc4a4c9059dd89610dfea9f632841772', ''),
(31, 'Dean', 'Cassidy', 'Clover Collections, Co.', 'DeanCassidy@gmail.com', '21d6cb8984871e8d552101fdbd50a102', ''),
(32, 'Leslie', 'Taylor', 'Auto-Moto Classics Inc.', 'LeslieTaylor@gmail.com', '79338f7567adbd87a70fdacd50a980e0', ''),
(33, 'Elizabeth', 'Devon', 'UK Collectables, Ltd.', 'ElizabethDevon@gmail.com', '1c2a5683ab5826555c175462eaa5e59a', ''),
(34, 'Yoshi ', 'Tamuri', 'Canadian Gift Exchange Network', 'YoshiTamuri@gmail.com', 'cb8d0fce3a45434d019c52156d4188b0', 'Blocked'),
(35, 'Miguel', 'Barajas', 'Online Mini Collectables', 'MiguelBarajas@gmail.com', '651faef175451b43088ed6fab4aab961', ''),
(36, 'Julie', 'Young', 'Toys4GrownUps.com', 'JulieYoung@gmail.com', '2964815d03a032c8ca37ac5d557647dd', ''),
(37, 'Brydey', 'Walker', 'Asian Shopping Network, Co', 'BrydeyWalker@gmail.com', '4740ec28a9a009dd324686f25b096dbc', ''),
(38, 'Frédérique ', 'Citeaux', 'Mini Caravy', 'Frédérique Citeaux@gmail.com', '509212bb749ae637017c539e2f7983a4', ''),
(39, 'Mike', 'Gao', 'King Kong Collectables, Co.', 'MikeGao@gmail.com', '1b83d5da74032b6a750ef12210642eea', ''),
(40, 'Eduardo ', 'Saavedra', 'Enaco Distributors', 'Eduardo Saavedra@gmail.com', '2b4c0a8b6c765410a79b194faa0e4843', ''),
(41, 'Mary', 'Young', 'Boards & Toys Co.', 'MaryYoung@gmail.com', 'e39e74fb4e80ba656f773669ed50315a', ''),
(42, 'Horst ', 'Kloss', 'Natürlich Autos', 'Horst Kloss@gmail.com', '471071412bc8418c6cafc3cfdc507721', ''),
(43, 'Palle', 'Ibsen', 'Heintze Collectables', 'PalleIbsen@gmail.com', 'b61d6ddfffd5613def500f0296437fbd', ''),
(44, 'Jean ', 'Fresnière', 'Québec Home Shopping Network', 'Jean Fresnière@gmail.com', '2f6e417b2b0c822786e27beb7b87d53b', ''),
(45, 'Alejandra ', 'Camino', 'ANG Resellers', 'Alejandra Camino@gmail.com', 'ff5b590d34503453a10e6e809b057826', ''),
(46, 'Valarie', 'Thompson', 'Collectable Mini Designs Co.', 'ValarieThompson@gmail.com', '991470aff2d666b8b5094e0b32b69338', ''),
(47, 'Helen ', 'Bennett', 'giftsbymail.co.uk', 'Helen Bennett@gmail.com', 'a3dfe29ead5bc05748954c966d17eafe', ''),
(48, 'Annette ', 'Roulet', 'Alpha Cognac', 'Annette Roulet@gmail.com', '6b41ba07a910ad994b2984b0fb431bc2', ''),
(49, 'Renate ', 'Messner', 'Messner Shopping Network', 'Renate Messner@gmail.com', '0d9ace06c3aac8e86a5c3c73b2ac9f38', ''),
(50, 'Paolo ', 'Accorti', 'Amica Models & Co.', 'Paolo Accorti@gmail.com', 'd166ecb731be94baf046a17ac41d1359', ''),
(51, 'Daniel', 'Da Silva', 'Lyon Souveniers', 'DanielDa Silva@gmail.com', '262031397020fd8df478ec13b4b096c5', ''),
(52, 'Daniel ', 'Tonini', 'Auto Associés & Cie.', 'Daniel Tonini@gmail.com', '75176c722254cc7b4bac30f160034068', ''),
(53, 'Henriette ', 'Pfalzheim', 'Toms Spezialitäten, Ltd', 'Henriette Pfalzheim@gmail.com', 'a7f0e26d1a99e36aca35e77cb481ebf2', ''),
(54, 'Elizabeth ', 'Lincoln', 'Royal Canadian Collectables, Ltd.', 'ElizabethLincoln@gmail.com', 'fb4e0369679d3dd8ada109f026a6eb22', ''),
(55, 'Peter ', 'Franken', 'Franken Gifts, Co', 'Peter Franken@gmail.com', 'd07527e1223fbc89cf8c7ae10252834e', ''),
(56, 'Anna', 'O\'Hara', 'Anna\'s Decorations, Ltd', 'AnnaO\'Hara@gmail.com', '97a9d330e236c8d067f01da1894a5438', ''),
(57, 'Giovanni ', 'Rovelli', 'Rovelli Gifts', 'Giovanni Rovelli@gmail.com', 'bd82c45da0bde7c3e3f89be04e785c16', ''),
(58, 'Adrian', 'Huxley', 'Souveniers And Things Co.', 'AdrianHuxley@gmail.com', 'c1937b687795ce80be0ecf20e1811441', ''),
(59, 'Marta', 'Hernandez', 'Marta\'s Replicas Co.', 'MartaHernandez@gmail.com', '83f9c4eb242966cdcada1d01be5d9b15', ''),
(60, 'Ed', 'Harrison', 'BG&E Collectables', 'EdHarrison@gmail.com', '30db2fdfdddfb7cc359ce7a36596f3e0', ''),
(61, 'Mihael', 'Holz', 'Vida Sport, Ltd', 'MihaelHolz@gmail.com', 'c3c50d77a8e7da84050866e97418066d', ''),
(62, 'Jan', 'Klaeboe', 'Norway Gifts By Mail, Co.', 'JanKlaeboe@gmail.com', 'e68564f23e0e939acea76dc3d2bc01bf', ''),
(63, 'Bradley', 'Schuyler', 'Schuyler Imports', 'BradleySchuyler@gmail.com', '5257e05cde806e07b405ddcce85114d2', ''),
(64, 'Mel', 'Andersen', 'Der Hund Imports', 'MelAndersen@gmail.com', '616089705b0c4edfb6293e50eaccba85', ''),
(65, 'Pirkko', 'Koskitalo', 'Oulu Toy Supplies, Inc.', 'PirkkoKoskitalo@gmail.com', '75e1fa12ac26556acc46562dafe475e7', ''),
(66, 'Catherine ', 'Dewey', 'Petit Auto', 'Catherine Dewey@gmail.com', '7b77a39e1105a78b5e9f83ed2e14517b', ''),
(67, 'Steve', 'Frick', 'Mini Classics', 'SteveFrick@gmail.com', '81b8a1b77068d06e1c8190825253066f', ''),
(68, 'Wing', 'Huang', 'Mini Creations Ltd.', 'WingHuang@gmail.com', 'a42dc0468329263ee316a61b754bda09', ''),
(69, 'Julie', 'Brown', 'Corporate Gift Ideas Co.', 'JulieBrown@gmail.com', '2964815d03a032c8ca37ac5d557647dd', ''),
(70, 'Mike', 'Graham', 'Down Under Souveniers, Inc', 'MikeGraham@gmail.com', '1b83d5da74032b6a750ef12210642eea', ''),
(71, 'Ann ', 'Brown', 'Stylish Desk Decors, Co.', 'Ann Brown@gmail.com', 'ad3e33bef1bd0a70b876947de403eedc', ''),
(72, 'William', 'Brown', 'Tekni Collectables Inc.', 'WilliamBrown@gmail.com', '604c8dd5066ee30539037569a028dc9b', ''),
(73, 'Ben', 'Calaghan', 'Australian Gift Network, Co', 'BenCalaghan@gmail.com', '092f2ba9f39fbc2876e64d12cd662f72', ''),
(74, 'Kalle', 'Suominen', 'Suominen Souveniers', 'KalleSuominen@gmail.com', 'b5f51c5c18456ba2e5505e26a1d2ff70', ''),
(75, 'Philip ', 'Cramer', 'Cramer Spezialitäten, Ltd', 'Philip Cramer@gmail.com', 'c187fab56db139f6a44c8da903745627', ''),
(76, 'Francisca', 'Cervantes', 'Classic Gift Ideas, Inc', 'FranciscaCervantes@gmail.com', '3f8de3c0c541c48584b2da3d7fdaaa8d', ''),
(77, 'Jesus', 'Fernandez', 'CAF Imports', 'JesusFernandez@gmail.com', 'e9829608dd90ff6b8bf7cb50746eae78', ''),
(78, 'Brian', 'Chandler', 'Men \'R\' US Retailers, Ltd.', 'BrianChandler@gmail.com', '4d236810821e8e83a025f2a83ea31820', ''),
(79, 'Patricia ', 'McKenna', 'Asian Treasures, Inc.', 'Patricia McKenna@gmail.com', '5bff3e4c64ecf67270ffb59428b00ca4', ''),
(80, 'Laurence ', 'Lebihan', 'Marseille Mini Autos', 'Laurence Lebihan@gmail.com', '06c73624c68f26760645b6ba668c6cf0', ''),
(81, 'Paul ', 'Henriot', 'Reims Collectables', 'Paul Henriot@gmail.com', 'ffc8ac9065dd85b97acd59a293eff29b', ''),
(82, 'Armand', 'Kuger', 'SAR Distributors, Co', 'ArmandKuger@gmail.com', '6a3726b360d4e11255de895686002566', ''),
(83, 'Wales', 'MacKinlay', 'GiftsForHim.com', 'WalesMacKinlay@gmail.com', 'e612e56ca0235a349cffa8331d8a6ad7', ''),
(84, 'Karin', 'Josephs', 'Kommission Auto', 'KarinJosephs@gmail.com', '5b591ed6a915f05e3629a1b5156ad8e7', ''),
(85, 'Juri', 'Yoshido', 'Gifts4AllAges.com', 'JuriYoshido@gmail.com', '1b887d4572186931b6881db43c619365', ''),
(86, 'Dorothy', 'Young', 'Online Diecast Creations Co.', 'DorothyYoung@gmail.com', '08b7593cde74530e1db316e201363219', ''),
(87, 'Lino ', 'Rodriguez', 'Lisboa Souveniers, Inc', 'Lino Rodriguez@gmail.com', 'e8a6e80cd13f449bdae8c048ee2e7b9b', ''),
(88, 'Braun', 'Urs', 'Precious Collectables', 'BraunUrs@gmail.com', '0d178dd9904716651a1b0cd7c9882568', ''),
(89, 'Allen', 'Nelson', 'Collectables For Less Inc.', 'AllenNelson@gmail.com', '9c0ca0cabbd78a5a02bf8447347eced5', ''),
(90, 'Pascale ', 'Cartrain', 'Royale Belge', 'Pascale Cartrain@gmail.com', 'f26dd4bdace1c409b51e0b42c608afc5', ''),
(91, 'Georg ', 'Pipps', 'Salzburg Collectables', 'Georg Pipps@gmail.com', 'e658fabe1e43ecca3f369423617b431e', ''),
(92, 'Arnold', 'Cruz', 'Cruz & Sons Co.', 'ArnoldCruz@gmail.com', 'd24d17e38303040df00c574b151b424a', ''),
(93, 'Maurizio ', 'Moroni', 'L\'ordine Souveniers', 'Maurizio Moroni@gmail.com', '803c13e82a0b85ee85884c0f62ad1158', ''),
(94, 'Akiko', 'Shimamura', 'Tokyo Collectables, Ltd', 'AkikoShimamura@gmail.com', 'd3c949ed8236327a86635893e89e005a', ''),
(95, 'Dominique', 'Perrier', 'Auto Canal+ Petit', 'DominiquePerrier@gmail.com', '8eeaced1f2e0dfc753cc11e63b5abc12', ''),
(96, 'Rita ', 'Müller', 'Stuttgart Collectable Exchange', 'Rita Müller@gmail.com', 'ebf6a6a1870cf2c0922fa97fc3743c3f', ''),
(97, 'Sarah', 'McRoy', 'Extreme Desk Decorations, Ltd', 'SarahMcRoy@gmail.com', '28e5481a80aa2bd18c8cf35d0495980a', ''),
(98, 'Michael', 'Donnermeyer', 'Bavarian Collectables Imports, Co.', 'MichaelDonnermeyer@gmail.com', '3e06fa3927cbdf4e9d93ba4541acce86', ''),
(99, 'Maria', 'Hernandez', 'Classic Legends Inc.', 'MariaHernandez@gmail.com', 'cbc19b07662418d5f14cc55657295924', ''),
(100, 'Alexander ', 'Feuer', 'Feuer Online Stores, Inc', 'Alexander Feuer@gmail.com', 'e94377dc2a9cabd16fa3da5fe7049483', ''),
(101, 'Dan', 'Lewis', 'Gift Ideas Corp.', 'DanLewis@gmail.com', '97c8e6d0d14f4e242c3c37af68cc376c', ''),
(102, 'Martha', 'Larsson', 'Scandinavian Gift Ideas', 'MarthaLarsson@gmail.com', 'b4f89f6fa827db5b3ec395059765c714', ''),
(103, 'Sue', 'Frick', 'The Sharp Gifts Warehouse', 'SueFrick@gmail.com', '4eec8ecba9d91f00de594fa5267d1c88', ''),
(104, 'Roland ', 'Mendel', 'Mini Auto Werke', 'Roland Mendel@gmail.com', '1f227c72f3d205c1a118952bd259eeb9', ''),
(105, 'Leslie', 'Murphy', 'Super Scale Inc.', 'LeslieMurphy@gmail.com', '79338f7567adbd87a70fdacd50a980e0', ''),
(106, 'Yu', 'Choi', 'Microscale Inc.', 'YuChoi@gmail.com', '0af2884fd29ac4bed46fc56851d95768', ''),
(107, 'Martín ', 'Sommer', 'Corrida Auto Replicas, Ltd', 'Martín Sommer@gmail.com', '028b1d39c25e17f87eb1c5967886ea66', ''),
(108, 'Sven ', 'Ottlieb', 'Warburg Exchange', 'Sven Ottlieb@gmail.com', '5581e2eaee065e1c2dc6361a27916c6a', ''),
(109, 'Violeta', 'Benitez', 'FunGiftIdeas.com', 'VioletaBenitez@gmail.com', '1ebd356ce740fd46d0fcffb2e8e94988', ''),
(110, 'Carmen', 'Anton', 'Anton Designs, Ltd.', 'CarmenAnton@gmail.com', '7641b5b1c7276c07e11f9cb5b74ddfc9', ''),
(111, 'Sean', 'Clenahan', 'Australian Collectables, Ltd', 'SeanClenahan@gmail.com', '40d18d5a7ae85f9597a40f1306041fd1', ''),
(112, 'Franco', 'Ricotti', 'Frau da Collezione', 'FrancoRicotti@gmail.com', '99d2470a3073b4a570031f75896c6ac6', ''),
(113, 'Steve', 'Thompson', 'West Coast Collectables Co.', 'SteveThompson@gmail.com', '81b8a1b77068d06e1c8190825253066f', ''),
(114, 'Hanna ', 'Moos', 'Mit Vergnügen & Co.', 'Hanna Moos@gmail.com', '2b690749c7b699990636b17629f33168', ''),
(115, 'Alexander ', 'Semenov', 'Kremlin Collectables, Co.', 'Alexander Semenov@gmail.com', 'e94377dc2a9cabd16fa3da5fe7049483', ''),
(116, 'Raanan', 'Altagar,G M', 'Raanan Stores, Inc', 'RaananAltagar,G M@gmail.com', 'b9176d8e6876ad232f1cd07cc94e37b2', ''),
(117, 'José Pedro ', 'Roel', 'Iberia Gift Imports, Corp.', 'José Pedro Roel@gmail.com', 'a37256674f24c956a8cad4e61e2b61ff', ''),
(118, 'Rosa', 'Salazar', 'Motor Mint Distributors Inc.', 'RosaSalazar@gmail.com', '0856a4aa9c78d62f643a04c64bab47f2', ''),
(119, 'Sue', 'Taylor', 'Signal Collectibles Ltd.', 'SueTaylor@gmail.com', '4eec8ecba9d91f00de594fa5267d1c88', ''),
(120, 'Thomas ', 'Smith', 'Double Decker Gift Stores, Ltd', 'Thomas Smith@gmail.com', '381ab82c5e41c0d15eaa04e385676e0b', ''),
(121, 'Valarie', 'Franco', 'Diecast Collectables', 'ValarieFranco@gmail.com', '991470aff2d666b8b5094e0b32b69338', ''),
(122, 'Tony', 'Snowden', 'Kelly\'s Gift Shop', 'TonySnowden@gmail.com', 'eee7ac208064d408e84ab5e26d24b278', ''),
(123, 'Rahul', 'Sharma', 'sharmaji', 'sharma@gmail.com', '8e94f7d548d08db075ff38f9fbfc2db3', ''),
(124, 'Rahul', 'Sharma', 'sharmaji', 'rahul@gmail.com', '8e94f7d548d08db075ff38f9fbfc2db3', ''),
(125, 'Vijay', 'Sharma', 'vijay123', 'vijay@gmail.com', '4f9fecabbd77fba02d2497f880f44e6f', ''),
(126, 'Pankaj', 'Thakur', 'pankaj', 'pankaj@gmail.com', '95deb5011a8fe1ccf6552bb5bcda2ff0', ''),
(127, 'Vijender', 'Singh', 'vijender', 'vijender@gmail.com', '6c6a54f2b5645187504c4784b8ff5ed2', ''),
(128, 'Akshay', 'Kumar', 'kumar', 'akshay@gmail.com', '21b95a0f90138767b0fd324e6be3457b', ''),
(129, 'Narinder', 'kumar', 'kumarnarin', 'narin@gmail.com', '4297f44b13955235245b2497399d7a93', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subjectTitle` varchar(255) NOT NULL,
  `subjectDescription` varchar(255) NOT NULL,
  `subjectPracticalnumber` varchar(255) NOT NULL,
  `subjectTheoreticalnumber` varchar(255) NOT NULL,
  `subjectExaminationTime` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `subjectCreated_on` date NOT NULL,
  `subjectUpdated_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjectTitle`, `subjectDescription`, `subjectPracticalnumber`, `subjectTheoreticalnumber`, `subjectExaminationTime`, `Class`, `subjectCreated_on`, `subjectUpdated_on`) VALUES
(1, 'Physcics1', 'dshfjdhghfsdjf', '30', '70', 'May', '1', '2018-11-12', '2018-11-12'),
(2, 'Physcics', 'Hdgshv', '30', '70', 'May', '1', '2018-11-12', '0000-00-00'),
(4, 'Chemistry', 'Here You learn about chemistry', '30', '70', 'May', '7', '2018-11-12', '0000-00-00'),
(5, 'Computer', 'Here You learn about computer', '25', '75', 'May', '1', '2018-11-12', '0000-00-00'),
(6, 'Computer', 'Here You learn about computer', '25', '75', 'May', '7', '2018-11-12', '0000-00-00'),
(7, 'Computer', 'Here You learn about computer', '25', '75', 'May', '1', '2018-11-12', '0000-00-00'),
(8, 'Computer', 'Here You learn about computer', '25', '75', 'May', '1', '2018-11-12', '0000-00-00'),
(9, 'punjabi', 'are the best', '35', '45', 'May', '1', '2018-11-12', '2018-11-30'),
(10, 'English', 'Here You Learn about English', '10', '90', 'Dec', '8', '2018-11-13', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdo`
--
ALTER TABLE `pdo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pdo`
--
ALTER TABLE `pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
