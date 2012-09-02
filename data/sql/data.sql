DROP TABLE IF EXISTS `stats`;
CREATE TABLE `stats` (
    `user_agent`       text                                                        NOT NULL DEFAULT '',
    `remote_addr`      text                                                        NOT NULL DEFAULT '',
    `request_uri`      text                                                        NOT NULL DEFAULT '',
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `ident`            int unsigned                                                     NOT NULL auto_increment,
    `role`             enum('admin', 'organizer', 'protocol', 'exhibitor', 'assistant') NOT NULL DEFAULT 'assistant',
    `title`            varchar(512)                                                     NOT NULL DEFAULT '',
    `name`             varchar(512)                                                     NOT NULL DEFAULT '',
    `surname`          varchar(512)                                                     NOT NULL DEFAULT '',
    `email`            varchar(128)                                                     NOT NULL DEFAULT '',
    `username`         varchar(128)                                                     NOT NULL DEFAULT '',
    `password`         varchar(40)                                                      NOT NULL,
    `hash`             char(8)                                                          NOT NULL,
    `apikey`           char(8)                                                          NOT NULL DEFAULT '',
    `tsregister`       int unsigned                                                     NOT NULL DEFAULT 0,
    `tslastlogin`      int unsigned                                                     NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`username`),
    UNIQUE INDEX (`password`),
    UNIQUE INDEX (`hash`)
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `exhibitions`;
CREATE TABLE `exhibitions` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `url`              varchar(128)                                                NOT NULL,
    `title`            varchar(128)                                                NOT NULL,
    `abstract`         text                                                        NOT NULL DEFAULT '',
    `tsstart`          int unsigned                                                NOT NULL DEFAULT 0,
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`url`)
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `exhibitions_users`;
CREATE TABLE `exhibitions_users` (
    `exhibition`       int unsigned                                                NOT NULL,
    `user`             int unsigned                                                NOT NULL,
    `curriculum`       text                                                        NOT NULL DEFAULT '',
    INDEX (`exhibition`),
    FOREIGN KEY (`exhibition`) REFERENCES `exhibitors`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`user`),
    FOREIGN KEY (`user`) REFERENCES `users`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `title`            varchar(512)                                                NOT NULL,
    `text`             text                                                        NOT NULL DEFAULT '',
    `author`           int unsigned                                                NOT NULL,
    `tsmodified`       int unsigned                                                NOT NULL DEFAULT 0,
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`),
    INDEX (`author`),
    FOREIGN KEY (`author`) REFERENCES `users`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `code`             int unsigned                                                NOT NULL,
    `label`            varchar(128)                                                NOT NULL,
    `order`            int unsigned                                                NOT NULL,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`code`)
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `activities_users`;
CREATE TABLE `activities_users` (
    `user`             int unsigned                                                NOT NULL,
    `activity`         int unsigned                                                NOT NULL,
    PRIMARY KEY (`user`, `activity`),
    INDEX (`user`),
    FOREIGN KEY (`user`) REFERENCES `users`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`activity`),
    FOREIGN KEY (`activity`) REFERENCES `activities`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;
