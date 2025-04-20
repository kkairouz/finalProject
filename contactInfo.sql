CREATE DATABASE `finalproject`;

USE `finalproject`;

CREATE TABLE `information`
(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`firstName` varchar(20) NOT NULL, 
	`lastName`  varchar(20) NOT NULL,  
	`email` varchar(50) NOT NULL,
	primary key (`id`)

); 
CREATE TABLE `audio`
(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`fileName` varchar(100) NOT NULL,
	 primary key(`id`)

);

insert into audio (fileName)
values ('Better Together');

insert into audio (fileName)
values ('Goodbyes');

insert into audio (fileName)
values ('Not Like Us');

insert into audio (fileName)
values ('Birds of a Feather');