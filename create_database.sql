-- Membuat database
CREATE DATABASE IF NOT EXISTS portfolio_contact;

-- Menggunakan database
USE portfolio_contact;

-- Membuat tabel contacts
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    submit_date DATETIME NOT NULL
);
