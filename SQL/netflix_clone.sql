-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 06, 2024 alle 14:12
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netflix_clone`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `actors`
--

CREATE TABLE `actors` (
  `actor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `actors`
--

INSERT INTO `actors` (`actor_id`, `name`) VALUES
(1, 'Tom Hanks'),
(2, 'Leonardo DiCaprio'),
(3, 'Scarlett Johansson'),
(4, 'Brad Pitt'),
(5, 'Meryl Streep');

-- --------------------------------------------------------

--
-- Struttura della tabella `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `release_year` year(4) DEFAULT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `cover_image_url` varchar(255) DEFAULT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `description`, `release_year`, `duration_minutes`, `genre`, `cover_image_url`, `trailer_url`, `director`, `rating`, `language`, `country`) VALUES
(1, 'Inception', 'Un ladro esperto è in grado di entrare nei sogni delle persone e rubare i loro segreti più preziosi.', '2010', 148, 'Azione, Fantascienza', 'https://i.etsystatic.com/35681979/r/il/a80bfd/3957854063/il_fullxfull.3957854063_5dfy.jpg', 'https://www.youtube.com/watch?v=BV7z0I90MJk', 'Christopher Nolan', 8.8, 'Inglese', 'USA'),
(2, 'The Dark Knight', 'Batman affronta il Joker, un criminale psicopatico che crea il caos a Gotham City.', '2008', 152, 'Azione, Crimine, Drammatico', 'https://e0.pxfuel.com/wallpapers/127/348/desktop-wallpaper-batman-logo-cool-batman-logo.jpg', 'https://www.youtube.com/watch?v=EXeTwQWrcwY', 'Christopher Nolan', 9.0, 'Inglese', 'USA'),
(3, 'Interstellar', 'Un gruppo di esploratori spaziali viaggia attraverso un wormhole in cerca di un nuovo pianeta abitabile per l\'umanità.', '2014', 169, 'Avventura, Drammatico, Fantascienza', 'https://w0.peakpx.com/wallpaper/438/840/HD-wallpaper-interstellar-2014-movie-poster.jpg', 'https://www.youtube.com/watch?v=EIVMVIr3q3Y', 'Christopher Nolan', 8.6, 'Inglese', 'USA'),
(4, 'Pulp Fiction', 'Storie incrociate di criminali, gangster e personaggi bizzarri nel mondo del crimine.', '1994', 154, 'Crimine, Drammatico', 'https://static.posters.cz/image/1300/poster/pulp-fiction-cover-i1288.jpg', 'https://www.youtube.com/watch?v=mg0GqZmoM9M', 'Quentin Tarantino', 8.9, 'Inglese', 'USA'),
(5, 'The Matrix', 'Un hacker scopre la verità sul mondo in cui vive e diventa coinvolto in una ribellione contro le macchine.', '1999', 136, 'Azione, Fantascienza', 'https://c8.alamy.com/comp/2K4TMJ5/the-matrix-1999-the-matrix-movie-poster-keanu-reeves-2K4TMJ5.jpg', 'https://www.youtube.com/watch?v=g0sHIIwI2C4', 'Lana Wachowski, Lilly Wachowski', 8.7, 'Inglese', 'USA'),
(6, 'The Lord of the Rings: The Fellowship of the Ring', 'Un giovane hobbit si imbarca in un\'epica avventura per distruggere un potente anello e salvare il suo mondo dalla distruzione.', '2001', 178, 'Avventura, Drammatico, Fantasy', 'https://www.cinefacts.it/foto/h!il-signore-degli-anelli-le-due-torri-locandina-poster-cinefacts.jpg', 'https://www.youtube.com/watch?v=V75dMMIW2B4', 'Peter Jackson', 8.8, 'Inglese', 'USA'),
(7, 'The Godfather', 'La storia epica di una famiglia criminale italo-americana nel corso di diverse generazioni.', '1972', 175, 'Crimine, Drammatico', 'https://www.crimemuseum.org/wp-content/uploads/2014/06/The-Godfather-1.jpg', 'https://www.youtube.com/watch?v=UaVTIH8mujA', 'Francis Ford Coppola', 9.2, 'Inglese', 'USA'),
(8, 'Fight Club', 'Un impiegato insoddisfatto e un venditore di sapone carismatico creano un club clandestino dove combattono.', '1999', 139, 'Drammatico', 'https://wallpapers.com/images/hd/fight-club-wall-graffiti-iphone-du2xx4ml3m83fvim.jpg', 'https://www.youtube.com/watch?v=BdJKm16Co6M', 'David Fincher', 8.8, 'Inglese', 'USA'),
(9, 'Goodfellas', 'La vita di un giovane criminale che si apre la strada attraverso la mafia italo-americana.', '1990', 146, 'Biografia, Crimine, Drammatico', 'https://m.media-amazon.com/images/I/51gzQ7FJwDL._AC_UF1000,1000_QL80_.jpg', 'https://www.youtube.com/watch?v=2ilzidi_J8Q', 'Martin Scorsese', 8.7, 'Inglese', 'USA'),
(10, 'Schindler\'s List', 'Un imprenditore tedesco salva migliaia di ebrei durante l\'Olocausto.', '1993', 195, 'Biografia, Drammatico, Storico', 'https://m.media-amazon.com/images/I/51obidNvugL._AC_UF1000,1000_QL80_.jpg', 'https://www.youtube.com/watch?v=AMF1AxLsE-s', 'Steven Spielberg', 8.9, 'Inglese', 'USA'),
(11, 'The Silence of the Lambs', 'Un giovane agente dell\'FBI si rivolge a un noto psichiatra criminale per aiutarla a catturare un serial killer.', '1991', 118, 'Crimine, Drammatico, Thriller', 'https://c8.alamy.com/comp/EC7WEP/danish-poster-for-silence-of-the-lambs-the-silence-of-the-lambs-is-EC7WEP.jpg', 'https://www.youtube.com/watch?v=6iB21hsprAQ', 'Jonathan Demme', 8.6, 'Inglese', 'USA'),
(12, 'The Green Mile', 'Un uomo dotato di poteri soprannaturali lavora come guardia in una prigione durante la Grande Depressione.', '1999', 189, 'Crimine, Drammatico, Fantasy', 'https://upload.wikimedia.org/wikipedia/el/c/c0/The_Green_Mile.jpg', 'https://www.youtube.com/watch?v=Ki4haFrqSrw', 'Frank Darabont', 8.6, 'Inglese', 'USA'),
(13, 'Inglourious Basterds', 'Durante la Seconda Guerra Mondiale, un gruppo di soldati americani e un feroce ebreo sfidano i nazisti.', '2009', 153, 'Avventura, Crimine, Drammatico', 'https://images.justwatch.com/poster/121974617/s592/inglourious-basterds', 'https://www.youtube.com/watch?v=KnrRy6kSFF0', 'Quentin Tarantino', 8.3, 'Inglese', 'USA'),
(14, 'The Departed', 'Una spia della polizia e un infiltrato nella malavita cercano di scoprire l\'identità l\'uno dell\'altro.', '2006', 151, 'Crimine, Drammatico, Thriller', 'https://preview.redd.it/my-favorite-movie-of-all-time-enough-said-thoughts-on-the-v0-77d8h85h5fga1.jpg?width=640&crop=smart&auto=webp&s=f62ca997783e91b595c2acc8c98be2b2f4a4cfc6', 'https://www.youtube.com/watch?v=h-d2YdbQ6q8', 'Martin Scorsese', 8.5, 'Inglese', 'USA'),
(15, 'Gladiator', 'Un generale romano tradito diventa gladiatore e cerca vendetta contro l\'imperatore che ha assassinato la sua famiglia.', '2000', 155, 'Azione, Avventura, Drammatico', 'https://c8.alamy.com/compit/k36b6r/gladiator-data-2000-k36b6r.jpg', 'https://www.youtube.com/watch?v=P5ieIbInFpg', 'Ridley Scott', 8.5, 'Inglese', 'USA'),
(16, 'The Prestige', 'Due illusionisti rivali intraprendono una battaglia per creare il miglior trucco di magia.', '2006', 130, 'Drammatico, Mistero, Thriller', 'https://i.pinimg.com/736x/4f/4d/fa/4f4dfabe5c46358c8d821bd2716e8186.jpg', 'https://www.youtube.com/watch?v=R0EX7pO8w50', 'Christopher Nolan', 8.5, 'Inglese', 'USA'),
(17, 'The Social Network', 'La storia della fondazione di Facebook e delle controversie che ne sono seguite.', '2010', 120, 'Biografia, Drammatico', 'https://m.media-amazon.com/images/M/MV5BOGUyZDUxZjEtMmIzMC00MzlmLTg4MGItZWJmMzBhZjE0Mjc1XkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg', 'https://www.youtube.com/watch?v=lB95KLmpLR4', 'David Fincher', 7.7, 'Inglese', 'USA');

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_actors`
--

