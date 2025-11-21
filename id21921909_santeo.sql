-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2024 at 01:18 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21921909_santeo`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted`
--

CREATE TABLE `accepted` (
  `idA` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `idH` int(11) NOT NULL,
  `dateR` date NOT NULL,
  `idS` int(11) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted`
--

INSERT INTO `accepted` (`idA`, `idP`, `idH`, `dateR`, `idS`, `code`) VALUES
(27, 5, 2, '2024-02-25', 7, '0rWidaltcj'),
(28, 5, 2, '2024-02-29', 8, 'bQwFjf2dsa'),
(29, 5, 3, '2024-02-14', 5, 'HzSQsuF87v');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `contenu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `titre`, `date`, `contenu`) VALUES
(1, 'MAROUANE', '2024-02-28', 'DAZDZADZAD'),
(2, 'dazdzad', '2023-06-01', 'zadzadzadazdzad'),
(3, 'corona', '2024-02-16', 'Corona is a brand of beer produced in multiple breweries in Mexico and exported to markets around the world. Constellation Brands is the exclusive licensee and sole importer of Corona in the fifty states of the United States, Washington, D.C., and Guam. Wikipedia'),
(4, 'MAROUANE', '2024-02-23', 'VISCA BARCA'),
(5, 'maladie', '2024-02-27', 'le malade est un malade qui est malade\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `idCH` int(11) NOT NULL,
  `fromC` varchar(11) NOT NULL,
  `toC` varchar(100) NOT NULL,
  `conten` varchar(3000) NOT NULL,
  `dateC` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`idCH`, `fromC`, `toC`, `conten`, `dateC`) VALUES
(154, '5', 'admin', 'SS', '2024-02-25 12:35:15'),
(155, 'admin', '5', 'SS', '2024-02-25 12:35:51'),
(156, 'admin', '5', 'XQ', '2024-02-25 18:02:29'),
(157, 'admin', '5', 'XQ', '2024-02-25 18:02:29'),
(158, 'admin', '5', 'SALAM AJI NHAR TNIN M\"A RAB3A', '2024-02-25 18:02:45'),
(159, 'admin', '5', 'aji nhar larb3', '2024-02-27 09:33:03'),
(160, '5', 'admin', 'la majayx', '2024-02-27 09:33:18'),
(161, '11', 'admin', 'salam admin ', '2024-02-27 09:41:52'),
(162, 'admin', '11', 'عليكم السلام', '2024-02-27 09:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `idC` int(11) NOT NULL,
  `nameC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`idC`, `nameC`) VALUES
(1, 'Agadir'),
(2, 'Al Hoceima'),
(3, 'Asilah'),
(4, 'Azemmour'),
(5, 'Azrou'),
(6, 'Beni Mellal'),
(7, 'Benslimane'),
(8, 'Berkane'),
(9, 'Berrechid'),
(10, 'Boujdour'),
(11, 'Boulemane'),
(12, 'Casablanca'),
(13, 'Chefchaouen'),
(14, 'Dakhla'),
(15, 'El Aioun'),
(16, 'El Hajeb'),
(17, 'El Jadida'),
(18, 'Errachidia'),
(19, 'Essaouira'),
(20, 'Fes'),
(21, 'Fnideq'),
(22, 'Guelmim'),
(23, 'Ifrane'),
(24, 'Kenitra'),
(25, 'Khemisset'),
(26, 'Khenifra'),
(27, 'Khouribga'),
(28, 'Ksar El Kebir'),
(29, 'Laayoune'),
(30, 'Larache'),
(31, 'Marrakech'),
(32, 'Martil'),
(33, 'Meknes'),
(34, 'Mohammedia'),
(35, 'Nador'),
(36, 'Ouarzazate'),
(37, 'Ouezzane'),
(38, 'Oujda'),
(39, 'Rabat'),
(40, 'Safi'),
(41, 'Sale'),
(42, 'Settat'),
(43, 'Sidi Ifni'),
(44, 'Sidi Kacem'),
(45, 'Sidi Slimane'),
(46, 'Skhirate'),
(47, 'Tangier'),
(48, 'Tan-Tan'),
(49, 'Taroudant'),
(50, 'Taza'),
(51, 'Tetouan'),
(52, 'Tiflet'),
(53, 'Tiznit'),
(54, 'Zagora');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `idH` int(11) NOT NULL,
  `nomH` varchar(100) NOT NULL,
  `adresseH` varchar(100) NOT NULL,
  `idC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`idH`, `nomH`, `adresseH`, `idC`) VALUES
