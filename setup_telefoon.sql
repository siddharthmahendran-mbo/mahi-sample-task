CREATE DATABASE mahi_family_db;
USE mahi_family_db;

CREATE TABLE birthdays (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    birthdate DATE,
    address VARCHAR(255),
    telefoon VARCHAR(20)
);

INSERT INTO birthdays (name, birthdate, address, telefoon) VALUES
('Ramya', '1982-03-26', 'Prinsengracht 432', '06-12345678'),
('Mahi', '1983-05-29', 'Stationsplein 15', '06-87654321'),
('Sid', '2009-07-30', 'Lijnbaan 77-A', '06-11223344'),
('Samar', '2015-08-10', 'Domplein 9', '06-55667788');

-- This adds the column just like the 'mobilenumber' example in image_660e5c.png
ALTER TABLE birthdays
MODIFY COLUMN telefoon VARCHAR(20);
