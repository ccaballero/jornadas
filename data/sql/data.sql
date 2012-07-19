DROP TABLE IF EXISTS `stats`;
CREATE TABLE `stats` (
    `user_agent`       text                                                        NOT NULL DEFAULT '',
    `remote_addr`      text                                                        NOT NULL DEFAULT '',
    `request_uri`      text                                                        NOT NULL DEFAULT '',
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `role`             enum('admin', 'organizer', 'exhibitor', 'assistant')        NOT NULL DEFAULT 'assistant',
    `title`            varchar(1024)                                               NOT NULL DEFAULT '',
    `name`             varchar(1024)                                               NOT NULL DEFAULT '',
    `surname`          varchar(1024)                                               NOT NULL DEFAULT '',
    `username`         varchar(1024)                                               NOT NULL DEFAULT '',
    `password`         varchar(40)                                                 NOT NULL,
    `email`            varchar(128)                                                NOT NULL DEFAULT '',
    `hash`             varchar(128)                                                NOT NULL,
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0,
    `tslastlogin`      int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`)
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `users_exhibitors`;
CREATE TABLE `users_exhibitors` (
    `user`             int unsigned                                                NOT NULL,
    `curriculum`       text                                                        NOT NULL DEFAULT '',
    INDEX (`user`),
    FOREIGN KEY (`user`) REFERENCES `users`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `exhibitions`;
CREATE TABLE `exhibitions` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `url`              varchar(128)                                                NOT NULL,
    `title`            varchar(128)                                                NOT NULL,
    `abstract`         text                                                        NOT NULL DEFAULT '',
    `exhibitor`        int unsigned                                                NOT NULL,
    `tsstart`          int unsigned                                                NOT NULL DEFAULT 0,
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`url`),
    INDEX (`exhibitor`),
    FOREIGN KEY (`exhibitor`) REFERENCES `users_exhibitors`(`user`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `title`            varchar(512)                                                NOT NULL,
    `text`             text                                                        NOT NULL DEFAULT '',
    `author`           int unsigned                                                NOT NULL,
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`),
    INDEX (`author`),
    FOREIGN KEY (`author`) REFERENCES `users`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `label`            varchar(256)                                                NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`label`)
) DEFAULT CHARACTER SET UTF8;
