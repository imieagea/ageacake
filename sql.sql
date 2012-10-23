DROP TABLE users;
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    role VARCHAR(20) NOT NULL
);

CREATE TABLE contenus (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	titre VARCHAR(255) NOT NULL,
	slug VARCHAR(255) NOT NULL UNIQUE,
	contenu TEXT NOT NULL
);

CREATE TABLE posts (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	titre VARCHAR(255) NOT NULL,
	corps TEXT NOT NULL,
	slug VARCHAR(255) NOT NULL UNIQUE,
	category_id INT(11) NOT NULL
);

CREATE TABLE categories (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nom VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE fiches (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nom VARCHAR(255) NOT NULL,
	prenom VARCHAR(255) NOT NULL,
	adresse VARCHAR(255) NOT NULL,
	code_postal VARCHAR(255) NOT NULL,
	ville VARCHAR(255) NOT NULL,
	portable VARCHAR(20) NOT NULL,
	fixe VARCHAR(20),
	email VARCHAR(255) NOT NULL,
	date_naissance DATE,
	message TINYTEXT,
	pdf VARCHAR(255),
	exp INT(1)
);

CREATE TABLE avis_fiches (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	texte TEXT NOT NULL,
	fiche_id INT(11) NOT NULL
);


CREATE TABLE criteres (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nom VARCHAR(255) NOT NULL,
	critere_category_id INT(11) NOT NULL
);


CREATE TABLE critere_categories (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nom VARCHAR(255) NOT NULL
);

CREATE TABLE critere_value (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	critere_id INT(11) NOT NULL,
	fiche_id INT(11) NOT NULL ,
	value VARCHAR(255) NOT NULL
);

ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);


ALTER TABLE `avis_fiches`
  ADD CONSTRAINT `fiches_ibfk_1` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`);

ALTER TABLE `criteres`
  ADD CONSTRAINT `criteres_ibfk_1` FOREIGN KEY (`critere_category_id`) REFERENCES `critere_categories` (`id`);


ALTER TABLE `critere_value`
  ADD CONSTRAINT `fiches_ibfk_2` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`),
  ADD CONSTRAINT `criteres_ibfk_2` FOREIGN KEY (`critere_id`) REFERENCES `criteres` (`id`);

