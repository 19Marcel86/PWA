CREATE DATABASE zadatak3;

USE zadatak3;

CREATE TABLE osobe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(100) NOT NULL,
    prezime VARCHAR(100) NOT NULL,
    grad VARCHAR(100) NOT NULL,
    postanski_broj INT NOT NULL
);