
INSERT INTO `users`
(`role`, `name`, `username`, `password`, `email`, `hash`, `tslastlogin`)
VALUES
('admin', 'Admin', 'root', SHA1(MD5('asdf')), '', '', UNIX_TIMESTAMP());

