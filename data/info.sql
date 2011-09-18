INSERT INTO `exhibitions` (`ident`, `url`, `title`, `exhibitor`, `tsstart`, `tsregister`) VALUES
(1, 'analisis-forense-en-sistema-windows', 'Análisis forense en sistemas windows', 2, 1315591200, 1312522087),
(2, 'iso-27001-orientado-a-entidades-financieras', 'ISO 27001 orientado a entidades financieras', 3, 1315594800, 1312522087),
(3, 'itil-v3', 'ITIL v3 - Gestión de seguridad de la información', 4, 1315598400, 1312522087),
(4, 'seguridad-en-la-administracion-y-configuracion-de-servidores', 'Seguridad y configuración de servidores', 5, 1315515600, 1312522087),
(5, 'seguridad-web', 'Seguridad web', 6, 1315504800, 1312522087),
(6, 'seguridad-en-redes', 'Seguridad en redes', 7, 1315508400, 1312522087),
(7, 'cuidado-nos-atacan-desde-dentro', 'Cuidado nos atacan desde dentro', 8, 1315602000, 1312522087),
(8, 'politicas-de-seguridad', 'Políticas de seguridad', 9, 1315512000, 1312522087);

UPDATE `exhibitions` SET `abstract` =
'La seguridad forense esta ligada a la respuesta de incidentes y a la gestión de evidencias digitales, en ella se trata de recoger trazas y evidencias digitales de computadoras o red (datos abiertos, desconocidos, potencialmente desconocidos y ocultos) y utilizar dicha información digital tanto para procedimientos legales, administrativos como para mejorar la seguridad de una organización.' WHERE ident = 1;

UPDATE `exhibitions` SET `abstract` =
'ISO/IEC 27001 es un conjunto de estándares desarrollados -o en fase de desarrollo- por ISO (International Organization for Standardization) e IEC (International Electrotechnical Commission), que proporcionan un marco de gestión de la seguridad de la información utilizable por cualquier tipo de organización, pública o privada, grande o pequeña.' WHERE ident = 2;

UPDATE `exhibitions` SET `abstract` = '' WHERE ident = 3;
UPDATE `exhibitions` SET `abstract` = '' WHERE ident = 4;
UPDATE `exhibitions` SET `abstract` =
'La seguridad de una web es necesaria porque es una ventana por la que una empresa se muestra a sus clientes. Si un atacante modifica malintencionadamente la página o accede a información privada a través de ella, la imagen de la compañia se vería seriamente dañada pudiendo acarrear consecuencias legales y económicas.' WHERE ident = 5;

UPDATE `exhibitions` SET `abstract` =
'Actualmente, cuando hablamos de seguridad en las redes de computadoras, hacemos una grana referencia a Internet, pues es dentro de esa red de alcance mundial que se producen con mayor frecuencia los ataques a nuestras computadoras, en la conferencia hablaremos sobre ataques y contra-medidas a redes informáticas.' WHERE ident = 6;

UPDATE `exhibitions` SET `abstract` =
'Normalmente las empresas garantizan la seguridad de sus datos mediante la aplicación de dispositivos que ayudan a cuidar su frontera hacia Internet previniendo posibles ataques externos, pero muchas veces se olvidan de brindar seguridad al interior de la empresa. Dentro de la red local de la empresa la información que circula por las redes informáticas es bastante critica, si un atacante llega a tener acceso a la red puede realizar ataques desde denegación de servicio hasta robo de datos permitiendo la fuga de información. En la conferencia se hablará de las vulnerabilidades que atrae una mala o nula implementación de medidas de seguridad interna, como los riesgos de fuga de información y las medidas para mitigarlos.' WHERE ident = 7;

UPDATE `exhibitions` SET `abstract` =
'Una Política de Seguridad es un conjunto de requisitos definidos por los responsables de un sistema, que indica en términos generales que está y que no está permitido en el área de seguridad durante la operación general del sistema.
La RFC 1244 define Política de Seguridad como: "una declaración de intensiones de alto nivel que cubre la seguridad de los sistemas informáticos y que proporciona las bases para definir y delimitar responsabilidades para las diversas actuaciones técnicas y organizativas que se requerirán.
La política se refleja en una seria de normas, reglamentos y protocolos a seguir, donde se definen las medidas a tomar para proteger la seguridad del sistema; pero... ante todo, "una política de seguridad es una forma de comunicarse con los usuarios... Siempre hay que tener en cuenta que la seguridad comienza y termina con personas." y debe:
    - Ser holística (cubrir todos los aspectos relacionados con la misma). No tiene sentido proteger el acceso con una puerta blindada si a esta no se la ha cerrado con llave.
    - Adecuarse a las necesidades y recursos. No tiene sentido adquirir una caja fuerte para proteger un lápiz.
    - Ser atemporal. El tiempo en el que se aplica no debe influir en su eficacia y eficiencia.
    - Definir estrategias y criterios generales a adoptar en distintas funciones y actividades, donde se conocen las alternativas ante circunstancias repetidas.
Cualquier política de seguridad ha de contemplar los elementos claves de seguridad ya mencionados: la Integridad. Disponibilidad, Privacidad y, adicionalmente, Control, Autenticidad y Utilidad.
No debe tratarse de una descripción técnica de mecanismos de seguridad, ni de una expresión legal que involucre sanciones a conductas de los empleados. Es más bien una descripción de los que deseamos proteger y el porqué de ello.' WHERE ident = 8;
