
INSERT INTO `users`
(`role`, `name`, `username`, `password`, `email`, `hash`)
VALUES
('admin', 'Admin', 'root', SHA1(MD5('asdf')), '', '');

