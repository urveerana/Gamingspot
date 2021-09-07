-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 07:44 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `uid` int(50) NOT NULL,
  `pid` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`uid`, `pid`, `name`, `quantity`, `price`, `image`) VALUES
(3, 3, 'PULSE 3D wireless headset', 1, 30, 'https://gmedia.playstation.com/is/image/SIEPDC/ps5-wireless-headset-image-block-01-en-13jun20?$1200px--t$');

-- --------------------------------------------------------

--
-- Table structure for table `customerfeedback`
--

CREATE TABLE `customerfeedback` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerfeedback`
--

INSERT INTO `customerfeedback` (`id`, `name`, `email`, `message`) VALUES
(1, '', 'abcd@dfx.com', 'hello'),
(2, 'qa', 'abcd@dfx.com', 'hello'),
(3, 'qa', 'abcd@dfx.com', 'hello'),
(4, 'qa', 'abcd@dfx.com', 'hello'),
(5, 'Tejashvi Patel', 'abcd@dfx.com', '123'),
(6, 'Teja', '123@gmail.com', '12334'),
(7, '123', '122@g.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(100) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` int(50) NOT NULL,
  `orderno` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `customername`, `email`, `address`, `phone`, `orderno`, `total`, `time`) VALUES
(1, 'tejas', '', '', 0, '202109035646', 50, '2021-09-03'),
(2, 'tejas', '', '', 0, '202109034594', 30, '2021-09-03'),
(3, 'tejas', '', '', 0, '202109038585', 280, '2021-09-03'),
(4, 'tejas', '', '', 0, '202109034076', 250, '2021-09-03'),
(5, 'tejas', '', '', 0, '202109041150', 20, '2021-09-04'),
(6, 'tejas', '', '', 0, '202109042830', 55, '2021-09-04'),
(7, 'tejas', '', '', 0, '202109053439', 149.95, '2021-09-05'),
(8, 'tejas', '', '', 0, '202109057080', 149.95, '2021-09-05'),
(9, 'tejas', '', '', 0, '202109067927', 437.94, '2021-09-06'),
(10, 'tejas', '', '', 0, '20210907729', 549.89, '2021-09-07'),
(11, 'tejas', '', '', 0, '202109078760', 549.89, '2021-09-07'),
(12, 'tejas', 'teja@gmail.com', 'washington dc', 2147483647, '202109071886', 39.99, '2021-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_category` varchar(25) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_desc`, `product_category`, `product_quantity`, `product_price`, `product_image`) VALUES
(1, 'DualSense wireless controller', 'Discover a deeper, highly immersive gaming experience1 with the innovative new PS5™ controller, featuring haptic feedback and dynamic trigger effects2. The DualSense wireless controller also includes a built-in microphone and create button, all integrated into an iconic, comfortable design.', 'Ps5', '178', '50', 'https://gmedia.playstation.com/is/image/SIEPDC/dualsense-group-shot-image-block-01-en-12may21?$800px--t$'),
(2, 'DualSense charging station', 'Charge up to two DualSense wireless controllers simultaneously without having to connect them to your PlayStation 5 console.', 'Ps5', '199', '250', 'https://cdn.shopify.com/s/files/1/0490/7312/7591/products/gaming-shop-canada-303575_800x.jpg?v=1611026728'),
(3, 'PULSE 3D wireless headset', 'Play in comfort with a wireless headset fine-tuned for 3D Audio on PS5 consoles2. Featuring USB Type-C  charging and dual noise-cancelling microphones, you can keep the party chat flowing with crystal-clear voice capture3.', 'Ps5', '120', '30', 'https://gmedia.playstation.com/is/image/SIEPDC/ps5-wireless-headset-image-block-01-en-13jun20?$1200px--t$'),
(4, 'Media remote', 'Conveniently control movies, streaming services4 and more on your PS5 console with an intuitive layout.', 'Ps5', '60', '20', 'https://gmedia.playstation.com/is/image/SIEPDC/media-remote-image-block-ps5-02-en-16sep20?$1200px--t$'),
(5, 'HD camera', 'Add yourself to your gameplay videos and broadcasts3 with smooth, sharp, full-HD capture.', 'Ps5', '137', '20', 'https://gmedia.playstation.com/is/image/SIEPDC/ps5-camera-image-block-01-en-13jun20?$1200px--t$'),
(7, 'Horizon Forbidden West', '\r\nJoin Aloy as she braves the Forbidden West - a majestic but dangerous frontier that conceals mysterious new threats.', 'Ps5', '0', '30', 'https://i.pinimg.com/736x/a5/19/69/a51969aa0ab16e1b0cf5d09712c64ec8.jpg'),
(8, 'Ratchet & Clank: Rift Apart', 'Blast your way through an interdimensional adventure with Ratchet and Clank.', 'Ps5', '89', '40', 'https://games4u.pk/wp-content/uploads/2021/06/9381270_R_Z001A-1.jpg'),
(11, 'Sackboy: A Big Adventure', 'Take Sackboy on an epic 3D platforming adventure with your friends.', 'Ps5', '90', '20', 'https://smartcdkeys.com/image/cache/data/products/Sackboy:%20A%20Big%20Adventure/cover/sackboy-a-big-adventure-ps5-smartcdkeys-cheap-cd-key-cover-390x580.png'),
(12, 'Watch Dogs Legion', 'Build a resistance from virtually anyone you see as you hack, infiltrate, and fight to take back a near-future London that is facing its downfall.', 'Ps4', '34', '55', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGTVj8_fOrMMVjyi3W570YLp6tvdITR3-jPQ&usqp=CAU'),
(13, 'Ps4 Console', 'The PlayStation 4 (PS4) is a home video game console developed by Sony Computer Entertainment. ', 'Ps4', '22', '399', 'https://wallpapercave.com/wp/wp7454724.jpg'),
(14, 'Assassins Creed Valhalla', 'Raid your enemies, grow your settlement and build your political power in the next chapter of the Assassin’s Creed series.', 'Ps4', '22', '64', 'https://media.gamestop.com/i/gamestop/11102095/Assassins-Creed-Valhalla-Gold-Edition-Steelbook'),
(15, 'God of War', 'Living as a man outside the shadow of the gods, Kratos must adapt to the unfamiliar Norse lands, unexpected threats, and a second chance at being a father.', 'Ps4', '35', '79', 'https://cdn.segmentnext.com/wp-content/uploads/2018/03/god-of-war-4-day-one-edition.jpg'),
(16, 'Ghost of Tsushima', 'From the creators of the inFamous series, experience feudal Japan like never before in a stunningly beautiful open-world action adventure set in the midst of a Mongol invasion. ', 'Ps4', '43', '56', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYOikg9pjz_nS4zF9nhN2U3zb937KKLkS8Fw&usqp=CAU'),
(17, 'Gran Turismo Sport\r\n', 'The award-winning Real Driving Simulator series speeds onto PlayStation 4 for the first time, putting you on course for high octane thrills to truly get your pulse racing.\r\n\r\n', 'Ps4', '0', '54', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAt408ZjzL0cT7k6w-ENMgdIedpmL-OmL_Dw&usqp=CAU'),
(19, 'DualShock 4 Wireless Controller for PlayStation 4', 'The DUALSHOCK 4 wireless controller features familiar PlayStation controls, and incorporates several innovative features to usher in a new era of interactive experiences. Its definitive analog sticks and trigger buttons have been improved for greater feel and sensitivity.', 'Ps4', '30', '70', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJeXVVKOG7m2kaaBrjsDRzWQeO1gDvHOjVag&usqp=CAU'),
(21, 'Xbox Series S Console', 'Combining speed and performance, the Xbox Series S console lets you play games your way. This all-digital gaming powerhouse features a custom 512GB SSD for fast gameplay and reduced load times. Enjoy 1440p gaming at up to 120fps, advanced 3D spatial sound, and more for an incredible experience. ', 'Xbox', '13', '498', 'https://compass-ssl.xbox.com/assets/2b/ba/2bbae9c6-b091-49f2-96b3-a8f0fa65eb86.png?n=0202999-ReadyForAction_Console-D.png'),
(22, 'Call Of Duty Cold War', 'The iconic Black Ops series is back with Call of Duty®: Black Ops Cold War - the direct sequel to the original and fan-favorite Call of Duty®: Black Ops. Come face-to-face with historical figures and hard truths, as you battle around the globe through iconic locales like East Berlin, Vietnam, Turkey, Soviet KGB headquarters, and more in the early 1980s.', 'Xbox', '24', '49', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSw38D8TUjs_S6y4Gqg2yCTqijq2UHL6vFXyQ&usqp=CAU'),
(23, 'Red Dead Redemption 2', 'America, 1899. After a robbery goes wrong in the town of Blackwater, Arthur Morgan and the Van der Linde gang are forced to flee. With federal agents and bounty hunters massing on their heels, the gang must rob, steal and fight their way to survive.', 'Xbox', '39', '40', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSySwSYBcJsHYUwZWUkGsJiC4Whjr4gzFsfcQ&usqp=CAU'),
(25, 'Xbox Controller', 'Experience the modernized design of the Xbox Wireless Controller in Electric Volt, featuring sculpted surfaces and refined geometry for enhanced comfort and effortless control during gameplay with battery usage up to 40 hours.', 'Xbox', '22', '76', 'https://blog.dayfire.com/wp-content/uploads/2014/01/xbox-360-controller.jpg'),
(26, 'Gear Tactics', 'Gears Tactics is the fast-paced, turn-based strategy game from one of the most-acclaimed video game franchises – Gears of War. Outnumbered and fighting for survival, recruit and command your squad to hunt down an evil mastermind who makes monsters.', 'Xbox', '0', '75', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmUwUAc4bb4vNJv5ZyMjXLNP2mM3eq3ymQbw&usqp=CAU'),
(31, 'Watch Dogs Legion', 'Watch Dogs: Legion is a 2020 action-adventure game developed by Ubisoft Toronto and published by Ubisoft.', 'Ps5', '10', '56', 'https://i5.walmartimages.ca/images/Enlarge/377/749/6000202377749.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(8, 't', 't@gmail.com', '$2y$10$ptKN3.K828emlDiohDxY...8.QIC9p2nxH.wonW835hwS/fwKaDii'),
(10, 'tejas', 'tejas@gmail.com', '$2y$10$L9o/B/foqorI9UuBUOLTWuPHPH4QxmvsgTstgGZ.5B05DI4w8M6nC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pid`,`uid`) USING BTREE;

--
-- Indexes for table `customerfeedback`
--
ALTER TABLE `customerfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerfeedback`
--
ALTER TABLE `customerfeedback`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