(2, 'العيون -  مستشفى مولاي الحسن بن المهدي', 'rue el massira', 29),
(3, 'العيون - مستشفى الحسن الثاني ', 'avenue el samara', 29);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `idP` int(11) NOT NULL,
  `prenomP` varchar(100) NOT NULL,
  `nomP` varchar(100) NOT NULL,
  `emailP` varchar(100) NOT NULL,
  `passwordP` varchar(100) NOT NULL,
  `teleP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`idP`, `prenomP`, `nomP`, `emailP`, `passwordP`, `teleP`) VALUES
(5, 'MAROUANE', 'el wali', 'marouaneelwali2004@gmail.com', 'marouane', 2147483647),
(7, 'Brahim', 'Boulakram', 'brahim@gmail.com', 'Brahim', 729191919),
(10, 'riad ', 'chaabi ', 'riadchaabi95@gmail.com', 'Riad05072005', 13),
(11, 'QZERFTGFYJ', 'ZERTYGK', 'ZERDFTGYUT@AZQERSTDYFGU', 'AYOUB', 12345675);

-- --------------------------------------------------------

--
-- Table structure for table `randez`
--

CREATE TABLE `randez` (
  `idR` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `idH` int(11) NOT NULL,
  `dateR` date NOT NULL,
  `idS` int(11) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `randez`
--

INSERT INTO `randez` (`idR`, `idP`, `idH`, `dateR`, `idS`, `code`) VALUES
(53, 10, 3, '2024-03-01', 4, 'cXwbR0W2Fa'),
(56, 5, 3, '2024-02-25', 11, 'cKQOc3vLzz'),
(57, 7, 3, '2024-02-26', 5, 'z9nhumAnYM');

-- --------------------------------------------------------

--
-- Table structure for table `specialite`
--

CREATE TABLE `specialite` (
  `idS` int(11) NOT NULL,
  `nomS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialite`
--

INSERT INTO `specialite` (`idS`, `nomS`) VALUES
(1, 'جراحة الأطفال'),
(2, 'جراحة البطن'),
(3, 'طب الغدد'),
(4, 'طب الأطفال'),
(5, 'قبل التخدير'),
(6, 'طب المسالك البولية'),
(7, 'طب النفس'),
(8, 'طب الروماتيزم'),
(9, 'أمراض الرئة'),
(10, 'طب الكلي'),
(11, 'أمراض النساء والتوليد'),
(12, 'جراحة الكسور'),
(13, 'حمية'),
(14, 'أمراض الدم'),
(15, 'جراحة القلب والأوعية الدموية');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted`
--
ALTER TABLE `accepted`
  ADD PRIMARY KEY (`idA`),
  ADD KEY `idH` (`idH`),
  ADD KEY `idP` (`idP`),
  ADD KEY `idS` (`idS`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idCH`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`idC`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`idH`),
  ADD KEY `idC` (`idC`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idP`);

--
-- Indexes for table `randez`
--
ALTER TABLE `randez`
  ADD PRIMARY KEY (`idR`),
  ADD KEY `idH` (`idH`),
  ADD KEY `idP` (`idP`),
  ADD KEY `idS` (`idS`);

--
-- Indexes for table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`idS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted`
--
ALTER TABLE `accepted`
  MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `idCH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `idH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `randez`
--
ALTER TABLE `randez`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accepted`
--
ALTER TABLE `accepted`
  ADD CONSTRAINT `accepted_ibfk_1` FOREIGN KEY (`idH`) REFERENCES `hospital` (`idH`),
  ADD CONSTRAINT `accepted_ibfk_2` FOREIGN KEY (`idP`) REFERENCES `patient` (`idP`),
  ADD CONSTRAINT `accepted_ibfk_3` FOREIGN KEY (`idS`) REFERENCES `specialite` (`idS`);

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `cities` (`idC`);

--
-- Constraints for table `randez`
--
ALTER TABLE `randez`
  ADD CONSTRAINT `randez_ibfk_1` FOREIGN KEY (`idH`) REFERENCES `hospital` (`idH`),
  ADD CONSTRAINT `randez_ibfk_2` FOREIGN KEY (`idP`) REFERENCES `patient` (`idP`),
  ADD CONSTRAINT `randez_ibfk_3` FOREIGN KEY (`idS`) REFERENCES `specialite` (`idS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
