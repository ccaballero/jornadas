DROP TABLE IF EXISTS `visitas`;
CREATE TABLE `visitas` (
    `user_agent`       text                                                        NOT NULL DEFAULT '',
    `remote_addr`      text                                                        NOT NULL DEFAULT '',
    `request_uri`      text                                                        NOT NULL DEFAULT '',
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `role`             enum('admin', 'exponent', 'participant')                    NOT NULL DEFAULT 'participant',
    `fullname`         varchar(1024)                                               NOT NULL DEFAULT '',
    `username`         varchar(1024)                                               NOT NULL DEFAULT '',
    `password`         varchar(40)                                                 NOT NULL,
    `email`            varchar(128)                                                NOT NULL DEFAULT '',
    `hash`             varchar(128)                                                NOT NULL,
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0,
    `tslastlogin`      int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`)
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `usuarios_expositores`;
CREATE TABLE `usuarios_expositores` (
    `usuario`          int unsigned                                                NOT NULL,
    `curriculum`       text                                                        NOT NULL DEFAULT '',
    INDEX (`usuario`),
    FOREIGN KEY (`usuario`) REFERENCES `usuarios`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `exposiciones`;
CREATE TABLE `exposiciones` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `url`              varchar(128)                                                NOT NULL,
    `title`            varchar(128)                                                NOT NULL,
    `abstract`         text                                                        NOT NULL DEFAULT '',
    `avatar`           boolean                                                     NOT NULL DEFAULT false,
    `exponent`         int unsigned                                                NOT NULL,
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0,
    `tslastlogin`      int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`url`),
    INDEX (`exponent`),
    FOREIGN KEY (`exponent`) REFERENCES `usuarios`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;