CREATE TABLE `movie_actors` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movie_actors`
--

INSERT INTO `movie_actors` (`movie_id`, `actor_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 1),
(4, 2),
(4, 4),
(5, 4),
(5, 5),
(6, 1),
(7, 1),
(7, 2),
(8, 5),
(9, 3),
(9, 4),
(10, 2),
(10, 4),
(11, 2),
(11, 4),
(12, 1),
(13, 1),
(14, 2),
(15, 1),
(16, 2),
(16, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `playlists`
--

CREATE TABLE `playlists` (
  `playlist_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `playlists`
--

INSERT INTO `playlists` (`playlist_id`, `user_id`, `name`, `creation_date`) VALUES
(1, 1, 'Film preferiti', '2024-05-03 10:02:49'),
(2, 2, 'Da guardare', '2024-05-03 10:02:49'),
(3, 3, 'Classici', '2024-05-03 10:02:49');

-- --------------------------------------------------------

--
-- Struttura della tabella `playlist_movies`
--

CREATE TABLE `playlist_movies` (
  `playlist_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `reviews`
--

INSERT INTO `reviews` (`review_id`, `movie_id`, `user_id`, `rating`, `comment`, `review_date`) VALUES
(1, 1, 1, 9, 'Uno dei miei film preferiti di sempre!', '2024-05-03 10:02:49'),
(2, 2, 2, 8, 'Un classico indimenticabile.', '2024-05-03 10:02:49'),
(3, 3, 3, 10, 'Assolutamente eccezionale!', '2024-05-03 10:02:49');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `registration_date`) VALUES
(1, 'user1', 'user1@example.com', 'password1', '2024-05-03 10:02:49'),
(2, 'user2', 'user2@example.com', 'password2', '2024-05-03 10:02:49'),
(3, 'user3', 'user3@example.com', 'password3', '2024-05-03 10:02:49'),
(4, 'prova1 ', 'prova1@prova1.com', '$2y$10$Rwwrhkp4Ctz7OM116q72wu.JPZLIgaPyz6bSBFEz0wD8YEQ9bwI9K', '2024-05-03 13:18:47'),
(5, 'prova2', 'prova2@prova2.com', '$2y$10$Iwf4yZdRp4bly.ZBqGM5FuOTthdmQhfstVJ1BrFA8wynua6JkZ3Wi', '2024-05-03 13:42:20'),
(6, 'prova3', 'prova3@prova3.com', '$2y$10$46.aWMi54b7GXblJTBQtxO6b9tJWeUlEPnjffMNSGBrLsR6zNW8xW', '2024-05-03 13:47:53'),
(7, 'prova4', 'prova4@prova4.it', '$2y$10$zoRW0YcnlIrPhqhYnbgSk.FGEkFDJPnwInuaGQhGq6gapkrrgUCLG', '2024-05-03 13:50:45'),
(8, 'prova5', 'prova5@prova5.it', '$2y$10$E5ZnUSbo.omYo3gPQVVG.uqVofR9wvIaTjoDptmLLe0pbm.EE3Kii', '2024-05-03 13:52:09'),
(9, 'prova6', 'prova6@prova.it', '$2y$10$9rZ.J0Mh42X7MeV8kIYhm.qpRRoLPgWPYt9oGzhJFCUqRk2xIBeV2', '2024-05-03 13:59:13'),
(11, 'prova7', 'prova7@prova.it', '$2y$10$XYyWvlbvf3NAJpWwIBx04.kg7fWQ1Pears5L75eEOO8av5FHDYO9i', '2024-05-03 14:01:12'),
(12, 'prova8', 'prova8@prova.it', '$2y$10$uCF6Vn7w40eu91Z/YB1LN.LVZchJxczc2b6nznbNl8dLpA6zvXCTu', '2024-05-03 14:01:42'),
(14, 'prova9', 'prova9@prova.it', '$2y$10$8M1n8wbV5Qxn7RacHy2EtOcpr7Me4mDS67mZrXwg.9nFVtZt0Cnom', '2024-05-03 14:09:03'),
(15, 'prova10', 'prova10@prova.it', '$2y$10$O.biiZZrC.UP.0aRuJNlvOL7fIpCJldTGu6K/9hFp2C5EeSVXDYmK', '2024-05-03 14:57:11'),
(16, 'prova11', 'prova11@prova.it', '$2y$10$fo6VdpkzJeGia0mpiA4g9u7Hjxx7yWiHKWNFltvq96aAdcpuSquIK', '2024-05-03 14:59:27'),
(17, 'prova13', 'prova13@prova.it', '$2y$10$BTA4rEhUSTqa/PHKsmKXH.5tKjefgA8ZakkCeJBKegL.cyDsfTRsG', '2024-05-03 15:00:29'),
(18, 'prova1000', 'prova1000@prova.it', '$2y$10$HO0YONmKHh9Y4hlMFUvo0ekPC3CupBqdOglJbAjwT6m3DYddQxsae', '2024-05-03 15:04:13'),
(19, 'prova1001', 'prova1001@prova.it', '$2y$10$u8lBdneictraA2/Jc/h01.b47R6CejevoB7ILxw1ZwufQYGDN266O', '2024-05-03 15:11:36');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indici per le tabelle `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indici per le tabelle `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indici per le tabelle `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`playlist_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `playlist_movies`
--
ALTER TABLE `playlist_movies`
  ADD PRIMARY KEY (`playlist_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indici per le tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `playlists`
--
ALTER TABLE `playlists`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD CONSTRAINT `movie_actors_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `movie_actors_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`);

--
-- Limiti per la tabella `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Limiti per la tabella `playlist_movies`
--
ALTER TABLE `playlist_movies`
  ADD CONSTRAINT `playlist_movies_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`playlist_id`),
  ADD CONSTRAINT `playlist_movies_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

--
-- Limiti per la tabella `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
