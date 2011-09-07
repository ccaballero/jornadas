INSERT INTO `usuarios` (`ident`, `role`, `username`, `fullname`, `hash`, `password`, `tsregister`) VALUES
( 1, 'admin',    'root',   'El mero mero',                         'I3L8HXSG', SHA1(MD5('asdf')), 1312522087),
( 2, 'exponent', 'lorgio', 'Ing. Lorgio Alexander Lazarte Zurita', '2O2UTV0A', SHA1(MD5('2O2UTV0A')), 1312522087),
( 3, 'exponent', 'alvaro', 'Ing. Alvaro Andrade Sejas',            'G0PHHL6Z', SHA1(MD5('G0PHHL6Z')), 1312522087),
( 4, 'exponent', 'efrain', 'Efraín Fernando Luna Mamani',          '2DODYW7U', SHA1(MD5('2DODYW7U')), 1312522087),
( 5, 'exponent', 'beto', 'Lic. Luis Alberto Coronado',             'N011RMPJ', SHA1(MD5('N011RMPJ')), 1312522087),
( 6, 'exponent', 'vladimir', 'Msc. Vladimir Costas Jáuregui',      '0H4J3UJ0', SHA1(MD5('0H4J3UJ0')), 1312522087),
( 7, 'exponent', 'jorge', 'Msc. Ing. Jorge Walter Orellana Araoz', 'JZGRABG2', SHA1(MD5('JZGRABG2')), 1312522087),
( 8, 'exponent', 'gonzalo', 'Nina Mamani Gonzalo',                 'FU64F2NT', SHA1(MD5('FU64F2NT')), 1312522087),
( 9, 'exponent', 'yony', 'Lic. Yony Richard Montoya Burgos',       '1DJIQZSG', SHA1(MD5('1DJIQZSG')), 1312522087);

/*UPDATE `usuarios` SET `curriculum` =
'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur egestas mauris non arcu sagittis rhoncus. Donec consectetur pretium nibh id sollicitudin. Fusce sit amet neque eget dolor pellentesque congue. Sed pellentesque libero vel mauris dignissim fermentum. Vestibulum enim tortor, vestibulum ac mattis vitae, pellentesque nec neque. Aenean posuere, eros ac faucibus consectetur, tellus risus sagittis ligula, eu vulputate tellus lorem vitae dui. In rutrum fermentum nunc ac tristique. Donec cursus justo sit amet nibh egestas eu tincidunt sapien semper. Duis imperdiet nisi ut orci feugiat condimentum. Aenean et nulla nec arcu ornare accumsan eget at ligula. Sed pulvinar faucibus elementum. Aenean non ligula lorem. Maecenas gravida eros nec magna molestie placerat. Morbi volutpat, enim eu imperdiet accumsan, dolor leo convallis odio, in suscipit est urna sit amet nisl. Etiam ultrices nulla quis urna lobortis vitae euismod ipsum porttitor. Phasellus vel urna quis orci tincidunt tincidunt. Donec molestie imperdiet mauris ut commodo. Phasellus sit amet lorem nulla, et lobortis massa. Quisque hendrerit, orci tristique gravida bibendum, libero lectus sollicitudin elit, eu tristique turpis nulla eget nunc. Mauris volutpat egestas nunc sed dignissim. Duis dapibus lorem in mauris viverra pellentesque. Cras dapibus lacus eget enim dictum rutrum. In id vestibulum odio. Vestibulum placerat ornare ante, et porta lacus fringilla ac. Proin vel odio sed tortor hendrerit sollicitudin. Cras nec magna vitae felis vulputate molestie. Cras sit amet pharetra erat. Vestibulum metus arcu, cursus vel eleifend in, tincidunt non libero. ' WHERE ident = 1;*/

INSERT INTO `exposiciones` (`ident`, `url`, `title`, `exponent`, `tsstart`, `tsregister`) VALUES
(1, 'analisis-forense-en-sistema-windows', 'Análisis forense en sistemas windows', 2, 1316109600, 1312522087),
(2, 'iso-27001-orientado-a-entidades-financieras', 'ISO 27001 orientado a entidades financieras', 3, 1316113200, 1312522087),
(3, 'itil-27000', 'ITIL 27000', 4, 1316120400, 1312522087),
(4, 'seguridad-y-configuracion-de-servidores', 'Seguridad y configuración de servidores', 5, 1316030400, 1312522087),
(5, 'seguridad-web', 'Seguridad web', 6, 1316023200, 1312522087),
(6, 'seguridad-en-redes', 'Seguridad en redes', 7, 1316116800, 1312522087),
(7, 'cuidado-nos-atacan-desde-dentro', 'Cuidado nos atacan desde dentro', 8, 1316026800, 1312522087),
(8, 'politicas-de-seguridad', 'Políticas de seguridad', 9, 1316034000, 1312522087);

