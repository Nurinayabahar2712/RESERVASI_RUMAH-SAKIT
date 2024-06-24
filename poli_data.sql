-- Buat database
CREATE DATABASE IF NOT EXISTS reservasi;

-- Gunakan database
USE reservasi;

-- Buat tabel hospital_data
CREATE TABLE IF NOT EXISTS poli_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hospital_name VARCHAR(255) NOT NULL,
    doctor_name VARCHAR(255) NOT NULL,
    schedule VARCHAR(255) NOT NULL
);
