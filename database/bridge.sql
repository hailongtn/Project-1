DROP DATABASE IF EXISTS bridge;

CREATE DATABASE bridge;

use bridge;

CREATE TABLE `info` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1= active. 0= Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_emailid` varchar(255) DEFAULT NULL,
  `user_type` int DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
INSERT INTO `admin` (`id`, `admin_username`, `admin_password`, `admin_emailid`, `user_type`, `creation_date`, `updation_date`) VALUES
(1, 'admin', '123', 'admin@gmail.com', 1, '2024-12-12 18:30:00', '2024-12-12 07:16:37'),
(2, 'admin1', '123', 'admin1@gmail.com', 1, '2024-12-12 18:30:00', '2024-12-12 07:16:37');

--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `posting_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
INSERT INTO `category` (`id`, `category_name`, `description`, `posting_date`, `updation_date`, `is_active`) VALUES
(1, 'Longest Bridge', 'Longest Bridge', '2024-12-13 17:26:13', '2024-12-13 17:41:07', 1),
(2, 'Highest Bridge', 'Highest Bridge', '2024-12-13 17:36:33', NULL, 1),
(3, 'Oldest Bridge', 'Oldest Bridge', '2024-12-13 17:36:50', NULL, 1),
(4, 'Great Historical Bridge', 'Great Historical Bridge', '2024-12-13 17:37:23', NULL, 1),
(5, 'Iconic Bridge', 'Iconic Bridge', '2024-12-13 17:37:48', NULL, 1),
(6, 'Modern Bridge', 'Modern Bridge', '2024-12-16 11:32:39', NULL, 1);
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `post_id` int DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext,
  `posting_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--




--
-- Table structure for table `pages`  
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `page_name` varchar(200) DEFAULT NULL,
  `page_title` mediumtext,
  `description` longtext,
  `posting_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--



