-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 10:27 PM
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
(1, 'DualSense wireless controller', 'Discover a deeper, highly immersive gaming experience1 with the innovative new PS5™ controller, featuring haptic feedback and dynamic trigger effects2. The DualSense wireless controller also includes a built-in microphone and create button, all integrated into an iconic, comfortable design.', 'Ps5', '200', '50', 'https://gmedia.playstation.com/is/image/SIEPDC/dualsense-group-shot-image-block-01-en-12may21?$800px--t$'),
(2, 'DualSense charging station', 'Charge up to two DualSense wireless controllers simultaneously without having to connect them to your PlayStation 5 console.', 'Ps5', '200', ' 250', 'https://cdn.shopify.com/s/files/1/0490/7312/7591/products/gaming-shop-canada-303575_800x.jpg?v=1611026728'),
(3, 'PULSE 3D wireless headset', 'Play in comfort with a wireless headset fine-tuned for 3D Audio on PS5 consoles2. Featuring USB Type-C  charging and dual noise-cancelling microphones, you can keep the party chat flowing with crystal-clear voice capture3.', 'Ps5', '120', '30', 'https://gmedia.playstation.com/is/image/SIEPDC/ps5-wireless-headset-image-block-01-en-13jun20?$1200px--t$'),
(4, 'Media remote', 'Conveniently control movies, streaming services4 and more on your PS5 console with an intuitive layout.', 'Ps5', '60', '20', 'https://gmedia.playstation.com/is/image/SIEPDC/media-remote-image-block-ps5-02-en-16sep20?$1200px--t$'),
(5, 'HD camera', 'Add yourself to your gameplay videos and broadcasts3 with smooth, sharp, full-HD capture.', 'Ps5', '140', '20', 'https://gmedia.playstation.com/is/image/SIEPDC/ps5-camera-image-block-01-en-13jun20?$1200px--t$'),
(6, 'Marvel\'s Spider-Man: Miles Morales', 'Experience the rise of Miles Morales as the new hero masters incredible, explosive new powers to become his own Spider-Man.', 'Ps5', '80', '100', 'https://terrigen-cdn-dev.marvel.com/content/prod/1x/msmmm_lob_crd_02.jpg'),
(7, 'Horizon Forbidden West', '\r\nJoin Aloy as she braves the Forbidden West - a majestic but dangerous frontier that conceals mysterious new threats.', 'Ps5', '100', '30', 'https://i.pinimg.com/736x/a5/19/69/a51969aa0ab16e1b0cf5d09712c64ec8.jpg'),
(8, 'Ratchet & Clank: Rift Apart', 'Blast your way through an interdimensional adventure with Ratchet and Clank.', 'Ps5', '90', '40', 'https://games4u.pk/wp-content/uploads/2021/06/9381270_R_Z001A-1.jpg'),
(11, 'Sackboy: A Big Adventure', 'Take Sackboy on an epic 3D platforming adventure with your friends.', 'Ps5', '90', '20', 'https://smartcdkeys.com/image/cache/data/products/Sackboy:%20A%20Big%20Adventure/cover/sackboy-a-big-adventure-ps5-smartcdkeys-cheap-cd-key-cover-390x580.png'),
(12, 'Demon\'s Souls', 'Entirely rebuilt from the ground up, this remake invites you to experience the unsettling story and ruthless combat of Demon’s Souls™', 'Ps4', '90', ' 15', 'https://media.4rgos.it/i/Argos/8328461_R_Z001A?w=750&h=440&qlt=70'),
(13, 'Destruction AllStars', 'Pile on the destruction from behind the wheel or on-foot in the global phenomenon that is Destruction AllStars.', 'Ps4', '40', '25', 'https://smartcdkeys.com/image/cache/data/products/destruction-allstars-ps5/cover/destruction-allstars-ps5-smartcdkeys-cheap-cd-key-cover-390x580.png');

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
(3, 'tejas', '123@gmail.com', '$2y$10$GkgTU.SxK1QApDne7Mrgg.y1cVWgzOZbyXFw4NB8F/vujRNDuXugi'),
(8, 't', 't@gmail.com', '$2y$10$ptKN3.K828emlDiohDxY...8.QIC9p2nxH.wonW835hwS/fwKaDii');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pid`,`uid`) USING BTREE;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
