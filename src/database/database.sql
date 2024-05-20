CREATE DATABASE `grancy_hotel`;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    username VARCHAR(100),
    phone_numb INT(12),
    email VARCHAR(255),
    password VARCHAR(255),
    user_type VARCHAR(50) DEFAULT 'user'
);
