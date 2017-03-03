/* Import this script into phpMyAdmin to setup everything. */
/* The end-user should not need this. */

/* Be careful, this destroys all manually inserted data. */
DROP TABLE IF EXISTS account;
DROP TABLE IF EXISTS link;
DROP TABLE IF EXISTS genre;
DROP TABLE IF EXISTS movie;

/* Accounts */

CREATE TABLE account (
    id integer NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    PRIMARY KEY (id )
);

INSERT INTO account (id, username, password)
VALUES (1, "master", "password");

/* Movies */

CREATE TABLE movie (
    id integer NOT NULL AUTO_INCREMENT,
    name VARCHAR(70) NOT NULL,
    year integer NOT NULL,
    trailer VARCHAR(200),
    addedBy VARCHAR(70) NOT NULL,
    PRIMARY KEY (id )
);

/* Genres */

CREATE TABLE genre (
    id integer NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    PRIMARY KEY (id )
);

INSERT INTO genre (name) VALUES ("Action");
INSERT INTO genre (name) VALUES ("Adventure");
INSERT INTO genre (name) VALUES ("Biography");
INSERT INTO genre (name) VALUES ("Comedy");
INSERT INTO genre (name) VALUES ("Crime");
INSERT INTO genre (name) VALUES ("Documentary");
INSERT INTO genre (name) VALUES ("Drama");
INSERT INTO genre (name) VALUES ("Family");
INSERT INTO genre (name) VALUES ("Fantasy");
INSERT INTO genre (name) VALUES ("History");
INSERT INTO genre (name) VALUES ("Horror");
INSERT INTO genre (name) VALUES ("Mystery");
INSERT INTO genre (name) VALUES ("Romance");
INSERT INTO genre (name) VALUES ("Sci-Fi");
INSERT INTO genre (name) VALUES ("Thriller");
INSERT INTO genre (name) VALUES ("War");
INSERT INTO genre (name) VALUES ("Western");

/* Links between Movies and Genres */

CREATE TABLE link (
    id integer NOT NULL AUTO_INCREMENT,
    mid integer NOT NULL,
    gid integer NOT NULL,
    PRIMARY KEY (id )/*,
    FOREIGN KEY (mid) REFERENCES movie(id),
    FOREIGN KEY (gid) REFERENCES genre(id)
    */
    /* Foreign keys are not mandatory, but help protecting from data loss. */
    /* To use foreign key references, delete DROP TABLE commands in the beginning. */
);

/* Default movies */

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("Inception", 2010, "YoHD9XEInc0", "Default");
INSERT INTO link (mid, gid) VALUES (1, 1);
INSERT INTO link (mid, gid) VALUES (1, 2);
INSERT INTO link (mid, gid) VALUES (1, 14);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("Star Wars VII: The Force Awakens", 2015, "sGbxmsDFVnE", "Default");
INSERT INTO link (mid, gid) VALUES (2, 1);
INSERT INTO link (mid, gid) VALUES (2, 2);
INSERT INTO link (mid, gid) VALUES (2, 9);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("The Matrix", 1999, "vKQi3bBA1y8", "Default");
INSERT INTO link (mid, gid) VALUES (3, 1);
INSERT INTO link (mid, gid) VALUES (3, 14);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("The Lord of the Rings: The Fellowship of the Ring", 2001, "V75dMMIW2B4", "Default");
INSERT INTO link (mid, gid) VALUES (4, 2);
INSERT INTO link (mid, gid) VALUES (4, 7);
INSERT INTO link (mid, gid) VALUES (4, 9);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("Forrest Gump", 1994, "bLvqoHBptjg", "Default");
INSERT INTO link (mid, gid) VALUES (5, 4);
INSERT INTO link (mid, gid) VALUES (5, 7);
INSERT INTO link (mid, gid) VALUES (5, 13);

INSERT INTO movie (name, year, trailer, addedBy)
VALUES ("The Shawshank Redemption", 1994, "NmzuHjWmXOc", "Default");
INSERT INTO link (mid, gid) VALUES (6, 5);
INSERT INTO link (mid, gid) VALUES (6, 7);
