-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Nov 26. 15:56
-- Kiszolgáló verziója: 10.1.28-MariaDB
-- PHP verzió: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ingatlanok`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `berles`
--

CREATE TABLE `berles` (
  `berleti_dij` int(11) NOT NULL,
  `berles_kezdete` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `berles_vege` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `adoszam` int(11) NOT NULL,
  `lakasszam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `berles`
--

INSERT INTO `berles` (`berleti_dij`, `berles_kezdete`, `berles_vege`, `adoszam`, `lakasszam`) VALUES
(50000, '2000-10-10', '', 123456, 1),
(50000, '2000-10-10', '', 123456, 2),
(60000, '2015-10-10', '', 123456, 3),
(60000, '2001-03-01', '2010-10-10', 1234, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `epulet`
--

CREATE TABLE `epulet` (
  `epuletszam` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `epites_eve` int(11) NOT NULL,
  `emeletek_szama` int(11) NOT NULL,
  `telek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `epulet`
--

INSERT INTO `epulet` (`epuletszam`, `m2`, `epites_eve`, `emeletek_szama`, `telek_id`) VALUES
(1, 100, 1990, 2, 1),
(2, 200, 1970, 2, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `helyseg`
--

CREATE TABLE `helyseg` (
  `iranyitoszam` int(11) NOT NULL,
  `helyseg_nev` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `helyseg`
--

INSERT INTO `helyseg` (`iranyitoszam`, `helyseg_nev`) VALUES
(6795, 'Bordány'),
(6722, 'Szeged');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `lakas`
--

CREATE TABLE `lakas` (
  `lakasszam` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `emelet` int(11) NOT NULL,
  `szobak_szama` int(11) NOT NULL,
  `gepesitett` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `epuletszam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `lakas`
--

INSERT INTO `lakas` (`lakasszam`, `m2`, `emelet`, `szobak_szama`, `gepesitett`, `epuletszam`) VALUES
(1, 50, 1, 4, 'Igen', 1),
(2, 100, 2, 4, 'Nem', 1),
(3, 60, 2, 3, 'Igen', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szemely`
--

CREATE TABLE `szemely` (
  `adoszam` int(11) NOT NULL,
  `nev` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `telefonszam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `szemely`
--

INSERT INTO `szemely` (`adoszam`, `nev`, `email`, `telefonszam`) VALUES
(1234, 'Kiss János', 'valami@valami.hu', 9876542),
(123456, 'Nagy Béla', 'email@email.hu', 987654321);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `telek`
--

CREATE TABLE `telek` (
  `telek_id` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `utca` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `hazszam` int(11) NOT NULL,
  `iranyitoszam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `telek`
--

INSERT INTO `telek` (`telek_id`, `m2`, `utca`, `hazszam`, `iranyitoszam`) VALUES
(1, 200, 'Toldy', 1, 6795),
(2, 300, 'Vitéz', 2, 6795),
(3, 100, 'Jósika', 14, 6722);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `berles`
--
ALTER TABLE `berles`
  ADD KEY `berleti_dij` (`berleti_dij`),
  ADD KEY `berles_kezdete` (`berles_kezdete`),
  ADD KEY `berles_vege` (`berles_vege`),
  ADD KEY `adoszam` (`adoszam`),
  ADD KEY `lakasszam` (`lakasszam`);

--
-- A tábla indexei `epulet`
--
ALTER TABLE `epulet`
  ADD PRIMARY KEY (`epuletszam`),
  ADD KEY `epuletszam` (`epuletszam`),
  ADD KEY `m2` (`m2`),
  ADD KEY `epites_eve` (`epites_eve`),
  ADD KEY `emeletek_szama` (`emeletek_szama`),
  ADD KEY `telek_id` (`telek_id`);

--
-- A tábla indexei `helyseg`
--
ALTER TABLE `helyseg`
  ADD PRIMARY KEY (`iranyitoszam`),
  ADD KEY `iranyitoszam` (`iranyitoszam`),
  ADD KEY `helyseg_nev` (`helyseg_nev`);

--
-- A tábla indexei `lakas`
--
ALTER TABLE `lakas`
  ADD PRIMARY KEY (`lakasszam`),
  ADD KEY `lakasszam` (`lakasszam`),
  ADD KEY `m2` (`m2`),
  ADD KEY `emelet` (`emelet`),
  ADD KEY `szobak_szama` (`szobak_szama`),
  ADD KEY `gepesitett` (`gepesitett`),
  ADD KEY `epuletszam` (`epuletszam`);

--
-- A tábla indexei `szemely`
--
ALTER TABLE `szemely`
  ADD PRIMARY KEY (`adoszam`),
  ADD KEY `adoszam` (`adoszam`),
  ADD KEY `nev` (`nev`),
  ADD KEY `email` (`email`),
  ADD KEY `telefonszam` (`telefonszam`);

--
-- A tábla indexei `telek`
--
ALTER TABLE `telek`
  ADD PRIMARY KEY (`telek_id`),
  ADD KEY `telek_id` (`telek_id`),
  ADD KEY `m2` (`m2`),
  ADD KEY `utca` (`utca`),
  ADD KEY `hazszam` (`hazszam`),
  ADD KEY `iranyitoszam` (`iranyitoszam`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `berles`
--
ALTER TABLE `berles`
  ADD CONSTRAINT `berles_ibfk_3` FOREIGN KEY (`lakasszam`) REFERENCES `lakas` (`lakasszam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berles_ibfk_4` FOREIGN KEY (`adoszam`) REFERENCES `szemely` (`adoszam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `epulet`
--
ALTER TABLE `epulet`
  ADD CONSTRAINT `epulet_ibfk_1` FOREIGN KEY (`telek_id`) REFERENCES `telek` (`telek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `lakas`
--
ALTER TABLE `lakas`
  ADD CONSTRAINT `lakas_ibfk_1` FOREIGN KEY (`epuletszam`) REFERENCES `epulet` (`epuletszam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `telek`
--
ALTER TABLE `telek`
  ADD CONSTRAINT `telek_ibfk_1` FOREIGN KEY (`iranyitoszam`) REFERENCES `helyseg` (`iranyitoszam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
