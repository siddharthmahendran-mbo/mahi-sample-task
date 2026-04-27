CREATE DATABASE mahi_family_db;
USE mahi_family_db;


CREATE TABLE birthdays (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    birthdate DATE
);

INSERT INTO birthdays (name, birthdate, address) VALUES 
('Ramya', '1982-03-26', '123 Maple St, New York'),
('Mahi', '1983-05-29', '456 Oak Ave, London'),
('Sid', '2009-07-30', '789 Pine Rd, Sydney'),
('Samar', '2015-08-10', '321 Elm Blvd, Tokyo');



ALTER TABLE birthdays 
ADD COLUMN mobilenumber INT;

