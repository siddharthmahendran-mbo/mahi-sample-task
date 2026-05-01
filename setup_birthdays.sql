CREATE DATABASE mahi_family_db;
USE mahi_family_db;

CREATE TABLE birthdays (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    birthdate DATE,
    address VARCHAR(255),
    telefoon VARCHAR(20),
    emailadress VARCHAR(255)
);

INSERT INTO birthdays (name, birthdate, address, telefoon, emailadress) VALUES
('Ramya', '1982-03-26', 'Prinsengracht 432', '06-12345678', 'ramya@example.com'),
('Mahi', '1983-05-29', 'Stationsplein 15', '06-87654321', 'mahi@example.com'),
('Sid', '2009-07-30', 'Lijnbaan 77-A', '06-11223344', 'sid@example.com'),
('Samar', '2015-08-10', 'Domplein 9', '06-55667788', 'samar@example.com');

ALTER TABLE birthdays 
MODIFY COLUMN telefoon VARCHAR(20),
MODIFY COLUMN emailadress VARCHAR(255);