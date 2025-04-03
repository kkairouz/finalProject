CREATE DATABASE `contact`;

USE contact; 

CREATE TABLE `information`
(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`firstName` varchar(20) NOT NULL, 
	`lastName`  varchar(20) NOT NULL,  
	`email` varchar(50) NOT NULL,
	primary key (`id`)

); 

