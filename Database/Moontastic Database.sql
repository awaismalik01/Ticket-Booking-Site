create database moontastic_cinema;
use moontastic_cinema;

create table admin(
    user varchar(255) PRIMARY KEY,
    password varchar(255)
);

CREATE TABLE movie(
    id int AUTO_INCREMENT PRIMARY KEY,
    Name varchar(255) NOT NULL
);

create table customers(
    id int PRIMARY KEY AUTO_INCREMENT,
    Name varchar(255) NOT NULL
);

CREATE TABLE date_time(
    id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    DT datetime NOT NULL
);

CREATE TABLE coming_soon(
    id int PRIMARY KEY AUTO_INCREMENT,
    Movie_id int Not NULL,
    FOREIGN KEY(Movie_id) REFERENCES movie(id)
);

CREATE TABLE screen(
    id int PRIMARY KEY AUTO_INCREMENT,
    DT_id int NOT NULL,
    movie_id int NOT NULL,
    FOREIGN KEY(DT_id) REFERENCES date_time(id),
    FOREIGN KEY(movie_id) REFERENCES movie(id)
);

CREATE TABLE seats(
    id varchar(5) PRIMARY KEY,
    DT_id int NOT NULL,
    screen_id int NOT NULL,
    FOREIGN KEY(DT_id) REFERENCES date_time(id),
    FOREIGN KEY(screen_id) REFERENCES screen(id)
);

CREATE TABLE booking(
    id int PRIMARY KEY AUTO_INCREMENT,
    Book_date datetime NOT NULL,
    DT_id int NOT NULL,
    customer_id int NOT NULL,
    movie_id int NOT NULL,
    screen_id int NOT NULL,
    seat_no varchar(5) NOT NULL,
    FOREIGN KEY(DT_id) REFERENCES date_time(id),
    FOREIGN KEY(movie_id) REFERENCES movie(id),
    FOREIGN KEY(screen_id) REFERENCES screen(id),
    FOREIGN KEY(seat_no) REFERENCES seats(id),
    FOREIGN KEY(customer_id) REFERENCES customers(id)
);

INSERT INTO 'admin' ('user', 'password') VALUES ('admin', 'admin');