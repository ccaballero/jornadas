
INSERT INTO `users`
(`role`, `name`, `surname`, `username`, `password`, `email`, `hash`, `tslastlogin`, `tsregister`)
VALUES
('admin',     'Admin',     'Lord',      'root',      SHA1(MD5('12345678')), '', '12345678', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),

('organizer', 'Alvaro',    'Alvarez',   'alvaro',    SHA1(MD5('234ADSFQ')), '', '234ADSFQ', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Benjamin',  'Bueno',     'benjo',     SHA1(MD5('REWQRQW4')), '', 'REWQRQW4', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Carlos',    'Caballero', 'carlos',    SHA1(MD5('FYAS44D5')), '', 'FYAS44D5', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Demetrio',  'Diáz',      'demetrio',  SHA1(MD5('D6TY54ER')), '', 'D6TY54ER', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Epifanio',  'Egüino',    'epifanio',  SHA1(MD5('G523G124')), '', 'G523G124', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Fernando',  'Fernandez', 'fernando',  SHA1(MD5('S5T32GFS')), '', 'S5T32GFS', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Gaston',    'Gonzalez',  'gaston',    SHA1(MD5('TY123FT5')), '', 'TY123FT5', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Hilario',   'Hernandez', 'hilario',   SHA1(MD5('J12KJH3K')), '', 'J12KJH3K', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Inocencio', 'Iriarte',   'inocencio', SHA1(MD5('FHT1234F')), '', 'FHT1234F', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Juvenal',   'Jimenez',   'juvenal',   SHA1(MD5('RG566KJH')), '', 'RG566KJH', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Kevin',     'Kluivert',  'kevin',     SHA1(MD5('U4R5671F')), '', 'U4R5671F', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Laurencio', 'Lopez',     'laurencio', SHA1(MD5('H345GTFR')), '', 'H345GTFR', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Martín',    'Martinez',  'martin',    SHA1(MD5('G23455TY')), '', 'G23455TY', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('exhibitor', 'Norberto',  'Nogales',   'norberto',  SHA1(MD5('S1234F46')), '', 'S1234F46', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('exhibitor', 'Oscar',     'Olivera',   'oscar',     SHA1(MD5('234ERG12')), '', '234ERG12', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('exhibitor', 'Pedro',     'Perez',     'pedro',     SHA1(MD5('BDFG553F')), '', 'BDFG553F', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('exhibitor', 'Quino',     'Quinteros', 'quino',     SHA1(MD5('YG1WR234')), '', 'YG1WR234', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Ramiro',    'Ramirez',   'ramiro',    SHA1(MD5('U72FVI56')), '', 'U72FVI56', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Silvio',    'Silva',     'silva',     SHA1(MD5('I53ASDU4')), '', 'I53ASDU4', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Teodoro',   'Tabarez',   'teodoro',   SHA1(MD5('T4YUVA44')), '', 'T4YUVA44', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Undiano',   'Ugarte',    'undiano',   SHA1(MD5('R3Y55521')), '', 'R3Y55521', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Vicente',   'Velez',     'vicente',   SHA1(MD5('E5T67615')), '', 'E5T67615', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Walter',    'Wilson',    'walter',    SHA1(MD5('W8ESAW37')), '', 'W8ESAW37', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Xavier',    'Xui',       'xavier',    SHA1(MD5('Q7T83242')), '', 'Q7T83242', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Yayo',      'Yepez',     'yayo',      SHA1(MD5('SHT691FD')), '', 'SHT691FD', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Zenobio',   'Znoaos',    'zenobio',   SHA1(MD5('FF50Q25T')), '', 'FF50Q25T', UNIX_TIMESTAMP(), UNIX_TIMESTAMP());

UPDATE `users` SET `apikey` = 'A098234F' WHERE `username` = 'carlos';

INSERT INTO `activities`
(`code`, `label`, `order`)
VALUES
(1, '1º Ingreso',    1),
(2, '1º Refrigerio', 2),
(3, '2º Ingreso',    3),
(4, '2º Refrigerio', 4),
(5, 'Concurso',      5),
(6, 'Certificado',   6);
