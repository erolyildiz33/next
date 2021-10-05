-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 Eki 2021, 00:03:24
-- Sunucu sürümü: 5.7.31-log
-- PHP Sürümü: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `next`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tc` varchar(11) NOT NULL,
  `isimsoyad` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `yetki` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `username`, `password`, `tc`, `isimsoyad`, `tel`, `yetki`) VALUES
(137, '7af3587f13e8778d5ae9e276ffc870a2', 'c4ca4238a0b923820dcc509a6f75849b', '18103239142', 'Erol YILDIZ', '5313856827', 'Admin'),
(191, '6edfe0531855295c5541d2666d604463', 'e859d27fd6cb58472848217637899d4d', '22222222222', 'deneme dene1', '5313856827', 'Admin'),
(192, 'f53643d8791a81f0421949222bd30b0c', '4810997a689061994556b3bed87093ea', '22222222223', 'deneme dene2', '5313856827', 'Admin'),
(193, 'c74c3c7aec5d8624d66c803873ba4433', 'a7fe72d5fdb748a9322bba111169f577', '22222222224', 'deneme dene3', '5313856827', 'User'),
(194, 'f0294e2065322c3e41e21fc259bdd15c', 'deca799317796424660e09ab79002624', '22222222225', 'deneme dene4', '5313856827', 'User');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `masalar`
--

CREATE TABLE `masalar` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `masalar`
--

INSERT INTO `masalar` (`id`, `ad`) VALUES
(1, 'Masa 1'),
(2, 'Masa 2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `id` int(11) NOT NULL,
  `adsoy` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `unvan` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `sirket` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `eposta` varchar(60) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `gsm1` varchar(10) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `gsm2` varchar(10) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `istel` varchar(10) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `isadres` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kisinot` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`id`, `adsoy`, `unvan`, `sirket`, `eposta`, `gsm1`, `gsm2`, `istel`, `isadres`, `kisinot`, `resim`) VALUES
(1, 'Erol YILDIZ', '', 'Mezitli Belediyesi', 'erolyildiz@mezitli.bel.tr', '5313856827', '', '', 'mezitli', 'özel', ''),
(2, 'Erol YILDIZ', '', 'Mezitli Belediyesi', 'erolyildiz@mezitli.bel.tr', '5313856827', '', '', 'mezitli', 'özel', ''),
(7, '', '', '', '', '', '', '', '', '', 'foto.png'),
(8, '', '', '', '', '', '', '', '', '', '20171225013600.png'),
(9, '', '', '', '', '', '', '', '', '', '20171225013639.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon`
--

CREATE TABLE `rezervasyon` (
  `id` int(11) NOT NULL,
  `adsoy` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `masaid` int(10) NOT NULL,
  `mesaj` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `saat` time NOT NULL,
  `k_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kul_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `rezervasyon`
--

INSERT INTO `rezervasyon` (`id`, `adsoy`, `tel`, `masaid`, `mesaj`, `tarih`, `saat`, `k_tarih`, `kul_id`) VALUES
(1, 'sadas', '5315555555', 2, '', '2005-10-20', '04:00:00', '2021-10-05 23:58:26', 137);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Tablo için indeksler `masalar`
--
ALTER TABLE `masalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rezervasyon`
--
ALTER TABLE `rezervasyon`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- Tablo için AUTO_INCREMENT değeri `masalar`
--
ALTER TABLE `masalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon`
--
ALTER TABLE `rezervasyon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