UPDATE `exposiciones` SET `abstract` =
'La seguridad forense esta ligada a la respuesta de incidentes y a la gestión de evidencias digitales, en ella se trata de recoger trazas y evidencias digitales de computadoras o red (datos abiertos, desconocidos, potencialmente desconocidos y ocultos) y utilizar dicha información digital tanto para procedimientos legales, administrativos como para mejorar la seguridad de una organización.' WHERE ident = 1;

UPDATE `exposiciones` SET `abstract` =
'ISO/IEC 27001 es un conjunto de estándares desarrollados -o en fase de desarrollo- por ISO (International Organization for Standardization) e IEC (International Electrotechnical Commission), que proporcionan un marco de gestión de la seguridad de la información utilizable por cualquier tipo de organización, pública o privada, grande o pequeña.' WHERE ident = 2;

UPDATE `exposiciones` SET `abstract` = '' WHERE ident = 3;
UPDATE `exposiciones` SET `abstract` = '' WHERE ident = 4;
UPDATE `exposiciones` SET `abstract` =
'La seguridad de una web es necesaria porque es una ventana por la que una empresa se muestra a sus clientes. Si un atacante modifica malintencionadamente la página o accede a información privada a través de ella, la imagen de la compañia se vería seriamente dañada pudiendo acarrear consecuencias legales y económicas.' WHERE ident = 5;

UPDATE `exposiciones` SET `abstract` =
'Actualmente, cuando hablamos de seguridad en las redes de computadoras, hacemos una grana referencia a Internet, pues es dentro de esa red de alcance mundial que se producen con mayor frecuencia los ataques a nuestras computadoras, en la conferencia hablaremos sobre ataques y contra-medidas a redes informáticas.' WHERE ident = 6;

UPDATE `exposiciones` SET `abstract` =
'Normalmente las empresas garantizan la seguridad de sus datos mediante la aplicación de dispositivos que ayudan a cuidar su frontera hacia Internet previniendo posibles ataques externos, pero muchas veces se olvidan de brindar seguridad al interior de la empresa. Dentro de la red local de la empresa la información que circula por las redes informáticas es bastante critica, si un atacante llega a tener acceso a la red puede realizar ataques desde denegación de servicio hasta robo de datos permitiendo la fuga de información. En la conferencia se hablará de las vulnerabilidades que atrae una mala o nula implementación de medidas de seguridad interna, como los riesgos de fuga de información y las medidas para mitigarlos.' WHERE ident = 7;

UPDATE `exposiciones` SET `abstract` =
'Una Política de Seguridad es un conjunto de requisitos definidos por los responsables de un sistema, que indica en términos generales que está y que no está permitido en el área de seguridad durante la operación general del sistema.
La RFC 1244 define Política de Seguridad como: "una declaración de intensiones de alto nivel que cubre la seguridad de los sistemas informáticos y que proporciona las bases para definir y delimitar responsabilidades para las diversas actuaciones técnicas y organizativas que se requerirán.
La política se refleja en una seria de normas, reglamentos y protocolos a seguir, donde se definen las medidas a tomar para proteger la seguridad del sistema; pero... ante todo, "una política de seguridad es una forma de comunicarse con los usuarios... Siempre hay que tener en cuenta que la seguridad comienza y termina con personas." y debe:
    - Ser holística (cubrir todos los aspectos relacionados con la misma). No tiene sentido proteger el acceso con una puerta blindada si a esta no se la ha cerrado con llave.
    - Adecuarse a las necesidades y recursos. No tiene sentido adquirir una caja fuerte para proteger un lápiz.
    - Ser atemporal. El tiempo en el que se aplica no debe influir en su eficacia y eficiencia.
    - Definir estrategias y criterios generales a adoptar en distintas funciones y actividades, donde se conocen las alternativas ante circunstancias repetidas.
Cualquier política de seguridad ha de contemplar los elementos claves de seguridad ya mencionados: la Integridad. Disponibilidad, Privacidad y, adicionalmente, Control, Autenticidad y Utilidad.
No debe tratarse de una descripción técnica de mecanismos de seguridad, ni de una expresión legal que involucre sanciones a conductas de los empleados. Es más bien una descripción de los que deseamos proteger y el porqué de ello.' WHERE ident = 8;
