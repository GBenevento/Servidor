-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2022 a las 08:25:09
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `films`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_actors`
--

CREATE TABLE `t_actors` (
  `ID` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_actors`
--

INSERT INTO `t_actors` (`ID`, `name`) VALUES
(1, 'Mitsuo Iwata'),
(2, 'Nozomu Sasaki'),
(3, 'Mami Koyama'),
(4, ' Miyu Irino'),
(5, ' Saori Hayami'),
(6, ' Aoi Yūki'),
(7, 'Ryunosuke Kamiki'),
(8, 'Mone Kamishiraishi'),
(9, 'Ryo Narita'),
(10, 'Kōji Yakusho'),
(11, 'Shōta Sometani'),
(12, 'Aoi Miyazaki'),
(13, 'Rumi Hiiragi'),
(14, 'Miyu Irino'),
(15, 'Mari Natsuki'),
(16, 'Tsutomu Tatsumi'),
(17, 'Ayano Shiraishi'),
(18, 'Yōji Matsuda'),
(19, 'Yuriko Ishida'),
(20, 'Yūko Tanaka'),
(21, 'Matthew McConaughey'),
(22, 'Jessica Chastain'),
(23, 'Anne Hathaway'),
(24, 'Keanu Reeves'),
(25, 'Carrie-Anne Moss'),
(26, 'Laurence Fishburne'),
(27, 'Hugo Weaving'),
(28, 'Keir Dullea'),
(29, 'Gary Lockwood'),
(30, 'Sigourney Weaver'),
(31, 'Tom Skerritt'),
(32, 'Veronica Cartwright'),
(33, 'Zoe Saldaña'),
(34, 'Sam Worthington'),
(35, 'Michael J. Fox'),
(36, 'Christopher Lloyd'),
(37, 'Lea Thompson');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_actors_films`
--

CREATE TABLE `t_actors_films` (
  `actor_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_actors_films`
--

INSERT INTO `t_actors_films` (`actor_id`, `film_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 3),
(8, 3),
(9, 3),
(10, 4),
(11, 4),
(12, 4),
(13, 5),
(14, 5),
(15, 5),
(16, 6),
(17, 6),
(18, 7),
(19, 7),
(20, 7),
(21, 8),
(22, 8),
(23, 8),
(24, 9),
(25, 9),
(26, 9),
(27, 9),
(28, 10),
(29, 10),
(30, 11),
(30, 12),
(31, 11),
(32, 11),
(33, 12),
(34, 12),
(35, 13),
(36, 13),
(37, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categories`
--

CREATE TABLE `t_categories` (
  `ID` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `image` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_categories`
--

INSERT INTO `t_categories` (`ID`, `name`, `image`) VALUES
(1, 'Anime', 'anime'),
(2, 'Sci-Fi', 'sci-fi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_directors`
--

CREATE TABLE `t_directors` (
  `ID` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_directors`
--

INSERT INTO `t_directors` (`ID`, `name`) VALUES
(1, 'Katsuhiro Otomo'),
(2, 'Naoko Yamada'),
(3, 'Makoto Shinkai'),
(4, 'Mamoru Hosoda'),
(5, 'Hayao Miyazaki'),
(6, ' Isao Takahata'),
(7, 'Christopher Nolan'),
(8, 'Lana Wachowski'),
(9, 'Lilly Wachowski'),
(10, 'Stanley Kubrick'),
(11, ' Ridley Scott'),
(12, 'James Cameron'),
(13, 'David Fincher'),
(14, 'Jean-Pierre Jeunet'),
(15, 'Biagio Proietti'),
(16, 'Ciro Ippolito'),
(17, 'Robert Zemeckis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_directors_films`
--

CREATE TABLE `t_directors_films` (
  `director_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_directors_films`
--

INSERT INTO `t_directors_films` (`director_id`, `film_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(5, 7),
(6, 6),
(7, 8),
(8, 9),
(9, 9),
(10, 10),
(11, 11),
(12, 11),
(12, 12),
(13, 11),
(14, 11),
(15, 11),
(16, 11),
(17, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_films`
--

CREATE TABLE `t_films` (
  `ID` int(11) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `release_year` int(4) DEFAULT NULL,
  `length_minutes` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(25) DEFAULT NULL,
  `votes` int(11) DEFAULT 0,
  `synopsis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_films`
--

INSERT INTO `t_films` (`ID`, `title`, `release_year`, `length_minutes`, `category_id`, `image`, `votes`, `synopsis`) VALUES
(1, 'Akira', 1988, 124, 1, 'akira', 0, 'Neo-Tokyo, year 2019. After a strange accident, the young Tetsuo is subjected to secret experiments to control the mind.'),
(2, 'A Silent Voice', 2016, 129, 1, 'silent', 0, 'Shôko Nishimiya, a deaf elementary school student is bullied by her new classmates and she changes schools. Years later, Ishida, one of Shôko’s old bullies, will seek redemption for his bad deeds.'),
(3, 'Your Name', 2016, 112, 1, 'name', 0, 'Young Taki lives in Tokyo; Young Mitsuha - in a small town in the mountains. Whilst they dream, the bodies of both are exchanged. Locked up in a body that is strange to eachother, they begin to communicate.\r\n\r\n'),
(4, 'The Boy and the Beast', 2015, 120, 1, 'beast', 0, 'Kyuta is a lonely boy who lives in Tokyo. Kumatetsu is a supernatural being isolated in an imaginary world. One day Kyuta crosses the border into the imaginary world and befriends the creature.'),
(5, 'Spirited Away', 2001, 125, 1, 'spirit', 0, 'Chihiro is a temperamental and headstrong ten-year-old girl who believes that the entire universe should submit to her wishes.'),
(6, 'Grave of the Fireflies', 1988, 89, 1, 'grave', 0, 'Seita is forced to take care of his younger sister Setsuko after an allied-bombing raid during World War II destroys their home.'),
(7, 'Princess Mononoke', 1997, 133, 1, 'princess', 0, 'A young prince, mortally wounded by a demon, travels to a remote town to carry out a difficult mission: to reconcile the two women responsible for the imminent destruction of the place.'),
(8, 'Interstellar', 2014, 169, 2, 'interstellar', 0, 'A group of scientists and explorers, led by Cooper, embark on a space journey to find a place with the necessary conditions to replace Earth and start a new life there.'),
(9, 'The Matrix', 1999, 136, 2, 'matrix', 0, 'The programmer Thomas Anderson, better known in the world of \"hackers\" as Neo, is in the crosshairs of the fearsome agent Smith. Two other hackers, Trinity and Morpheus, contact Neo to help him escape. The Matrix owns you. Follow the white rabbit.'),
(10, '2001: A Space Odyssey', 1968, 143, 2, 'odyssey', 0, 'After uncovering a mysterious artifact buried beneath the Lunar surface, a spacecraft is sent to Jupiter to find its origins - a spacecraft manned by two men and the supercomputer H.A.L. 9000.'),
(11, 'Alien', 1979, 116, 2, 'alien', 0, 'The crew of the space tug Nostromo respond to a distress signal and unknowingly come aboard a deadly alien life form.'),
(12, 'Avatar', 2009, 162, 2, 'avatar', 0, 'We enter the world of Avatar at the hands of Jake Sully, an ex-Marine in a wheelchair, who has been recruited to travel to Pandora, where there is a rare and precious mineral that can solve the existing energy crisis on Earth.'),
(13, 'Back to the Future', 1985, 116, 2, 'future', 0, 'Teenager Marty McFly is friends with Doc, a scientist who has built a time machine. As the two try out the artifact, a random mistake sends Marty back to 1955, the year his parents were in high school and hadn\'t met yet.\r\n\r\n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_actors`
--
ALTER TABLE `t_actors`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `t_actors_films`
--
ALTER TABLE `t_actors_films`
  ADD PRIMARY KEY (`actor_id`,`film_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indices de la tabla `t_categories`
--
ALTER TABLE `t_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `t_directors`
--
ALTER TABLE `t_directors`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `t_directors_films`
--
ALTER TABLE `t_directors_films`
  ADD PRIMARY KEY (`director_id`,`film_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indices de la tabla `t_films`
--
ALTER TABLE `t_films`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_actors`
--
ALTER TABLE `t_actors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `t_categories`
--
ALTER TABLE `t_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_directors`
--
ALTER TABLE `t_directors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `t_films`
--
ALTER TABLE `t_films`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_actors_films`
--
ALTER TABLE `t_actors_films`
  ADD CONSTRAINT `t_actors_films_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `t_actors` (`ID`),
  ADD CONSTRAINT `t_actors_films_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `t_films` (`ID`);

--
-- Filtros para la tabla `t_directors_films`
--
ALTER TABLE `t_directors_films`
  ADD CONSTRAINT `t_directors_films_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `t_films` (`ID`),
  ADD CONSTRAINT `t_directors_films_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `t_directors` (`ID`);

--
-- Filtros para la tabla `t_films`
--
ALTER TABLE `t_films`
  ADD CONSTRAINT `t_films_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `t_categories` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
