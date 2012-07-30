
INSERT INTO `users`
(`role`, `name`, `surname`, `username`, `password`, `email`, `hash`, `tslastlogin`, `tsregister`)
VALUES
('admin',     'Admin',     'Lord',      'root', SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),

('organizer', 'Alvaro',    'Alvarez',   'alvaro',    SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Benjamin',  'Bueno',     'benjo',     SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Carlos',    'Caballero', 'carlos',    SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Demetrio',  'Diáz',      'demetrio',  SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Epifanio',  'Egüino',    'epifanio',  SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Fernando',  'Fernandez', 'fernando',  SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Gaston',    'Gonzalez',  'gaston',    SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('organizer', 'Hilario',   'Hernandez', 'hilario',   SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Inocencio', 'Iriarte',   'inocencio', SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Juvenal',   'Jimenez',   'juvenal',   SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Kevin',     'Kluivert',  'kevin',     SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Laurencio', 'Lopez',     'laurencio', SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('protocol',  'Martín',    'Martinez',  'martin',    SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('exhibitor', 'Norberto',  'Nogales',   'norberto',  SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('exhibitor', 'Oscar',     'Olivera',   'oscar',     SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('exhibitor', 'Pedro',     'Perez',     'pedro',     SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('exhibitor', 'Quino',     'Quinteros', 'quino',     SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Ramiro',    'Ramirez',   'ramiro',    SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Silvio',    'Silva',     'silva',     SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Teodoro',   'Tabarez',   'teodoro',   SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Undiano',   'Ugarte',    'undiano',   SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Vicente',   'Velez',     'vicente',   SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Walter',    'Wilson',    'walter',    SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Xavier',    'Xui',       'xavier',    SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Yayo',      'Yepez',     'yayo',      SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
('assistant', 'Zenobio',   'Znoaos',    'zenobio',   SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP(), UNIX_TIMESTAMP());
