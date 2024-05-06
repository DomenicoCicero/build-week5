-- Inserimento di dati nella tabella degli attori
INSERT INTO actors (name) VALUES
('Tom Hanks'),
('Leonardo DiCaprio'),
('Scarlett Johansson'),
('Brad Pitt'),
('Meryl Streep');

-- Inserimento di dati nella tabella dei film
INSERT INTO movies (title, description, release_year, duration_minutes, genre, cover_image_url, trailer_url, director, rating, language, country)
VALUES
('Inception', 'Un ladro esperto è in grado di entrare nei sogni delle persone e rubare i loro segreti più preziosi.', 2010, 148, 'Azione, Fantascienza', 'cover_images/inception.jpg', 'trailers/inception_trailer.mp4', 'Christopher Nolan', 8.8, 'Inglese', 'USA'),
('The Dark Knight', 'Batman affronta il Joker, un criminale psicopatico che crea il caos a Gotham City.', 2008, 152, 'Azione, Crimine, Drammatico', 'cover_images/dark_knight.jpg', 'trailers/dark_knight_trailer.mp4', 'Christopher Nolan', 9.0, 'Inglese', 'USA'),
('Interstellar', "Un gruppo di esploratori spaziali viaggia attraverso un wormhole in cerca di un nuovo pianeta abitabile per l'umanità.", 2014, 169, 'Avventura, Drammatico, Fantascienza', 'cover_images/interstellar.jpg', 'trailers/interstellar_trailer.mp4', 'Christopher Nolan', 8.6, 'Inglese', 'USA'),
('Pulp Fiction', 'Storie incrociate di criminali, gangster e personaggi bizzarri nel mondo del crimine.', 1994, 154, 'Crimine, Drammatico', 'cover_images/pulp_fiction.jpg', 'trailers/pulp_fiction_trailer.mp4', 'Quentin Tarantino', 8.9, 'Inglese', 'USA'),
('The Matrix', 'Un hacker scopre la verità sul mondo in cui vive e diventa coinvolto in una ribellione contro le macchine.', 1999, 136, 'Azione, Fantascienza', 'cover_images/matrix.jpg', 'trailers/matrix_trailer.mp4', 'Lana Wachowski, Lilly Wachowski', 8.7, 'Inglese', 'USA'),
('The Lord of the Rings: The Fellowship of the Ring', "Un giovane hobbit si imbarca in un'epica avventura per distruggere un potente anello e salvare il suo mondo dalla distruzione.", 2001, 178, 'Avventura, Drammatico, Fantasy', 'cover_images/lotr_fellowship.jpg', 'trailers/lotr_fellowship_trailer.mp4', 'Peter Jackson', 8.8, 'Inglese', 'USA'),
('The Godfather', 'La storia epica di una famiglia criminale italo-americana nel corso di diverse generazioni.', 1972, 175, 'Crimine, Drammatico', 'cover_images/godfather.jpg', 'trailers/godfather_trailer.mp4', 'Francis Ford Coppola', 9.2, 'Inglese', 'USA'),
('Fight Club', 'Un impiegato insoddisfatto e un venditore di sapone carismatico creano un club clandestino dove combattono.', 1999, 139, 'Drammatico', 'cover_images/fight_club.jpg', 'trailers/fight_club_trailer.mp4', 'David Fincher', 8.8, 'Inglese', 'USA'),
('Goodfellas', 'La vita di un giovane criminale che si apre la strada attraverso la mafia italo-americana.', 1990, 146, 'Biografia, Crimine, Drammatico', 'cover_images/goodfellas.jpg', 'trailers/goodfellas_trailer.mp4', 'Martin Scorsese', 8.7, 'Inglese', 'USA'),
("Schindler's List", "Un imprenditore tedesco salva migliaia di ebrei durante l'Olocausto.", 1993, 195, 'Biografia, Drammatico, Storico', 'cover_images/schindlers_list.jpg', 'trailers/schindlers_list_trailer.mp4', 'Steven Spielberg', 8.9, 'Inglese', 'USA'),
('The Silence of the Lambs', "Un giovane agente dell'FBI si rivolge a un noto psichiatra criminale per aiutarla a catturare un serial killer.", 1991, 118, 'Crimine, Drammatico, Thriller', 'cover_images/silence_of_the_lambs.jpg', 'trailers/silence_of_the_lambs_trailer.mp4', 'Jonathan Demme', 8.6, 'Inglese', 'USA'),
('The Green Mile', 'Un uomo dotato di poteri soprannaturali lavora come guardia in una prigione durante la Grande Depressione.', 1999, 189, 'Crimine, Drammatico, Fantasy', 'cover_images/green_mile.jpg', 'trailers/green_mile_trailer.mp4', 'Frank Darabont', 8.6, 'Inglese', 'USA'),
('Inglourious Basterds', 'Durante la Seconda Guerra Mondiale, un gruppo di soldati americani e un feroce ebreo sfidano i nazisti.', 2009, 153, 'Avventura, Crimine, Drammatico', 'cover_images/inglourious_basterds.jpg', 'trailers/inglourious_basterds_trailer.mp4', 'Quentin Tarantino', 8.3, 'Inglese', 'USA'),
('The Departed', "Una spia della polizia e un infiltrato nella malavita cercano di scoprire l'identità l'uno dell'altro.", 2006, 151, 'Crimine, Drammatico, Thriller', 'cover_images/departed.jpg', 'trailers/departed_trailer.mp4', 'Martin Scorsese', 8.5, 'Inglese', 'USA'),
('Gladiator', "Un generale romano tradito diventa gladiatore e cerca vendetta contro l'imperatore che ha assassinato la sua famiglia.", 2000, 155, 'Azione, Avventura, Drammatico', 'cover_images/gladiator.jpg', 'trailers/gladiator_trailer.mp4', 'Ridley Scott', 8.5, 'Inglese', 'USA'),
('The Prestige', 'Due illusionisti rivali intraprendono una battaglia per creare il miglior trucco di magia.', 2006, 130, 'Drammatico, Mistero, Thriller', 'cover_images/prestige.jpg', 'trailers/prestige_trailer.mp4', 'Christopher Nolan', 8.5, 'Inglese', 'USA'),
('The Social Network', 'La storia della fondazione di Facebook e delle controversie che ne sono seguite.', 2010, 120, 'Biografia, Drammatico', 'cover_images/social_network.jpg', 'trailers/social_network_trailer.mp4', 'David Fincher', 7.7, 'Inglese', 'USA');

