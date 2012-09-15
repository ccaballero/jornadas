INSERT INTO `exhibitions`
(`ident`, `url`, `title`, `tsstart`, `tsregister`)
VALUES
(1, 'backtrack-v5-r3', 'BackTrack V5 R3', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
(2, 'instalacion-y-configuracion-de-pfense', 'Instalación y configuración de Pfsense (Firewall empaquetado sobre Linux)', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
(3, 'informatica-y-la-propiedad-intelectual', 'Informatica y la Propiedad Intelecual', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
(4, 'tecnicas-de-auditoria-forense', 'Tecnicas de Auditoria Forense', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
(5, 'informatica-forense-y-el-procedimiento-penal-en-investigacion-criminal-en-celulares', 'Informática forense y el procedimiento penal en investigación criminal en celulares (Caso Real)', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
(6, 'tema-sorpresa', 'Tema Sorpresa', UNIX_TIMESTAMP(), UNIX_TIMESTAMP());

INSERT INTO `exhibitions_users`
(`exhibition`, `user`, `curriculum`)
VALUES
(1,  8, 'U. Internacional de Aviación Civil de Kiev - Ucrania.<br/>Docente Posgrado. EMI - UPB'),
(2,  9, 'Director Centro Estudios en Soluciones Informáticas UPB.<br/>Universidad Politecnica de Valencia - España'),
(3, 10, 'Magister en Administración y Gerencia (Madrid-España).<br/>Especialidad en Propiedad Intelectual (Ginebra-Suiza).'),
(4, 11, 'Director Academico Sistemas UMSS'),
(5, 12, ''),
(5, 13, ''),
(5, 14, ''),
(6, 15, 'Universidad Utrecht, Holanda');

INSERT INTO `sponsors`
(`ident`, `label`, `logo`, `url`)
VALUES
(1, 'Genso, Iniciativas Web', '/media/auspiciadores/jornadas_v2/genso.png', 'http://www.genso.com.bo/'),
(2, 'TRUEXTEND. Software Engineering Services', '/media/auspiciadores/jornadas_v2/truextend.png', 'http://www.truextend.com/'),
(3, 'IdeaSoft', '/media/auspiciadores/jornadas_v2/ideasoft.png', 'http://www.ideasoftinc.com/profile/index_es.html'),
(4, 'ASFODIN', '/media/auspiciadores/jornadas_v2/asfodin.png', '');

UPDATE `sponsors` SET `text` = 'Brindamos soluciones multidisciplinarias basadas en las TIC’s a los nuevos problemas y requerimientos de información y comunicación, a través de la planificación, desarrollo e implementación de aplicaciones informáticas: sitios web, aplicaciones para plataformas móviles, gestores de inventarios, entre otros.' WHERE `ident` = 1;
UPDATE `sponsors` SET `text` = 'TRUEXTEND, Inc. is a California-based company that specializes in extending the engineering capabilities of any business throughout the United States. We increase the intellectual production of our clients by providing them the best human resources through the Nearshore model. Headquartered in Silicon Valley, TRUEXTEND runs Nearshore R&D centers in Latin America to provide cost effective solutions to our clients.' WHERE `ident` = 2;
UPDATE `sponsors` SET `text` = 'IdeaSoft es una empresa boliviana que ofrece servicios en tecnologías de la información orientados a cumplir con los requisitos del cliente a tiempo y con la más alta calidad. Nuestros servicios se centran en el desarrollo de software y control de calidad.' WHERE `ident` = 3;
UPDATE `sponsors` SET `text` = 'Asociación forense de derecho informático.' WHERE `ident` = 4;

-- UPDATE `exhibitions` SET `abstract` =
-- 'La seguridad de una web es necesaria porque es una ventana por la que una empresa se muestra a sus clientes. Si un atacante modifica malintencionadamente la página o accede a información privada a través de ella, la imagen de la compañia se vería seriamente dañada pudiendo acarrear consecuencias legales y económicas.' WHERE ident = 1;
-- 
-- UPDATE `exhibitions` SET `abstract` =
-- 'Actualmente, cuando hablamos de seguridad en las redes de computadoras, hacemos una grana referencia a Internet, pues es dentro de esa red de alcance mundial que se producen con mayor frecuencia los ataques a nuestras computadoras, en la conferencia hablaremos sobre ataques y contra-medidas a redes informáticas.' WHERE ident = 2;
-- 
-- UPDATE `exhibitions` SET `abstract` =
-- 'Una Política de Seguridad es un conjunto de requisitos definidos por los responsables de un sistema, que indica en términos generales que está y que no está permitido en el área de seguridad durante la operación general del sistema.
-- La RFC 1244 define Política de Seguridad como: "una declaración de intensiones de alto nivel que cubre la seguridad de los sistemas informáticos y que proporciona las bases para definir y delimitar responsabilidades para las diversas actuaciones técnicas y organizativas que se requerirán.
-- La política se refleja en una seria de normas, reglamentos y protocolos a seguir, donde se definen las medidas a tomar para proteger la seguridad del sistema; pero... ante todo, "una política de seguridad es una forma de comunicarse con los usuarios... Siempre hay que tener en cuenta que la seguridad comienza y termina con personas." y debe:
--     - Ser holística (cubrir todos los aspectos relacionados con la misma). No tiene sentido proteger el acceso con una puerta blindada si a esta no se la ha cerrado con llave.
--     - Adecuarse a las necesidades y recursos. No tiene sentido adquirir una caja fuerte para proteger un lápiz.
--     - Ser atemporal. El tiempo en el que se aplica no debe influir en su eficacia y eficiencia.
--     - Definir estrategias y criterios generales a adoptar en distintas funciones y actividades, donde se conocen las alternativas ante circunstancias repetidas.
-- Cualquier política de seguridad ha de contemplar los elementos claves de seguridad ya mencionados: la Integridad. Disponibilidad, Privacidad y, adicionalmente, Control, Autenticidad y Utilidad.
-- No debe tratarse de una descripción técnica de mecanismos de seguridad, ni de una expresión legal que involucre sanciones a conductas de los empleados. Es más bien una descripción de los que deseamos proteger y el porqué de ello.' WHERE ident = 3;
-- 
-- UPDATE `exhibitions` SET `abstract` = '' WHERE ident = 4;
-- 
-- UPDATE `exhibitions` SET `abstract` =
-- 'La seguridad forense esta ligada a la respuesta de incidentes y a la gestión de evidencias digitales, en ella se trata de recoger trazas y evidencias digitales de computadoras o red (datos abiertos, desconocidos, potencialmente desconocidos y ocultos) y utilizar dicha información digital tanto para procedimientos legales, administrativos como para mejorar la seguridad de una organización.' WHERE ident = 5;
-- 
-- UPDATE `exhibitions` SET `abstract` =
-- 'ISO/IEC 27001 es un conjunto de estándares desarrollados -o en fase de desarrollo- por ISO (International Organization for Standardization) e IEC (International Electrotechnical Commission), que proporcionan un marco de gestión de la seguridad de la información utilizable por cualquier tipo de organización, pública o privada, grande o pequeña.' WHERE ident = 6;
-- 
-- UPDATE `exhibitions` SET `abstract` = '' WHERE ident = 7;
-- 
-- UPDATE `exhibitions` SET `abstract` =
-- 'Normalmente las empresas garantizan la seguridad de sus datos mediante la aplicación de dispositivos que ayudan a cuidar su frontera hacia Internet previniendo posibles ataques externos, pero muchas veces se olvidan de brindar seguridad al interior de la empresa. Dentro de la red local de la empresa la información que circula por las redes informáticas es bastante critica, si un atacante llega a tener acceso a la red puede realizar ataques desde denegación de servicio hasta robo de datos permitiendo la fuga de información. En la conferencia se hablará de las vulnerabilidades que atrae una mala o nula implementación de medidas de seguridad interna, como los riesgos de fuga de información y las medidas para mitigarlos.' WHERE ident = 8;
-- 
