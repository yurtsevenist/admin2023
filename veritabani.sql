-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 06 Ara 2023, 08:36:45
-- Sunucu sürümü: 5.7.40
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `webproje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `message` text COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `email`, `subject`, `message`, `date`, `status`) VALUES
(1, 'yurtsevenist@hotmail.com', 'deneme', 'fhgfjhuloşi', '2023-10-25 06:58:31', 0),
(2, 'alford77@example.com', 'deneme', 'sfgdtjyhku', '2023-12-06 07:27:53', 0),
(3, 'svstopal@gmail.com', 'şikayet', 'sfdrgh fdfyhjhgj fhghjh fghyghj fghjjkjö', '2023-12-06 08:20:13', 0),
(4, 'vfahey@example.org', 'dfhygjyk', 'ahjguıl erhy fhy  jgujghhjdrrtyf dryj vfnghj 5thgyjyj', '2023-12-06 08:20:38', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `who` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `who`, `status`, `date`) VALUES
(3, 'Mustafa Kemal Yurtseven', 'yurtsevenist@hotmail.com', '$2y$10$jSmo3EqqdOCmmdTzcibFwOGLw1iEoR1EXzywWw1x5BllvokKQXrAa', 0, 1, '2023-11-22 08:29:49'),
(4, 'Mustafa Yurtseven', 'yurtsevenist@gmail.com', '$2y$10$GYy9V3pyVaoXtAMW.eTJIudUs4CV3e//SXIf.ygWaGagBJMvzeFzK', 0, 1, '2023-11-22 10:52:08'),
(5, 'Mustafa Kemal Yurtseven', 'murat@hotmail.com', '$2y$10$Edy2VMVii6KrpPGgC976reOSfAUMRcVfwVAyDjamhrKMJY.9/slsm', 0, 1, '2023-11-29 08:20:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
