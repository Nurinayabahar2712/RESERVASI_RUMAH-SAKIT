CREATE TABLE poli (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dbrs_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (dbrs_id) REFERENCES dbrs(id)
);
