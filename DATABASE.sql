CREATE TABLE `items` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `add_date` datetime NOT NULL,  `title` varchar(500) CHARACTER SET utf8 NOT NULL,  `link` varchar(500) CHARACTER SET utf8 NOT NULL,  `link_hash` int(11) NOT NULL,  `length` int(11) NOT NULL,  `size` int(11) NOT NULL,  PRIMARY KEY (`id`),  KEY `link_hash` (`link_hash`),  KEY `length` (`length`),  KEY `size` (`size`));

CREATE TABLE `item_downloads` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `item_id` int(11) NOT NULL,  `add_date` datetime NOT NULL,  PRIMARY KEY (`id`),  KEY `item_id` (`item_id`));

CREATE TABLE `item_plays` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `item_id` int(11) NOT NULL,  `add_date` datetime NOT NULL,  PRIMARY KEY (`id`),  KEY `item_id` (`item_id`)); 

CREATE TABLE `searches` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `query` text NOT NULL,  `add_date` datetime NOT NULL,  PRIMARY KEY (`id`)); 

CREATE TABLE `sessions` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `add_date` datetime NOT NULL,  PRIMARY KEY (`id`));

CREATE TABLE `session_clicks` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `session_id` int(11) NOT NULL,  `add_date` datetime NOT NULL,  `action` varchar(20) NOT NULL,  PRIMARY KEY (`id`),  KEY `session_id` (`session_id`)); 

CREATE TABLE `session_views` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `session_id` int(11) NOT NULL,  `add_date` datetime NOT NULL,  `page` varchar(20) NOT NULL,  PRIMARY KEY (`id`),  KEY `session_id` (`session_id`))
