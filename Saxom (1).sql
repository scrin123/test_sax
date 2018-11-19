-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `much` double DEFAULT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `from` (`from`),
  KEY `to` (`to`),
  CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`from`) REFERENCES `general` (`id_user`),
  CONSTRAINT `documents_ibfk_3` FOREIGN KEY (`to`) REFERENCES `general` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER ;;

CREATE TRIGGER `documents_ai` AFTER INSERT ON `documents` FOR EACH ROW
BEGIN
 UPDATE`Saxom`.`general` SET balance = balance-NEW.much where id_user = NEW.from ;
 UPDATE`Saxom`.`general` SET balance = balance+NEW.much where id_user = NEW.to;
 INSERT INTO `Saxom`.`log` (`data`, `from`, `to`, `much`) VALUES (now(), NEW.from, NEW.to, NEW.much);
END;;

CREATE TRIGGER `documents_au` AFTER UPDATE ON `documents` FOR EACH ROW
BEGIN
 UPDATE`Saxom`.`general` SET balance = balance+NEW.much where id_user = NEW.from ;
 UPDATE`Saxom`.`general` SET balance = balance-NEW.much where id_user = NEW.to;
 INSERT INTO `Saxom`.`log` (`data`, `from`, `to`, `much`) VALUES (now(), NEW.from, NEW.to, NEW.much);
END;;

DELIMITER ;

DROP TABLE IF EXISTS `general`;
CREATE TABLE `general` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `much` float NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `log` (`id_log`, `data`, `from`, `to`, `much`) VALUES
(1,	'2018-11-19 17:41:43',	9,	28,	0);

-- 2018-11-19 10:42:17
