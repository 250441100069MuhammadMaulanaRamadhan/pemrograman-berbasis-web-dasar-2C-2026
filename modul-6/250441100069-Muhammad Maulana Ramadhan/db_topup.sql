CREATE DATABASE db_topup;
USE db_topup;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin','user') DEFAULT 'user'
);

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    kategori VARCHAR(50),
    harga INT,
    stok INT,
    deskripsi TEXT
);


INSERT INTO produk (nama_produk, kategori, harga, stok, deskripsi) VALUES
('Pulsa XL 5.000', 'Pulsa', 7000, 100, 'Pulsa XL nominal 5 ribu'),
('Pulsa XL 10.000', 'Pulsa', 12000, 100, 'Pulsa XL nominal 10 ribu'),
('Pulsa XL 25.000', 'Pulsa', 27000, 100, 'Pulsa XL nominal 25 ribu'),
('Pulsa XL 50.000', 'Pulsa', 52000, 100, 'Pulsa XL nominal 50 ribu'),
('Pulsa XL 100.000', 'Pulsa', 102000, 100, 'Pulsa XL nominal 100 ribu'),

('Pulsa Indosat 5.000', 'Pulsa', 7000, 100, 'Pulsa Indosat nominal 5 ribu'),
('Pulsa Indosat 10.000', 'Pulsa', 12000, 100, 'Pulsa Indosat nominal 10 ribu'),
('Pulsa Indosat 25.000', 'Pulsa', 27000, 100, 'Pulsa Indosat nominal 25 ribu'),
('Pulsa Indosat 50.000', 'Pulsa', 52000, 100, 'Pulsa Indosat nominal 50 ribu'),
('Pulsa Indosat 100.000', 'Pulsa', 102000, 100, 'Pulsa Indosat nominal 100 ribu'),

('Pulsa Telkomsel 5.000', 'Pulsa', 7000, 100, 'Pulsa Telkomsel nominal 5 ribu'),
('Pulsa Telkomsel 10.000', 'Pulsa', 12000, 100, 'Pulsa Telkomsel nominal 10 ribu'),
('Pulsa Telkomsel 25.000', 'Pulsa', 27000, 100, 'Pulsa Telkomsel nominal 25 ribu'),
('Pulsa Telkomsel 50.000', 'Pulsa', 52000, 100, 'Pulsa Telkomsel nominal 50 ribu'),
('Pulsa Telkomsel 100.000', 'Pulsa', 102000, 100, 'Pulsa Telkomsel nominal 100 ribu'),

('Pulsa Tri 5.000', 'Pulsa', 7000, 100, 'Pulsa Tri nominal 5 ribu'),
('Pulsa Tri 10.000', 'Pulsa', 12000, 100, 'Pulsa Tri nominal 10 ribu'),
('Pulsa Tri 25.000', 'Pulsa', 27000, 100, 'Pulsa Tri nominal 25 ribu'),
('Pulsa Tri 50.000', 'Pulsa', 52000, 100, 'Pulsa Tri nominal 50 ribu'),
('Pulsa Tri 100.000', 'Pulsa', 102000, 100, 'Pulsa Tri nominal 100 ribu'),

('Pulsa Axis 5.000', 'Pulsa', 7000, 100, 'Pulsa Axis nominal 5 ribu'),
('Pulsa Axis 10.000', 'Pulsa', 12000, 100, 'Pulsa Axis nominal 10 ribu'),
('Pulsa Axis 25.000', 'Pulsa', 27000, 100, 'Pulsa Axis nominal 25 ribu'),
('Pulsa Axis 50.000', 'Pulsa', 52000, 100, 'Pulsa Axis nominal 50 ribu'),
('Pulsa Axis 100.000', 'Pulsa', 102000, 100, 'Pulsa Axis nominal 100 ribu'),

('28 Diamond Mobile Legend', 'Games', 10000, 100, '28(25+3) Diamond Mobile Legend'),
('100 Diamond Mobile Legend', 'Games', 27000, 100, '100(91+9) Diamond Mobile Legend'),
('240 Diamond Mobile Legend', 'Games', 62000, 100, '240(217+23) Diamond Mobile Legend'),
('344 Diamond Mobile Legend', 'Games', 90000, 100, '344(312+32) Diamond Mobile Legend'),
('514 Diamond Mobile Legend', 'Games', 133000, 100, '514(468+46) Diamond Mobile Legend'),

('70 Diamond Free Fire', 'Games', 10000, 100, '70 Diamond Free Fire'),
('100 Diamond Free Fire', 'Games', 15000, 100, '100 Diamond Free Fire'),
('140 Diamond Free Fire', 'Games', 20000, 100, '140 Diamond Free Fire'),
('355 Diamond Free Fire', 'Games', 45000, 100, '355 Diamond Free Fire'),
('720 Diamond Free Fire', 'Games', 93000, 100, '720 Diamond Free Fire'),

('25 UC PUBG Mobile', 'Games', 17000, 100, '25 UC PUBG Mobile'),
('100 UC PUBG Mobile', 'Games', 32000, 100, '100 UC PUBG Mobile'),
('300 UC PUBG Mobile', 'Games', 79000, 100, '300 UC PUBG Mobile'),
('500 UC PUBG Mobile', 'Games', 127000, 100, '500 UC PUBG Mobile'),
('1000 UC PUBG Mobile', 'Games', 250000, 100, '1000 UC PUBG Mobile');


ALTER TABLE users ADD saldo INT DEFAULT 0;


CREATE TABLE topup_request (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    jumlah INT,
    status ENUM('pending','approved') DEFAULT 'pending'
);