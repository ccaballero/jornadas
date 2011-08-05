INSERT INTO `users` (`ident`, `role`, `username`, `fullname`, `password`, `email`, `tsregister`) VALUES
( 1, 'exponent',    'lorgio',   'Ing. Lorgio Alexander Lazarte Zurita', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'lorgi51@gmail.com', 1312522087),
( 2, 'exponent',    'alvaro',   'Ing. Alvaro Andrade Sejas', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'admin@ehacking.com.bo', 1312522087),
( 3, 'exponent',    'efrain',   'Efraín Fernando Luna Mamani', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'iteluna@gmail.com', 1312522087),
( 4, 'exponent',    'luis',     'Lic. Luis Alberto Coronado', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'asdf1', 1312522087),
( 5, 'exponent',    'vladimir', 'Msc. Costas Jáuregui Vladimir', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'asdf2', 1312522087),
( 6, 'exponent',    'jorge',    'Msc. Ing. Orellana Araoz Jorge Walter', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'asdf3', 1312522087),
( 7, 'exponent',    'gonzalo',  'Gonzalo Nina Mamani', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'lorddemon@gmail.com', 1312522087),
( 8, 'participant', 'carlos',   'Carlos Eduardo Caballero Burgoa', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'cijkb.j@gmail.com', 1312522087),
( 9, 'participant', 'baudilio', 'Baudilio Huanca Alconz', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'klb.imfo642@gmail.com', 1312522087),
(10, 'participant', 'edgar',    'Edgar Valencia', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'rhcparthasfrozen@gmail.com', 1312522087),
(11, 'participant', 'eduardo',  'Eduardo Soliz Valdez', 'e3bfefac763882f82a67fc0cdc42d284ad01d36a', 'eduardoscesi@gmail.com', 1312522087);

INSERT INTO `expositions` (`ident`, `title`, `exponent`, `tsregister`) VALUES
(1, 'Analisis Forense en sistemas windows', 1, 1312522087),
(2, 'ISO 27001 Orientado a Entidades Financieras', 2, 1312522087),
(3, 'ITIL 27000', 3, 1312522087),
(4, 'Seguridad y configuracion de Servidores', 4, 1312522087),
(5, 'Seguridad Web', 5, 1312522087),
(6, 'Seguridad en Redes', 6, 1312522087),
(7, 'Cuidado Nos atacan Desde Dentro', 7, 1312522087);

/*
INSERT INTO `exposiciones_inscripciones` (`participante`, `exposicion`, `registro`) VALUES
(3, 1, CURRENT_TIMESTAMP()), (3, 2, CURRENT_TIMESTAMP());

INSERT INTO `noticias` (`ident`, `exposicion`, `autor`, `registro`, `titulo`, `contenido`) VALUES
(1, 1, 1, CURRENT_TIMESTAMP(), 'Pathfinder', 'El día 4 de julio de 1997 el Mars Pathfinder aterriza en Marte y a las pocas horas empieza a enviar las fotos de Marte en alta calidad que todos conocemos. La misión hasta ese momento de calificó de éxito. Se despliega la nave que sirvió para el viaje y para el aterrizaje –el SpaceCraft/Lander – para dejar salir al Sojounder Rover'),
(1, 2, 3, CURRENT_TIMESTAMP(), 'Nissan', 'La última avanzadilla del futuro está asomando la nariz en la factoría japonesa de la compañía Nissan. El gran mérito de su nuevo modelo Cero Emisiones: no necesitar cables para la recarga de electricidad. Mediante esta innovación el automóvil podrá repostar sin necesidad de cables en lugares adecuadamente equipados, tales como aparcamientos o estaciones de servicio: le bastará colocarse cerca de un punto de recarga.'),
(2, 3, 2, CURRENT_TIMESTAMP(), 'Astronautas', 'El experimentado astronauta David Wolf tiene un consejo para aquellos que se preguntan cómo estornudar en un traje espacial.'),
(2, 4, 3, CURRENT_TIMESTAMP(), 'Nostalgias', 'El avance de la tecnología es algo maravilloso, aunque los que crecimos con ciertos elementos de los cuales nos fuimos despidiendo, conocemos la nostalgia de los tiempos pasados, aunque no hayan sido mejores. ¿Se imaginan todas las cosas que, por estos avances, nuestros hijos seguramente no van a conocer? Pues Wired ha hecho una lista con las cien cosas que nuestors hijos nunca llegarán a conocer; además hay 27 traducidas en el primer comentario (¿algún voluntario para el resto?).'),
(2, 5, 3, CURRENT_TIMESTAMP(), 'iPhones', 'He visto que en hay un grupo de iPhone, me parece genial que esten queriendo hacer software para el iPhone. Quisiera darles una mano (si es que la aceptan), poco a poco se daran cuenta que les tomara un poquito de tiempo en su entrenamiento antes de ser capaces de hacer un juego "decente" que llegue a ser comercial.'),
(2, 6, 2, CURRENT_TIMESTAMP(), 'Opera', 'Un trabajador de Opera ha explicado una anécdota sobre lo que podría ser una línea de JavaScript que salió muy cara. Cuando la empresa Opera estaba pensando en desembolsar una gran suma de dinero en servidores, diferentes compañías les enviaron máquinas de prueba. Al probar la interfaz de administración vía web de un servidor que provenía de un importante distribuidor de hardware, encontraron que había cierto código JavaScript que detectaba si el navegador es Opera para redirigirlo directamente a una página de error. Obviamente perdieron la venta. ');

INSERT INTO `noticias_comentarios` (`exposicion`, `noticia`, `autor`, `registro`, `contenido`) VALUES
(1, 1, 1, CURRENT_TIMESTAMP(), '+1'),
(1, 1, 1, CURRENT_TIMESTAMP(), '+2'),
(1, 2, 2, CURRENT_TIMESTAMP(), 'Bueno'),
(2, 4, 2, CURRENT_TIMESTAMP(), 'Bien'),
(2, 4, 3, CURRENT_TIMESTAMP(), 'Que poderoso'),
(2, 4, 1, CURRENT_TIMESTAMP(), 'Super!! +1');
*/
