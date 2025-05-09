
USE dmelanybeauty;

CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    servicio VARCHAR(50) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_contacto DATETIME NOT NULL
);