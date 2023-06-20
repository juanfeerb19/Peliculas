-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2023 a las 19:53:37
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actor`
--

INSERT INTO `actor` (`actor_id`, `nombres`, `apellidos`, `nacionalidad`) VALUES
(1, 'Leonardo', 'Di Caprio', 'Estadounidense'),
(2, 'Jennifer', 'Aniston', 'Estadounidense'),
(3, 'Robin', 'Williams', 'Estadounidense'),
(4, 'Dwayne', 'Johnson', 'Estadounidense'),
(5, 'Vin', 'Diesel', 'Estadounidense'),
(6, 'Roberto', 'Benigni', 'Italiano'),
(7, 'Robert', 'Downey Jr.', 'Estadounidense'),
(8, 'Patrick', 'Wilson', 'Estadounidense'),
(9, 'Ryan', 'Gosling', 'Canadiense'),
(10, 'Conor', 'McGregor', 'Irlandés'),
(11, 'Rachel', 'McAdams', 'Canadiense'),
(12, 'Adam', 'Sandler', 'Estadounidense'),
(13, 'Eddie', 'Redmayne', 'Inglés'),
(14, 'Emma', 'Watson', 'Francesa'),
(15, 'Scarlett', 'Johansson', 'Estadounidense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `gen_id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`gen_id`, `nombre`, `descripcion`) VALUES
(1, 'Acción', 'Películas llenas de emocionantes escenas de acción.'),
(2, 'Comedia', 'Películas divertidas y entretenidas.'),
(3, 'Drama', 'Películas que exploran las emociones humanas.'),
(4, 'Ciencia ficción', 'Películas que presentan elementos futuristas y tecnológicos.'),
(5, 'Aventura', 'Películas llenas de emocionantes aventuras.'),
(6, 'Animación', 'Películas animadas con personajes ficticios.'),
(7, 'Romance', 'Películas que exploran relaciones amorosas.'),
(8, 'Fantasía', 'Películas con elementos mágicos y sobrenaturales.'),
(9, 'Suspenso', 'Películas que mantienen la tensión y el misterio.'),
(10, 'Documental', 'Películas que presentan hechos reales y documentados.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion`
--

CREATE TABLE `participacion` (
  `part_id` int(11) NOT NULL,
  `pelicula_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `rol` varchar(25) DEFAULT NULL,
  `fecha_part` date DEFAULT NULL,
  `calificacion_act` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participacion`
--

INSERT INTO `participacion` (`part_id`, `pelicula_id`, `actor_id`, `rol`, `fecha_part`, `calificacion_act`) VALUES
(1, 1, 1, 'Protagonista', '1998-02-13', 9.5),
(2, 2, 1, 'Protagonista', '2010-08-06', 8),
(3, 3, 3, 'Protagonista', '1995-12-15', 8.7),
(4, 4, 14, 'Secundario', '2002-11-22', 8.8),
(5, 5, 7, 'Protagonista', '2012-04-27', 8.6),
(6, 6, 12, 'Protagonista', '2013-07-12', 7.5),
(7, 8, 8, 'Protagonista', '2011-04-01', 8.8),
(8, 9, 7, 'Secundario', '2010-01-01', 7.2),
(9, 10, 10, 'Principal', '2023-05-09', 9.4),
(10, 11, 6, 'Protagonista', '1999-03-05', 9.2),
(11, 12, 9, 'Secundario', '2004-06-25', 8.4),
(12, 13, 7, 'Protagonista', '2008-04-30', 8.6),
(13, 14, 13, 'Protagonista', '2016-11-18', 8.1),
(14, 15, 4, 'Protagonista', '2015-05-28', 7.9),
(15, 16, 4, 'Secundario', '2011-04-29', 8.1),
(16, 16, 5, 'Protagonista', '2011-04-29', 8.1),
(17, 17, 5, 'Protagonista', '2004-05-21', 9.3),
(18, 18, 4, 'Protagonista', '2004-01-01', 7.1),
(19, 19, 2, 'Protagonista', '2011-04-01', 8.5),
(20, 19, 12, 'Protagonista', '2011-04-01', 8.5),
(21, 20, 2, 'Protagonista', '2019-06-14', 8.6),
(22, 20, 12, 'Protagonista', '2019-06-14', 8.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `pelicula_id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `gen_id` int(11) DEFAULT NULL,
  `anio_lanzamiento` int(11) DEFAULT NULL,
  `link_img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`pelicula_id`, `titulo`, `gen_id`, `anio_lanzamiento`, `link_img`) VALUES
(1, 'Titanic', 3, 1997, 'https://c8.alamy.com/compes/b3n6b7/titanic-cartel-de-1997-tcf-lightstorm-pelicula-con-kate-winslet-y-leonardo-dicaprio-b3n6b7.jpg'),
(2, 'El Origen', 4, 2010, 'https://i.blogs.es/89d7af/inception-poster/1366_2000.jpg'),
(3, 'Jumanji', 5, 1995, 'https://c8.alamy.com/compes/2jhn5p4/cartel-de-robin-williams-jumanji-1995-2jhn5p4.jpg'),
(4, 'harry potter y la cámara secreta', 5, 2002, 'https://c8.alamy.com/compes/2c7gjg2/harry-potter-y-la-camara-de-los-secretos-poster-de-la-pelicula-2c7gjg2.jpg'),
(5, 'Los Vengadores', 4, 2012, 'https://lumiere-a.akamaihd.net/v1/images/the_avengers_2012_poster_july_disney_plus_drops_d4bd9c6e.png'),
(6, 'Son como niños 2', 2, 2013, 'https://www.impactohd.cl/30802/son-como-ninos-2.jpg'),
(7, 'Frozen: una aventura congelada', 6, 2013, 'https://2.bp.blogspot.com/-RidwZL0DLms/UlNDdmlLYuI/AAAAAAAAlbs/jEV52OUW-uI/s1600/frozen-una-aventura-congelada-poster-elsa.JPG'),
(8, 'La Noche del Demonio', 9, 2010, 'https://365cine.files.wordpress.com/2011/03/insidious.jpg'),
(9, 'Los Vengadores 2', 4, 2015, 'https://im.ziffdavisinternational.com/ign_es/screenshot/default/avengers2-poster2_eh1g.jpg'),
(10, 'Conor McGregor Forever', 10, 2023, 'https://m.media-amazon.com/images/M/MV5BY2IxZDU5YzYtNzAzYi00ZDk0LWE5OTUtZWNhMTg2ODliZWYzXkEyXkFqcGdeQXVyNDQ2NTgxNTY@._V1_FMjpg_UX1000_.jpg'),
(11, 'La vida es bella', 3, 1997, 'https://play-lh.googleusercontent.com/DqdhXAU_3FhTkRr4O6hWUcqSpGmJRI2CpL2KJ19ce1prv6Y3rwFx27_nXLX7Aw_Pts8j=w240-h480-rw'),
(12, 'El diario de Noa', 7, 2004, 'https://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/67/61/01/20070878.jpg'),
(13, 'Iron Man', 4, 2008, 'https://i.blogs.es/7e29c1/ironmanposterint/450_1000.jpg'),
(14, 'Animales Fantasticos', 8, 2016, 'https://i0.wp.com/cinemedios.com/wp-content/uploads/2016/10/fantastic-beasts-newt-scamander-poster.jpg?ssl=1'),
(15, 'Terremoto: La Falla de San Andres', 1, 2015, 'https://exorcine.files.wordpress.com/2015/04/san-andres-1.jpg'),
(16, 'Rapido y Furioso', 1, 2001, 'https://static.wikia.nocookie.net/atodogas/images/c/c1/R%C3%A1pido_y_furioso.jpg/revision/latest?cb=20150409191706&path-prefix=es'),
(17, 'Rapido y Furioso 2', 1, 2004, 'https://static.wikia.nocookie.net/atodogas/images/a/a6/A_todo_gas_2.jpg/revision/latest?cb=20130403151215&path-prefix=es'),
(18, 'Black Adam', 4, 2022, 'https://static.wikia.nocookie.net/dcextendeduniverse/images/8/89/Black_Adam_-_Poster_Final.png/revision/latest?cb=20220908011651&path-prefix=es'),
(19, 'Una esposa de mentira', 7, 2011, 'https://www.themoviedb.org/t/p/original/ixkQSNNtJVYaYA1ZugGJkARuCNT.jpg'),
(20, 'Misterio a Bordo', 2, 2019, 'https://play-lh.googleusercontent.com/proxy/BtfWI8sRD3_AYdwXdEsgOBo5JSuFjDwql7OJpuwXpg1isITUJGsrNWSuvW1zr9sIyMj53QnJR7wZN_3seNTFgAx62wl1bMD6IRSHNAhjo0s5SKqv-BfcGdn8EO6CcKF1WWAT8vdmgfsNxlxjgGMVlELHUxSTwTGMpCbo_A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `full_name`, `email`, `password`) VALUES
(1, 'cristian ruiz', 'jfbetancurth@soy.sena.edu.co', '123'),
(2, 'cristian ruiz', 'jfbetancurth@soy.sena.edu.co', '12345'),
(3, 'darlin rivas', 'DARLIN@GMAIL.COM', '181'),
(4, 'juanchus estyle', 'juanis@gmail.com', '123456'),
(5, 'juanchus estyle', 'juanis@gmail.com', '123456'),
(6, 'juanchus estyle', 'juanis@gmail.com', '123456'),
(7, 'juanchus estyle', 'juanis@gmail.com', '123456'),
(8, 'juanchus estyle', 'juanis@gmail.com', '123456'),
(9, 'juanchus estyle', 'juanis@gmail.com', '123456'),
(10, 'mafe', 'mafe@gmail.com', '12345678');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indices de la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `pelicula_id` (`pelicula_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`pelicula_id`),
  ADD KEY `gen_id` (`gen_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actor`
--
ALTER TABLE `actor`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `participacion`
--
ALTER TABLE `participacion`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `pelicula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD CONSTRAINT `participacion_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `pelicula` (`pelicula_id`),
  ADD CONSTRAINT `participacion_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`);

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`gen_id`) REFERENCES `genero` (`gen_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
