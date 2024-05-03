-- Creazione del database
CREATE DATABASE netflix_clone;

-- Utilizzo del database
USE netflix_clone;

-- Tabella degli utenti
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (username),
    UNIQUE (email)
);

-- Tabella dei film
CREATE TABLE movies (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    release_year YEAR,
    duration_minutes INT,
    genre VARCHAR(100),
    cover_image_url VARCHAR(255),
    trailer_url VARCHAR(255),
    director VARCHAR(100),
    rating DECIMAL(3,1),
    language VARCHAR(50),
    country VARCHAR(50)
);

-- Tabella degli attori
CREATE TABLE actors (
    actor_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Tabella di associazione tra film e attori (relazione molti-a-molti)
CREATE TABLE movie_actors (
    movie_id INT,
    actor_id INT,
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
    FOREIGN KEY (actor_id) REFERENCES actors(actor_id),
    PRIMARY KEY (movie_id, actor_id)
);

-- Tabella delle recensioni
CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT,
    user_id INT,
    rating INT,
    comment TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Tabella delle playlist
CREATE TABLE playlists (
    playlist_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(100),
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Tabella di associazione tra playlist e film (relazione uno-a-molti)
CREATE TABLE playlist_movies (
    playlist_id INT,
    movie_id INT,
    FOREIGN KEY (playlist_id) REFERENCES playlists(playlist_id),
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
    PRIMARY KEY (playlist_id, movie_id)
);