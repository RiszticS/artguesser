-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Okt 17. 00:36
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `artguesser`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `nickname` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `listofpaintings`
--

CREATE TABLE `listofpaintings` (
  `title` varchar(60) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `painters`
--

CREATE TABLE `painters` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `birth` date NOT NULL,
  `death` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `painters`
--

INSERT INTO `painters` (`id`, `name`, `birth`, `death`) VALUES
(1, 'Sandro Botticelli', '1445-03-01', '1510-05-17'),
(2, 'Leonardo da Vinci', '1452-04-15', '1519-05-02'),
(3, 'Pablo Picasso', '1881-10-25', '1973-04-08'),
(4, 'Salvador Dalí', '1904-05-11', '1989-01-23'),
(5, 'Michelangelo Buonarroti', '1475-03-06', '1564-02-18'),
(6, 'Vincent van Gogh', '1853-03-30', '1890-07-29'),
(7, 'Edvard Munch', '1863-12-12', '1944-01-23'),
(8, 'Claude Monet', '1840-11-14', '1926-12-05'),
(9, 'Paul Cezanne', '1839-01-19', '1906-10-22'),
(10, 'Gustav Klimt', '1862-07-14', '1918-02-06'),
(11, 'Raffaello Sanzio', '1483-01-01', '1520-04-06'),
(12, 'Jan Vermeer van Delft', '1632-10-01', '1675-12-01'),
(13, 'Alexandre Cabanel', '1823-09-28', '1889-01-23'),
(14, 'Grant Wood', '1891-02-13', '1942-02-12'),
(15, 'Georges Seurat', '1859-12-02', '1891-03-29'),
(16, 'Pieter Bruegel', '1525-01-01', '1569-09-09'),
(17, 'Jean-Honoré Fragonard', '1732-04-05', '1806-08-22'),
(18, 'Diego Velázquez', '1599-06-06', '1660-08-06'),
(19, 'Szinyei Merse Pál', '1845-07-04', '1920-02-02');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `paintings`
--

CREATE TABLE `paintings` (
  `id` int(11) NOT NULL,
  `cim` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `source` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `painterId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `paintings`
--

INSERT INTO `paintings` (`id`, `cim`, `title`, `source`, `painterId`) VALUES
(1, 'Amerikai gótika', 'American Gothic', 'americangothic.png', 14),
(2, 'Csendélet almával és naranccsal', 'Apples and Oranges', 'applesandoranges.png', 9),
(3, 'Avignoni kisasszonyok', 'The Ladies of Avignon', 'avignoni.png', 3),
(4, 'Ádám teremtése', 'The Creation of Adam', 'creationofadam.png', 5),
(5, 'A bukott angyal', 'The Fallen Angel ', 'fallenangel.png', 13),
(6, 'Leány gyöngy fülbevalóval', 'Girl with a Pearl Earring', 'girlwithpearlearring.png', 12),
(7, 'Impresszió, a felkelő nap', 'Impression, Sunrise', 'impressionsunrise.png', 8),
(8, 'Mona Lisa', 'Mona Lisa', 'monalisa.png', 2),
(9, 'Az emlékezet állandósága', 'The Persistence of Memory', 'persistenceofmemory.png', 4),
(10, 'A tavasz', 'Primavera', 'primavera.png', 1),
(11, 'Sandro Botticelli', 'Sandro Botticelli', 'sandrobotticelli.png', 1),
(12, 'Csillagos éj', 'The Starry Night', 'starrynight.png', 6),
(13, 'Szent Antal megkísértése ', 'The Temptation of St. Anthony', 'temptationofsaintanthony.png', 4),
(14, 'A csók', 'The Kiss', 'thekiss.png', 10),
(15, 'A sikoly', 'The Scream', 'thescream.png', 7),
(16, 'Tavirózsák', 'Water Lilies', 'waterlillies.png', 8),
(17, 'A Galatea diadala', 'The Triumph of Galatea', 'triumphofgalatea.png', 11),
(18, 'Vénusz születése', 'The Birth of Venus', 'venusbirth.png', 1),
(19, 'Búzaföld ciprusokkal', 'Wheat Field with Cypresses							', 'wheatfieldwithcypresses.png						', 6),
(20, 'Az udvarhölgyek', 'Las Meninas											', 'lasmenias.png									', 18),
(21, 'Éjjeli kávézó', 'Café Terrace at Night								', 'cafeterraceatnight.png', 6),
(22, 'A japán nő', 'La Japonaise 										', 'lajaponais.png', 8),
(23, 'Vasárnap délután a La Grande Jatte szigeten', 'A Sunday Afternoon on the Island of La Grande Jatte	', 'asundayafternoonontheislandoflagrandejatte.png	', 15),
(24, 'Majális', 'Picnic in May										', 'majalis.png									', 19),
(25, 'Judith I.', 'Judith and the Head of Holofernes					', 'judith.png										', 10),
(26, 'Bábel tornya', 'The Tower of Babel									', 'thetowerofbabel.png							', 16),
(27, 'A hinta', 'The Swing											', 'theswing.png									', 17);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `painters`
--
ALTER TABLE `painters`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `paintings`
--
ALTER TABLE `paintings`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `painters`
--
ALTER TABLE `painters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `paintings`
--
ALTER TABLE `paintings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
