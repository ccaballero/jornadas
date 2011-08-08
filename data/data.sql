DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `role`             enum('exponent', 'participant')                             NOT NULL DEFAULT 'participant',
    `fullname`         varchar(1024)                                               NOT NULL DEFAULT '',
    `username`         varchar(128)                                                NOT NULL,
    `password`         varchar(40)                                                 NOT NULL,
    `email`            varchar(128)                                                NOT NULL DEFAULT '',
    `avatar`           boolean                                                     NOT NULL DEFAULT false,
    `tsregister`       int unsigned                                                NOT NULL DEFAULT 0,
    `tslastlogin`      int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`),
    UNIQUE INDEX (`username`),
    UNIQUE INDEX (`email`)
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

/*DROP TABLE IF EXISTS `exposiciones_inscripciones`;
CREATE TABLE `exposiciones_inscripciones` (
    `participante`     int unsigned                                                NOT NULL,
    `exposicion`       int unsigned                                                NOT NULL,
    `registro`         int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`participante`, `exposicion`),
    INDEX (`participante`),
    FOREIGN KEY (`participante`) REFERENCES `usuarios`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`exposicion`),
    FOREIGN KEY (`exposicion`) REFERENCES `exposiciones_inscripciones`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `titulo`           varchar(1024)                                               NOT NULL,
    `contenido`        text                                                        NOT NULL DEFAULT '',
    `exposicion`       int unsigned                                                NOT NULL,
    `autor`            int unsigned                                                NOT NULL,
    `registro`         int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`, `exposicion`),
    INDEX (`autor`),
    FOREIGN KEY (`autor`) REFERENCES `usuarios`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`exposicion`),
    FOREIGN KEY (`exposicion`) REFERENCES `exposiciones`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

DROP TABLE IF EXISTS `noticias_comentarios`;
CREATE TABLE `noticias_comentarios` (
    `ident`            int unsigned                                                NOT NULL auto_increment,
    `contenido`        text                                                        NOT NULL DEFAULT '',
    `exposicion`       int unsigned                                                NOT NULL,
    `noticia`          int unsigned                                                NOT NULL,
    `autor`            int unsigned                                                NOT NULL,
    `registro`         int unsigned                                                NOT NULL DEFAULT 0,
    PRIMARY KEY (`ident`, `noticia`, `exposicion`),
    INDEX (`autor`),
    FOREIGN KEY (`autor`) REFERENCES `usuarios`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`exposicion`),
    FOREIGN KEY (`exposicion`) REFERENCES `exposiciones`(`ident`) ON UPDATE CASCADE ON DELETE RESTRICT,
    INDEX (`noticia`, `exposicion`),
    FOREIGN KEY (`noticia`, `exposicion`) REFERENCES `noticias`(`ident`, `exposicion`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;
*/