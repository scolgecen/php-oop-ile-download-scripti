-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Tem 2017, 12:45:55
-- Sunucu sürümü: 5.6.26
-- PHP Sürümü: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `download`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dosyalar`
--

CREATE TABLE IF NOT EXISTS `dosyalar` (
  `dosya_id` int(11) NOT NULL,
  `dosya_baslik` varchar(255) DEFAULT NULL,
  `dosya_adi` varchar(32) DEFAULT NULL,
  `dosya_boyut` int(11) DEFAULT NULL,
  `dosya_indirilme` int(11) DEFAULT '0',
  `dosya_yukleyen` int(11) DEFAULT NULL,
  `dosya_eklenme` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dosya_mime` varchar(64) NOT NULL DEFAULT 'application/force-download'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `dosyalar`
--

INSERT INTO `dosyalar` (`dosya_id`, `dosya_baslik`, `dosya_adi`, `dosya_boyut`, `dosya_indirilme`, `dosya_yukleyen`, `dosya_eklenme`, `dosya_mime`) VALUES
(1, 'Talat Resim', 'talat.jpg', 17537, 0, 1, '2017-07-26 13:09:02', 'application/force-download'),
(2, 'Merve Resim', 'merve.jpg', 60538, 0, 2, '2017-07-26 13:09:30', 'application/force-download'),
(3, 'Onur Resim', 'onur.jpg', 27095, 0, 3, '2017-07-26 13:10:03', 'application/force-download'),
(4, 'Serdar Resim', 'serdar.jpg', 39422, 0, 3, '2017-07-26 13:10:15', 'application/force-download'),
(5, 'Default Resim', 'default_uye.jpg', 3421, 0, 1, '2017-07-26 13:11:20', 'application/force-download'),
(6, 'Sezer Resim', 'sezer.jpg', 13181, 0, 1, '2017-07-26 13:14:33', 'application/force-download'),
(7, 'Sercan Resim', 'sercan1.jpg', 107743, 0, 1, '2017-07-26 13:20:33', 'application/force-download'),
(8, 'Sercan Resim', 'sercan1.jpg', 107743, 0, 1, '2017-07-26 13:28:11', 'application/force-download'),
(9, 'Sercan Resim', 'sercan1.jpg', 107743, 0, 1, '2017-07-26 13:29:51', 'application/force-download'),
(10, 'asdasd', 'cheryYedekParca7.jpg', 208477, 0, 1, '2017-07-26 13:39:29', 'application/force-download'),
(11, 'dosyam 2', 'cheryYedekParca4.jpg', 316855, 0, 2, '2017-07-26 13:39:54', 'application/force-download'),
(12, 'asdasd', 'talat.jpg', 17537, 0, 1, '2017-07-26 13:42:55', 'application/force-download'),
(13, 'asdad', 'cheryYedekParca7.jpg', 208477, 0, 2, '2017-07-26 13:46:15', 'application/force-download'),
(14, 'rar dosyasi', 'Chronicle-master.zip', 765534, 0, 1, '2017-07-27 15:37:54', 'application/force-download'),
(15, 'Zip Dosyam', 'ci-registration-master.zip', 76310, 0, 1, '2017-07-27 17:06:14', 'application/force-download'),
(16, 'Zip Dosyam', 'Chronicle-master.zip', 765534, 0, 1, '2017-07-27 17:08:36', 'application/force-download'),
(17, 'Zip Dosyam', 'Chronicle-master.zip', 765534, 0, 1, '2017-07-27 17:09:50', 'application/force-download'),
(18, 'Zip 2', 'codeigniter-blog-master.zip', 742855, 0, 1, '2017-07-27 17:15:05', 'application/octet-stream'),
(19, 'chery Resim', 'cheryYedekParca5.jpg', 186911, 0, 1, '2017-07-27 17:15:27', 'image/jpeg'),
(20, 'cheryyedekparÃ§a3', 'cheryYedekParca3.jpg', 182764, 6, 1, '2017-07-30 08:09:05', 'image/jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) DEFAULT NULL,
  `kullanici_sifre` varchar(100) DEFAULT NULL,
  `kullanici_mail` varchar(100) DEFAULT NULL,
  `kullanici_yetki` enum('admin','default') DEFAULT 'default',
  `kullanici_kayit_tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_adi`, `kullanici_sifre`, `kullanici_mail`, `kullanici_yetki`, `kullanici_kayit_tarih`) VALUES
(1, 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 'admin', '2017-07-25 09:52:21'),
(2, 'Serdar', 'e10adc3949ba59abbe56e057f20f883e', 'serdar@gmail.com', 'default', '2017-07-25 09:52:24'),
(3, 'Onur', 'e10adc3949ba59abbe56e057f20f883e', 'onur@gmail.com', 'default', '2017-07-25 09:53:24'),
(6, 'Mehmet', 'e10adc3949ba59abbe56e057f20f883e', 'mehmet@gmail.com', 'default', '2017-07-30 09:49:17'),
(7, 'Hasan', 'e10adc3949ba59abbe56e057f20f883e', 'hasan@gmail.com', 'default', '2017-07-30 10:38:45');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `dosyalar`
--
ALTER TABLE `dosyalar`
  ADD PRIMARY KEY (`dosya_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `dosyalar`
--
ALTER TABLE `dosyalar`
  MODIFY `dosya_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
