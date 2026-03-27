CREATE DATABASE portfolio_adella;
USE portfolio_adella;

CREATE TABLE skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    level INT
);

CREATE TABLE experiences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    subtitle VARCHAR(255),
    description TEXT
);

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT
);

CREATE TABLE certificates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    image VARCHAR(255)
);