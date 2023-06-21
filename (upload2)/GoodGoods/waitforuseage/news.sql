-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2016 at 02:35 AM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--
CREATE DATABASE IF NOT EXISTS `news` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `news`;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `author` varchar(10) NOT NULL DEFAULT '',
  `subject` tinytext NOT NULL,
  `content` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `author`, `subject`, `content`, `date`) VALUES
(38, 'May', '海底總動員2', '這次將以健忘的多莉為主軸，故事發生在尼莫返家後的六個月，一向什麼都記不起來的她突然受到記憶的衝擊，想起自己過往，所以多莉決定啟程尋找自己的家人，憑著僅存的記憶找到回家的路。', '2016-08-17 02:16:10'),
(37, '小東', '名偵探柯南', '名偵探柯南是日本漫畫家青山剛昌的著名推理漫畫作品及所有相關之出版物、電影等，劇中描述高中生偵探工藤新一因遭到灌藥導致身體縮小後，試圖調查黑暗組織與破獲各案件的故事。', '2016-08-17 02:15:37'),
(36, '阿寶', '臥虎藏龍開啟武俠電影新紀元', '國際知名導演李安的作品 "臥虎藏龍" 是第一部好萊塢投資的中國武俠電影，在台甫一推出便創下票房佳績。', '2016-08-17 02:14:45'),
(35, 'Marie', '秋天的童話', '秋天的童話是一個美麗純樸的少女、一個期待真愛的富家子弟、一個真心相待的青梅竹馬交織而成的美麗秋天童話，播出時間為 8 月 31 日起星期一到五晚間 10:00。', '2016-08-17 02:14:16'),
(34, 'Jerry', '天搖地動', '"天搖地動" 電影描述的是 1991 年 10 月漁船安麗雅號為了增加漁獲量，於是開往弗萊明角，未料當地氣象預告超級颶風葛瑞斯正在接近中，安麗雅號與其它船隻即將面臨前所未有的危機。', '2016-08-17 02:13:10'),
(32, '小倩', 'AKB48姊妹團體', 'AKB48獲得成功後，秋元康以類似模式於日本其它都市與海外成立SKE48、SDN48、NMB48、HKT48、NGT48、JKT48、SNH48等姊妹團體，朝向不同市場發展。', '2016-08-17 02:11:59'),
(33, '小明', '猜猜小叮噹的身高', '您知道小叮噹的身高和體重是一樣的數字嗎? 這是我在電視節目上看到的，答案是129.3喔。', '2016-08-17 02:12:31'),
(31, '小倩', 'AKB48', 'AKB48是日本大型女子偶像團體，成立於2005年12月8日，其團名取自東京的秋葉原，在秋葉原擁有專屬表演劇場，以「可以面對面的偶像」為理念，幾乎每天在劇場進行公演。', '2016-08-17 02:11:33'),
(30, 'Jerry', '冰雪奇緣', '冰雪奇緣是由迪士尼電影公司發行，取材自安徒生童話故事《冰雪女王》，該片連續贏得第71屆金球獎最佳動畫片、第41屆安妮奬最佳動畫電影、第67屆英國電影學院獎最佳動畫電影，以及第86屆奧斯卡金像獎最佳動畫長片和最佳原創歌曲。', '2016-08-17 02:11:03'),
(29, 'Grace', '動物方城市', '動物方城市是迪士尼影業所發行的3D動畫電影，故事的背景設定在一個哺乳動物所居住的大城市，主角兔子女警和街頭行騙高手狐狸合作解開一樁肉食動物失蹤案，並揭發背後的陰謀。', '2016-08-17 02:10:35'),
(28, '小丸子', '六月天演唱會免費聽', '知名的六月天樂團將於 8/31 舉行新歌免費聽演唱會，一張專輯可以換一張票，北中南各限量 1000 張，有沒有人要一起去排隊？', '2016-08-17 02:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `reply_message`
--

CREATE TABLE `reply_message` (
  `id` int(11) NOT NULL,
  `author` varchar(10) NOT NULL DEFAULT '',
  `subject` tinytext NOT NULL,
  `content` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reply_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply_message`
--

INSERT INTO `reply_message` (`id`, `author`, `subject`, `content`, `date`, `reply_id`) VALUES
(10, 'Marie', '一起去排隊', '我要一起去排隊, 時間和地點呢?', '2016-08-17 02:25:56', 28),
(11, '小丸子', '時間和地點', '8/25中午12:00在西門町紅樓門口', '2016-08-17 02:27:55', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_message`
--
ALTER TABLE `reply_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `reply_message`
--
ALTER TABLE `reply_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
