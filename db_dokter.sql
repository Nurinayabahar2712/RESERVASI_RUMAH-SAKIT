CREATE TABLE db_dokter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    alamat TEXT NOT NULL,
    telepon VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    dbrs_id INT NOT NULL,
    poli_id INT NOT NULL,
    hari_pelayanan VARCHAR(255) NOT NULL,
    jam_pelayanan VARCHAR(255) NOT NULL,
    FOREIGN KEY (dbrs_id) REFERENCES dbrs(id),
    FOREIGN KEY (poli_id) REFERENCES poli(id)
);
