
INSERT INTO `usuarios` (`ident`, `nombre`, `rol`, `correo`, `clave`, `registro`) VALUES
(1, 'Carlos Caballero', 'expositor', 'cijkb.j@gmail.com', '63ca26f56c5730ede6b21c7b681b917e2fb37765', CURRENT_TIMESTAMP()),
(2, 'Baudilio Huanca', 'expositor', 'klb.imfo642@gmail.com', '63ca26f56c5730ede6b21c7b681b917e2fb37765', CURRENT_TIMESTAMP()),
(3, 'Edgar Valencia', 'participante', 'rhcparthasfrozen@gmail.com', '63ca26f56c5730ede6b21c7b681b917e2fb37765', CURRENT_TIMESTAMP()),
(4, 'Eduardo Soliz', 'participante', 'eduardoscesi@gmail.com', '63ca26f56c5730ede6b21c7b681b917e2fb37765', CURRENT_TIMESTAMP());

INSERT INTO `exposiciones` (`ident`, `titulo`, `expositor`) VALUES
(1, 'Exposicion 1', 1),
(2, 'Exposicion 2', 1),
(3, 'Exposicion 3', 2);

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
