CREATE DATABASE vjezba;
USE vjezba;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    korisnicko_ime VARCHAR(100) UNIQUE NOT NULL,
    lozinka VARCHAR(255) NOT NULL,
    razina_dozvole INT DEFAULT 1
);
