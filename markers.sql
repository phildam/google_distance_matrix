CREATE TABLE `markers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 60 ) NOT NULL ,
  `address` VARCHAR( 80 ) NOT NULL ,
  `lat` FLOAT( 10, 6 ) NOT NULL ,
  `lng` FLOAT( 10, 6 ) NOT NULL
) ENGINE = MYIS


INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('1','Heir Apparel','Crowea Pl, Frenchs Forest NSW 2086','-33.737885','151.235260');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('2','BeeYourself Clothing','Thalia St, Hassall Grove NSW 2761','-33.729752','150.836090');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('3','Dress Code','Glenview Avenue, Revesby, NSW 2212','-33.949448','151.008591');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('4','The Legacy','Charlotte Ln, Chatswood NSW 2067','-33.796669','151.183609');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('5','Fashiontasia','Braidwood Dr, Prestons NSW 2170','-33.944489','150.854706');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('6','Trish & Tash','Lincoln St, Lane Cove West NSW 2066','-33.812222','151.143707');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('7','Perfect Fit','Darley Rd, Randwick NSW 2031','-33.903557','151.237732');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('8','Buena Ropa!','Brodie St, Rydalmere NSW 2116','-33.815521','151.026642');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('9','Coxcomb and Lily Boutique','Ferrers Rd, Horsley Park NSW 2175','-33.829525','150.873764');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('10','Moda Couture','Northcote Rd, Glebe NSW 2037','-33.873882','151.177460');