-- Associazione tra film e attori (continuazione)
INSERT INTO movie_actors (movie_id, actor_id) VALUES
(1, 1), -- Forrest Gump - Tom Hanks
(2, 2), -- Titanic - Leonardo DiCaprio
(2, 3), -- Titanic - Scarlett Johansson
(3, 1), -- The Shawshank Redemption - Tom Hanks
(4, 2), -- Inception - Leonardo DiCaprio
(4, 4), -- Inception - Brad Pitt
(5, 4), -- The Dark Knight - Brad Pitt
(5, 5), -- The Dark Knight - Meryl Streep
(6, 1), -- Interstellar - Tom Hanks
(7, 1), -- Pulp Fiction - Tom Hanks
(7, 2), -- Pulp Fiction - Leonardo DiCaprio
(8, 5), -- The Matrix - Meryl Streep
(9, 3), -- The Lord of the Rings: The Fellowship of the Ring - Scarlett Johansson
(9, 4), -- The Lord of the Rings: The Fellowship of the Ring - Brad Pitt
(10, 2), -- The Godfather - Leonardo DiCaprio
(10, 4), -- The Godfather - Brad Pitt
(11, 2), -- Fight Club - Leonardo DiCaprio
(11, 4), -- Fight Club - Brad Pitt
(12, 1), -- Goodfellas - Tom Hanks
(13, 1), -- Schindler's List - Tom Hanks
(14, 2), -- The Silence of the Lambs - Leonardo DiCaprio
(15, 1), -- The Green Mile - Tom Hanks
(16, 2), -- Inglourious Basterds - Leonardo DiCaprio
(16, 3); -- Inglourious Basterds - Scarlett Johansson

-- Inserimento di dati nella tabella degli utenti
INSERT INTO users (username, email, password) VALUES
('user1', 'user1@example.com', 'password1'),
('user2', 'user2@example.com', 'password2'),
('user3', 'user3@example.com', 'password3');

-- Inserimento di dati nella tabella delle recensioni
INSERT INTO reviews (movie_id, user_id, rating, comment) VALUES
(1, 1, 9, 'Uno dei miei film preferiti di sempre!'),
(2, 2, 8, 'Un classico indimenticabile.'),
(3, 3, 10, 'Assolutamente eccezionale!');

-- Creazione di una playlist per ciascun utente
INSERT INTO playlists (user_id, name) VALUES
(1, 'Film preferiti'),
(2, 'Da guardare'),
(3, 'Classici');