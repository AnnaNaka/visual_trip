-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 29, 2021 at 03:27 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visual_trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `user_id`, `photo_id`, `timestamp`) VALUES
(1, 'That\'s a beautiful photo! I want to go there!', 1, 7, '2021-01-28 16:29:12'),
(2, 'I have been there once but it was daytime, so I want to go there again at night.', 2, 23, '2021-01-28 16:33:05'),
(3, 'I love this photo.', 15, 23, '2021-01-29 00:39:53'),
(4, 'this is a sample comment', 2, 23, '2021-01-29 01:33:33'),
(5, 'this is a sample comment', 2, 23, '2021-01-29 01:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `first_name`, `last_name`, `username`, `email`, `content`, `time`) VALUES
(1, 'Anna', 'Nakashima', '', 'anakashima7185@mysvc.skagit.edu', 'hey', '2021-01-21 04:16:28'),
(2, 'Rachel', 'Daniel', '', 'rachel@aaa', 'hello', '2021-01-21 04:19:51'),
(3, 'Mayu', 'Nakagawa', 'mayu', 'mayuge@bbb', 'Hi', '2021-01-21 04:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Japan'),
(2, 'USA'),
(3, 'Philippines'),
(4, 'Canada'),
(5, 'China'),
(6, 'Australia'),
(7, 'Mexico');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `photo_source` varchar(100) NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  `photo_city` varchar(100) NOT NULL,
  `photo_description` text NOT NULL,
  `date_posted` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_source`, `photo_name`, `photo_city`, `photo_description`, `date_posted`, `user_id`, `country_id`, `timestamp`) VALUES
(1, 'the_blue_pond.jpg', 'The Blue Pond', 'Hokkaido', 'Shirogane Blue Pond was made by accident,as the by-product of attempts to control mudslides.Aluminium that has seeped into the water scatters the sunlight,causing the pond to look blue.', '2021-01-12', 1, 1, '2021-01-25 02:31:10'),
(3, 'antelope_canyon.jpg', 'Antelope Canyon', 'Arizona', 'Antelope Canyon is a slot canyon—and serious Instagram darling—in the American Southwest, just east of just east of Page, Arizona. The narrow, undulating spaces between rock formations allow for vivid patterns when sunlight filters through the striated stone.', '2021-01-13', 1, 2, '2021-01-21 04:31:59'),
(4, 'chocolate_hills.jpg', 'Chocolate Hills', 'Bohol', 'Among the top 10 beautiful places in the Philippines is the Chocolate Hills in Bohol. Its majestic views continue to draw attention across the world. There are more than 1,000 symmetrical mounds, conical and dome-shaped that most people liken them to Hershey’s Kisses. It is called the Chocolate Hills not because it’s made of chocolate but because of its color. Aside from the Chocolate Hills, you can also go to Pangalao, Bohol because it has one of the most beautiful beaches in the Philippines.', '2021-01-02', 1, 3, '2021-01-21 04:31:59'),
(7, 'istukushima-shrine.jpg', 'Itsukushima Shrine', 'Hiroshima', 'This small island off the coast of Hiroshima is known for its deer, bright autumn leaves and Itsukushima Shrine, a large Shinto structure with a grand vermillion torii gate standing in the ocean. Spend the whole day on the island to see the torii gate in both high and low tides: at high tide, the entire shrine seems to magically float in the blue water, while at low tide, you can walk all the way up to the gate.\r\n\r\nLong established as a place of Buddhist and Shinto worship, Itsukushima Shrine was founded in the year 593, and it is believed Miyajima is where the gods live. The island feels like a slice of paradise; you can spend the day frolicking with deer, hiking through maple leaves in the mountains or just sitting on the shore and watching the sun set behind the torii gate.', '2021-01-02', 2, 1, '2021-01-21 04:31:59'),
(10, 'niagara_falls.png', 'Niagara Falls', 'Ontario', 'Niagara', '2021-01-20', 1, 4, '2021-01-21 04:31:59'),
(11, 'Hinatuan-Enchanted-River.jpg', 'Hinatuan Enchanted River', 'Surigao del Sur', 'Arguably Mindanao’s most magnificent attraction and one of the most beautiful places in the Philippines, Hinatuan Enchanted River is a magically clear blue saltwater river hidden in the jungle, and flawlessly flowing into the Pacific Ocean.', '2021-01-18', 10, 3, '2021-01-21 04:31:59'),
(12, 'Banaue_Rice_Terraces.jpg', 'Banaue Rice Terraces', 'Ifugao', 'Rice paddies? There are lots of them in the Philippines and they are not ordinary! Ifugao Province presents you the Banaue Rice Terraces that everyone’s keep buzzing about! It is a UNESCO World Heritage Site that’s why Banaue Rice Terraces is one of the most beautiful places in the Philippines. Your journey won’t be easy though. Before you see its breathtaking beauty, you will have to go through a lot of hiking and trekking. But it will be so worth it!', '2021-01-18', 10, 3, '2021-01-21 04:31:59'),
(13, 'bantayan-island.jpg', 'Bantayan Island', 'Cebu', 'Cebu is a great place to travel to, and among the top tourist spots, there is the Bantayan Island. You can find some of the most beautiful beaches in the Philippines here. From the Virgin Island to Kota Beach, you will be amazed at how pristine these beaches are! And if you’re into seafood, this place is perfect because you can indulge yourself in an eat-all-you-can seafood for as low as P250 per person! ', '2021-01-19', 10, 3, '2021-01-21 04:31:59'),
(16, 'Great_Wall.jpg', 'The Great Wall of China', 'Northern China', 'Come face to face with one of the man-made wonders of the world, a World Heritage site and a marvel of engineering. This is the Great Wall of China, a 13.170 mile stretch of effort that started about 2,000 years ago during China\'s famous Warring States Period and helmed by the great and vicious first emperor of China, Qin Shi Huangdi. Though haggard with time at some areas of the wall, the Great Wall of China is a must visit due to its architectural grandeur and historical significance. Soak in the hustle and bustle of Beijing by staying at Millennium Hotels and Resorts before heading out to see the infamous Great Wall.', '2021-01-19', 13, 5, '2021-01-21 04:31:59'),
(17, 'sydney-harbour.jpg', 'Sydney Harbour', 'New South Wales', 'Sydney Harbour is considered by many to be one of the most beautiful harbors in the world. Crowned by the iconic Sydney Opera House and the Sydney Harbour Bridge, this famous body of water is the heart and soul of the city. Hop aboard a harbor cruise or ferry to explore its many secluded coves, tiny islands, and waterfront suburbs, or if you\'re feeling adventurous, sign up for the Sydney BridgeClimb adventure and admire stunning views from the top of its famous bridge.', '2021-01-20', 15, 6, '2021-01-21 04:35:46'),
(18, 'great-barrier-reef.jpg', 'Great Barrier Reef', 'Queensland', 'Shimmering in luminous turquoise water, the Great Barrier Reef in Queensland is the star tourist attraction in Australia. The only living thing visible from outer space, this 2,300-kilometer-long World Heritage-listed beauty is a fragile mosaic of coral cays; seagrass beds; mangroves; and tropical islands, like the idyllic Whitsunday Islands. SCUBA dive or snorkel in the warm, clear waters to see the colorful coral and fish up close, or hop aboard a helicopter or seaplane for a bird\'s-eye view.', '2021-01-22', 15, 6, '2021-01-22 02:28:38'),
(19, 'byron-bay.jpg', 'Byron Bay', 'New South Wales', 'Hip and happening but also beachy and beautiful, Byron Bay is a favorite Aussie holiday destination with a hippy vibe. This chic beach resort on the north coast of New South Wales is known for its picturesque surf-washed shoreline, yoga and health retreats, and funky markets. Inland, World Heritage-listed Wollumbin National Park offers even more of an escape for nature lovers, with waterfalls and rain forests. Be sure to hike the Cape Byron Track while you\'re here. It leads to the most easterly point in mainland Australia and its iconic lighthouse.', '2021-01-21', 15, 6, '2021-01-22 02:32:19'),
(21, 'motonosumi-inari-shrine.jpg', 'Motonosumi-inari Shrine', 'Yamaguchi', 'The 123 Torii gates stretches from the Motonosumi-Inari Shrine to the cliff overlooking the ocean. Motonosumi-Inari is a popular shrine where locals wish for success. The final Torii\'s donation box is placed out of reach at the top of the gate. It\'s believed that if you can successfully toss money into the box, all your wishes will come true.', '2021-01-13', 1, 1, '2021-01-26 04:49:06'),
(23, 'arches_national_park.jpg', 'Arches National Park', 'Utah', 'Delicate Arch is the icon, looping 65 feet out of an orange bluff according to its own invented axes, but every single hike in Arches National Park will show you something that changes your perspective: the metaphysics of Landscape Arch; a Courthouse and a Tower of Babel on Park Avenue; the lost souls in the Fiery Furnace. It’s all waiting, quietly, like an engineering project abandoned as impractical.', '2021-01-27', 13, 2, '2021-01-27 04:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(225) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `profile`, `bio`) VALUES
(1, 'Anna', 'Nakashima', 'anna', '$2y$10$Zbok2l8IozvQfsXQBAodxOzYVKkZmJFGv99rdfeY8q0I0N9e3znya', 'cat.jpg', 'I am Anna Nakashima. I am Japanese.'),
(2, 'Max', 'Ingles', 'max', '$2y$10$/q8YXqr1csgQ58g/drYly.7VivdP9C703rUyPlmZt7hXO3gPUmz5O', 'game.jpeg', 'My name is Max Ingles and I am a Junior Web Developer for Oswald Technologies. I am an accomplished coder and programmer, and I enjoy using my skills to contribute to the exciting technological advances that happen every day at Oswald Tech. I graduated from the California Institute of Technology in 2016 with a Bachelor\'s Degree in Software Development. While in school, I earned the 2015 Edmund Gains Award for my exemplary academic performance and leadership skills.'),
(10, 'Mayu', 'Nakagawa', 'mayu', '$2y$10$..kLoVje0cBNVPfR9/en9.kqpEFDNHR2g3dfTVuh8MekIErT.91Ym', NULL, 'Hello'),
(13, 'Hunter', 'Jackson', 'hunter', '$2y$10$.zw7gtWovb1.YDnDlwXdcurDyXHmXEf6uu.zkESXDRCcgonj.4o0e', '', ''),
(15, 'Diane', 'Johnson', 'diane', '$2y$10$6EfwtJJXgpSjbcSI00TvKuHB7rWWQo00XU59bTVrnsVKWqruv9z5e', 'woman.jpeg', NULL),
(16, 'Cameron', 'Mings', 'cameron', '$2y$10$4Ath0Tb7MIUmM.b2F4dsLO9R0yy3OCI02lmffwh2WYMsGhw7dTQQ.', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
