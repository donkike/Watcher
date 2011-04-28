CREATE TABLE director (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE genre (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE movie (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL UNIQUE, director_id BIGINT NOT NULL, genre_id BIGINT NOT NULL, year BIGINT NOT NULL, synopsis TEXT, image_link VARCHAR(255), trailer_link VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX director_id_idx (director_id), INDEX genre_id_idx (genre_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE movie_rating (id BIGINT AUTO_INCREMENT, movie_id BIGINT UNIQUE NOT NULL, aggregate FLOAT(18, 2) DEFAULT 0 NOT NULL, votes BIGINT DEFAULT 0 NOT NULL, average FLOAT(18, 2) DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX movie_id_idx (movie_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE movie ADD CONSTRAINT movie_genre_id_genre_id FOREIGN KEY (genre_id) REFERENCES genre(id);
ALTER TABLE movie ADD CONSTRAINT movie_director_id_director_id FOREIGN KEY (director_id) REFERENCES director(id);
ALTER TABLE movie_rating ADD CONSTRAINT movie_rating_movie_id_movie_id FOREIGN KEY (movie_id) REFERENCES movie(id) ON DELETE CASCADE;