-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `post_title` longtext,
  `category_id` int DEFAULT NULL,
  `subcategory_id` int DEFAULT NULL,
  `post_details` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `posting_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int DEFAULT NULL,
  `post_url` mediumtext,
  `post_image` varchar(255) DEFAULT NULL,
  `view_counter` int DEFAULT NULL,
  `posted_by` varchar(255) DEFAULT NULL,
  `last_updatedby` varchar(255) DEFAULT NULL,
  `post_description` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
INSERT INTO `posts` VALUES (1,' Danyang Kunshan Grand Bridge  ',1,1,'Danyang Kunshan Grand Bridge, the longest bridge in the world, is situated in China, along the high-speed railway line that links Beijing and Shanghai. So it is in the eastern coastal area of China. We should point out that a further 2 bridges ranked among the top 10 longest bridges in the world are also located along this railway that has been so crucial in China’s development over recent years. More specifically, the Danyang Kunshan Grand Bridge is in the province of Jiangsu and links the cities of Danyang and Kunshan. The bridge was designed to span a large marshy area that made the journey much longer before the construction of the bridge. Along its route between Danyang and Kunshan, the bridge also crosses the Yangchen lake, with a 9-kilometre stretch over the water (for the purposes of comparison, the proposed bridge over the Strait of Messina would be just 3 kilometres long, although that involves a stretch of sea rather than a lake). And in fact, the longest bridge crossing over sea is also in China: that is the bridge that links Hong Kong, Zhuhai and Macau.\r\n\r\nThe length of the Danyang Kunshan Grand Bridge\r\nAs we noted above, the Danyang Kunshan Grand Bridge is 164 kilometres long in total. This means that the viaduct covers a distance equal to that between Modena and Milan. And speaking of Italy, the longest viaduct there is the Coltano viaduct on the A12 Motorway, covering a total distance of 9.6 kilometres. The height of the longest bridge in the world does not smash any other records though, since the average height it reaches along its route is about 30 metres. Passengers travelling on the train that links Danyang and Kunshan will be able to enjoy truly spectacular views of the landscape: apart from the waters of Yangchen Lake, they will also cross several rivers and canals, not to mention paddy-fields, as it runs along parallel to the river Yangtze. In fact, the viaduct runs alongside this famous river at distances that vary between 8 and 80 kilometres.','2024-12-21 13:13:41','2024-12-21 13:14:10',1,'-Danyang-Kunshan-Grand-Bridge--','f3ccdd27d2000e3f9255a7e3e2c48800.jpg',2,'admin',NULL,'Danyang Kunshan Grand Bridge Longest Bridge on Top 10'),(2,'Changhua–Kaohsiung Viaduct (Taiwan)',1,1,'The Changhua–Kaohsiung Viaduct, completed in 2004, is a significant component of Taiwan High-Speed Rail (THSR) network. Spanning approximately 157.3 kilometers (97.8 miles), it ranks as the world second-longest bridge.<br>\r\n<h3>Route and Stations</h3><br>\r\nThis viaduct connects Baguashan in Changhua County to Zuoying in Kaohsiung, traversing diverse terrains, including urban and rural areas. Key stations along this route include Changhua, Yunlin, Chiayi, and Tainan, all situated on the viaduct. <br>\r\n<h3>Design and Engineering</h3><br>\r\nEngineered with seismic resilience in mind, the viaduct is designed to withstand earthquakes, allowing trains to halt safely during seismic events and ensuring that any damage remains localized and repairable. This design is crucial given Taiwan seismic activity. <br>\r\n<h3>Operational Significance</h3><br>\r\nSince its inauguration, the Changhua–Kaohsiung Viaduct has been integral to Taiwan transportation infrastructure, facilitating efficient travel between major cities and contributing to the  role in enhancing regional connectivity. By December 2012, over 200 million passengers had traveled over this viaduct, underscoring its importance in daily commutes and long-distance travel. <br>\r\nIn summary, the Changhua–Kaohsiung Viaduct stands as a testament to modern engineering, playing a pivotal role in Taiwan high-speed rail system and exemplifying advancements in bridge construction and seismic safety.\r\n\r\n','2024-12-21 21:57:26','2024-12-22 18:53:16',1,'Changhua–Kaohsiung-Viaduct-(Taiwan)','156005c5baf40ff51a327f1c34f2975b.jpg',2,'admin','admin','Changhua–Kaohsiung Viaduct (Taiwan)'),(3,'Tower Bridge: London Iconic Engineering Marvel',5,22,'           Tower Bridge is one of London most iconic landmarks, combining Victorian engineering with Gothic design. Spanning the River Thames, it connects the boroughs of Tower Hamlets and Southwark near the Tower of London, from which it takes its name.\r\n<br>\r\n\r\n <h3>History and Design<br></h3>\r\n•	Construction: Tower Bridge was built between 1886 and 1894. It was designed to ease congestion and provide access to the growing East End of London while allowing tall ships to pass beneath it.<br>\r\n•	Architect and Engineer: The design was created by architect Sir Horace Jones and engineer Sir John Wolfe Barry.<br>\r\n•	Style: The bridge combines bascule (movable) sections with suspension bridge elements and features Gothic-style towers and ornamentation.<br>\r\n•	Material: It was constructed using over 11,000 tons of steel and clad in Cornish granite and Portland stone for a decorative and durable finish.<br>\r\n<h3>Features</h3><br>\r\n•	Bascule Mechanism: The bridge central spans are bascules (drawbridges) that can be raised to allow ships to pass. Originally operated by a hydraulic system powered by steam, the mechanism was later converted to oil and electricity.<br>\r\n•	Walkways: Elevated pedestrian walkways connect the two towers, providing stunning views of London. These were initially closed due to low usage but reopened as part of the T
ower Bridge Exhibition in 1982.<br>\r\n•	Tower Bridge Exhibition: Visitors can explore the engine rooms, historical displays, and glass-floor sections in the walkways for a unique experience.<br>\r\n<h3>Fun Facts</h3>\r\n•	Lifting Schedule: The bascules are lifted approximately 800 times a year. Ships must book 24 hours in advance to pass.<br>\r\n•	Name Confusion: It is often mistakenly referred to as London Bridge, but they are separate structures, with London Bridge located further upstream.<br>\r\n•	Cultural Impact: Tower Bridge has appeared in numerous movies, TV shows, and events, symbolizing London worldwide.<br>\r\n<h3>Visiting Information</h3>\r\n•	Location: Situated near landmarks like the Tower of London and City Hall.<br>\r\n•	Accessibility: Open to pedestrians and vehicles, with a separate entrance for the Tower Bridge Exhibition.<br>\r\n•	Opening Hours: Typically open daily for visitors, though hours may vary for special events or maintenance<br>\r\n','2024-12-21 22:22:14','2024-12-22 19:01:35',1,'Tower-Bridge:-London-Iconic-Engineering-Marvel','c720b2acad0f5757d56f90d11829139c.jpg',11,'admin','admin','Tower Bridge: London Iconic Engineering Marvel'),(6,'The Arkadiko Bridge: The World Oldest Surviving Arch Bridge',3,12,'The Arkadiko Bridge, located in the Peloponnese region of Greece, is one of the world oldest surviving arch bridges. It is a remarkable example of ancient engineering, dating back to the Greek Bronze Age (circa 1300–1190 BCE).\r\n<h3>Historical Significance</h3><br>\r\n•	Era: The bridge was built during the Mycenaean period, a time known for advanced architectural and engineering feats.<br>\r\n•	Purpose: It was part of an ancient roadway connecting the Mycenaean cities of Tiryns and Epidauros. <br>\r\n•	Continuing Legacy: Remarkably, the bridge is still intact and has been in continuous use, showcasing the durability of Mycenaean construction techniques.<br>\r\n________________________________________\r\n<h3>Design and Construction</h3><br>\r\n•	Material: Built entirely of locally sourced limestone, the bridge features a corbel arch design.<br>\r\n•	Structure:\r\no	The single-arch design was constructed using the corbelling technique, where successive layers of stone project slightly inward until they meet at the top, forming the arch.<br>\r\no	The bridge spans about 22 meters (72 feet) in length, is 5.6 meters (18 feet) wide, and has a height of around 4 meters (13 feet).<br>\r\n•	Chariot-Friendly: Its width and sturdy construction suggest it was built to accommodate Mycenaean chariots, highlighting the advanced road systems of the era.<br>\r\n________________________________________\r\n<h3>Cultural and Archaeological Value</h3><br>\r\n•	Mycenaean Civilization: The Arkadiko Bridge offers insights into the sophisticated infrastructure of one of the most influential ancient Greek civilizations.<br>\r\n•	Engineering Heritage: It is one of the earliest examples of bridge-building using the corbelling technique, a precursor to later advancements in arch and vault construction.<br>\r\n•	Preservation: The bridge remains a testament to the durability of ancient construction methods and has become a point of interest for historians and tourists alike.<br>\r\n________________________________________\r\n<h3>Visiting the Arkadiko Bridge</h3><br>\r\n•	Location: Situated near the modern village of Arkadiko in the Argolis region of the Peloponnese.<br>\r\n•	Accessibility: The bridge is easily accessible and open to visitors, offering a glimpse into the ingenuity of ancient Greek engineering.<br>\r\n','2024-12-23 02:42:13','2024-12-23 02:50:15',1,'The-Arkadiko-Bridge:-The-World-Oldest-Surviving-Arch-Bridge','b1ab5b688b136ce7fcc104a069e136cf.jpg',3,'admin',NULL,'The Arkadiko Bridge: The World Oldest Surviving Arch Bridge\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),(7,'Royal Gorge Bridge: A Sky-High Wonder of Engineering',2,8,'The Royal Gorge Bridge is a breathtaking suspension bridge located near Cañon City, Colorado, USA. Spanning the Royal Gorge, a deep canyon carved by the Arkansas River, it is one of the highest bridges in the world and a prominent engineering marvel. Here is an overview:<br>\r\n________________________________________\r\n<h3>History and Construction</h3>.<br>\r\n•	Built in: 1929, during the height of the Great Depression.<br>\r\n•	Purpose: Initially constructed as a tourist attraction to boost local tourism. .<br>\r\n•	Cost: The bridge was built for approximately $350,000 (equivalent to about $5 million today). .<br>\r\n•	Design: Designed by George E. Cole and built by the Austin Bridge Company. .<br>________________________________________\r\n<h3>Specifications</h3>.<br>\r\n•	Height: The bridge stands 955 feet (291 meters) above the Arkansas River, making it the highest bridge in the world at the time of its construction. .<br>\r\n•	Length: The bridge spans 1,260 feet (384 meters). .<br>\r\n•	Width: It is 18 feet (5.5 meters) wide. .<br>\r\n•	Suspension Design: Supported by steel cables and wooden planks for the deck, combining functionality with a rustic charm. .<br>Materials: It incorporates steel towers and cables, with the deck made of 1,257 wooden planks. .<br>\r\n________________________________________\r\n<h3>Key Features</h3>.<br>\r\n•	Tourist Attraction: The bridge is the centerpiece of the Royal Gorge Bridge & Park, a 360-acre amusement park offering zip-lining, gondola rides, and other adventures. .<br>\r\n•	Panoramic Views: Visitors enjoy unparalleled views of the Royal Gorge and the Arkansas River. .<br>\r\n•	Engineering Feat: At its completion, it was an engineering marvel, showcasing early 20th-century suspension bridge techniques. .<br>\r\n•	Durability: Despite natural challenges, including a devastating wildfire in 2013 that damaged much of the park, the bridge survived and was restored to its former glory. .<br>________________________________________\r\n<h3>Cultural and Historical Significance</h3>.<br>\r\n•	Heritage: Listed on the National Register of Historic Places in 1983. .<br>\r\n•	Film and Media: The bridge has been featured in various movies and TV shows, symbolizing human ingenuity and resilience. .<br>\r\n•	Tourism: It continues to attract visitors from around the globe as one of Colorado is top landmarks. .<br>.<br>\r\n________________________________________\r\n<h3>Visiting the Royal Gorge Bridge.</h3><br>\r\n•	Location: Approximately 58 miles southwest of Colorado Springs, Colorado. .<br>\r\n•	Activities: Beyond walking the bridge, visitors can enjoy thrill rides, a gondola crossing, and educational exhibits about the bridge is history and the surrounding area. .<br>\r\n•	Best Time to Visit: Spring and fall offer pleasant weather and less crowded conditions.\r\n','2024-12-23 02:50:10','2024-12-23 02:53:48',1,'Royal-Gorge-Bridge:-A-Sky-High-Wonder-of-Engineering','99fc58fc4c7ec56b7279941efefc48fb.jpg',2,'admin',NULL,'\"Royal Gorge Bridge: A Sky-High Wonder of Engineering\"'),(8,' Alcántara Bridge: Spanning Centuries of Roman History and Innovation',4,17,'<p>The Alcántara Bridge, located in Alcántara, Spain, is a stunning Roman stone arch bridge spanning the Tagus River. Built during the Roman Empire, it is a testament to the advanced engineering skills of ancient Rome and stands as a symbol of architectural brilliance and durability.</p><br>\r\n________________________________________\r\n<h3>Historical Background</h3><br>\r\n•	Construction Date: The bridge was completed in 106 CE during the reign of Emperor Trajan. <br>\r\n•	Purpose: It served as a vital crossing for military and trade routes, connecting regions of the Roman Empire. <br>Architect: Designed by Roman engineer Caius Julius Lacer, who is commemorated with a tomb nearby. <br>Dedication: The bridge bears an inscription dedicating it to Emperor Trajan, emphasizing its significance in Roman infrastructure. <br>________________________________________\r\n<h3>Specifications and Design</h3><br>\r\n•	Length: Approximately 194 meters 636 feet). 
<br>\r\n•	Height: Around 58 meters 190 feet) above the river. <br>\r\n•	Arches: Composed of six arches of varying spans, with the largest having a span of 28.8 meters 94.5 feet. <br>\r\n•	Materials: Constructed from locally quarried granite, ensuring strength and longevity. <br>Central Archway: Features a triumphal arch that enhances its grandeur, with inscriptions detailing its history. <br>\r\n________________________________________\r\n<h3>Significance</h3><br>\r\n•	Engineering Marvel: The Alcántara Bridge demonstrates the Romans mastery of stone arch construction, a technique that influenced bridge building for centuries. <br>Cultural Heritage: It has survived numerous conflicts, including medieval wars and Napoleonic campaigns, though parts of it were damaged and later restored. <br>\r\n•	Symbol of Resilience: The bridge is Latin inscription translates to, I have built a bridge which will last forever, reflecting the ambition and confidence of Roman engineering. <br>________________________________________\r\n<h3>Modern Role and Preservation</h3><br>\r\n•	Tourist Attraction: The Alcántara Bridge is a popular destination for history enthusiasts and travelers seeking to experience Roman architecture. <br>Preservation Efforts: Conservation projects have been undertaken to maintain the bridge is  structural integrity and historical value. <br>UNESCO Status: Though not individually listed, it contributes to the rich cultural heritage of the region. <br>\r\n________________________________________\r\n<h3>Visiting the Alcántara Bridge</h3>\r\n•	Location: Situated in the Extremadura region of Spain, near the border with Portugal. <br>\r\n•	Nearby Attractions: The town of Alcántara, Roman ruins, and the surrounding natural beauty of the Tagus River. <br>Best Time to Visit: Spring and fall offer mild weather and fewer crowds, ideal for exploring the bridge and its surroundings. <br>\r\n','2024-12-23 03:02:49','2024-12-23 03:03:19',1,'-Alcántara-Bridge:-Spanning-Centuries-of-Roman-History-and-Innovation','519fa044ccc321dc18a710a3f254dc74.jpg',2,'admin',NULL,'\r\nAlcántara Bridge: Spanning Centuries of Roman History and Innovation');

--


-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `subcat_description` mediumtext,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
INSERT INTO `subcategory` (`subcategory_id`, `category_id`, `subcategory`, `subcat_description`, `posting_date`, `updation_date`, `is_active`) VALUES
(1, 1, 'Asian', 'Asian', '2024-12-13 17:26:52', '2024-12-13 17:42:55', 1),
(2, 1, 'Europe', 'Europe', '2024-12-13 17:27:09', NULL, 1),                            
(3, 1, 'America', 'America', '2024-12-13 17:27:35', NULL, 1),
(4, 1, 'Oceania', 'Oceania', '2024-12-13 17:39:12', NULL, 1),
(5, 1, 'Africa', 'Africa', '2024-12-13 17:39:33', NULL, 1),
(6, 2, 'Asian', 'Asian', '2024-12-13 17:26:52', '2024-12-13 17:42:55', 1),
(7, 2, 'Europe', 'Europe', '2024-12-13 17:27:09', NULL, 1),
(8, 2, 'America', 'America', '2024-12-13 17:27:35', NULL, 1),
(9, 2, 'Oceania', 'Oceania', '2024-12-13 17:39:12', NULL, 1),
(10, 2, 'Africa', 'Africa', '2024-12-13 17:39:33', NULL, 1),
(11, 3, 'Asian', 'Asian', '2024-12-13 17:26:52', '2024-12-13 17:42:55', 1),
(12, 3, 'Europe', 'Europe', '2024-12-13 17:27:09', NULL, 1),
(13, 3, 'America', 'America', '2024-12-13 17:27:35', NULL, 1),
(14, 3, 'Oceania', 'Oceania', '2024-12-13 17:39:12', NULL, 1),
(15, 3, 'Africa', 'Africa', '2024-12-13 17:39:33', NULL, 1),  
(16, 4, 'Asian', 'Asian', '2024-12-13 17:26:52', '2024-12-13 17:42:55', 1),
(17, 4, 'Europe', 'Europe', '2024-12-13 17:27:09', NULL, 1),
(18, 4, 'America', 'America', '2024-12-13 17:27:35', NULL, 1),
(19, 4, 'Oceania', 'Oceania', '2024-12-13 17:39:12', NULL, 1),
(20, 4, 'Africa', 'Africa', '2024-12-13 17:39:33', NULL, 1),
(21, 5, 'Asian', 'Asian', '2024-12-13 17:26:52', '2024-12-13 17:42:55', 1),
(22, 5, 'Europe', 'Europe', '2024-12-13 17:27:09', NULL, 1),
(23, 5, 'America', 'America', '2024-12-13 17:27:35', NULL, 1),
(24, 5, 'Oceania', 'Oceania', '2024-12-13 17:39:12', NULL, 1),
(25, 5, 'Africa', 'Africa', '2024-12-13 17:39:33', NULL, 1),
(26, 6, 'Asian', 'Asian', '2024-12-13 17:26:52', '2024-12-13 17:42:55', 1),
(27, 6, 'Europe', 'Europe', '2024-12-13 17:27:09', NULL, 1),
(28, 6, 'America', 'America', '2024-12-13 17:27:35', NULL, 1),
(29, 6, 'Oceania', 'Oceania', '2024-12-13 17:39:12', NULL, 1),
(30, 6, 'Africa', 'Africa', '2024-12-13 17:39:33', NULL, 1);
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_username` (`admin_username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postcatid` (`category_id`),
  ADD KEY `postsucatid` (`subcategory_id`),
  ADD KEY `subadmin` (`posted_by`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `catid` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `pid` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `postcatid` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `postsucatid` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`),
  ADD CONSTRAINT `subadmin` FOREIGN KEY (`posted_by`) REFERENCES `admin` (`admin_username`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;
