CREATE DATABASE IF NOT EXISTS `get_started` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `get_started`;

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `customer` (`id`, `name`, `surname`, `email`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com');

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `invoice_id` varchar(30) NULL,
  `time` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `order_attachment` (
  `order_id` int(11) NOT NULL,
  `attachment_id` int(11) NOT NULL,
  UNIQUE KEY `order_id` (`order_id`,`attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;