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
values ('Whatever You Like');

insert into audio (fileName)
values ('Will Be Alright');

insert into audio (fileName)
values ('Back to Life');

insert into audio (fileName)
values ('Find My Own');

insert into audio (fileName)
values ('Fadeaway');

insert into audio (fileName)
values ('Losing My Love');

insert into audio (fileName)
values ('You Belong With Me');

insert into audio (fileName)
values ('Crossing Your Heart');

insert into audio (fileName)
values ('Hear Me Now');

insert into audio (fileName)
values ('Its Not The Same');