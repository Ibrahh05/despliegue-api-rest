-- init.sql - Versión corregida
CREATE TABLE IF NOT EXISTS coche (
    id SERIAL PRIMARY KEY ,
    nombre VARCHAR(100),
    fecha_fabricacion DATE,
    categoria VARCHAR(100),
    precio float,
    comprado BOOLEAN DEFAULT false
);

INSERT INTO coche (id,nombre, fecha_fabricacion, categoria, precio, comprado) VALUES
(1,'Mazda-RX7', '2023-03-15', 'Deportivo-japonés', 95000, false),
(2,'Ford-Mustang', '2021-03-20', 'Deportivo-americano', 78054, false),
(3,'Nissan-GTR-R35', '2020-05-15', 'Deportivo-japonés', 220000, false),
(4,'Rolls-Royce-Phantom', '2022-07-20', 'Deportivo-inglés', 320000, true),
(5,'Lamborguini-Aventador', '2022-07-20', 'Deportivo-italiano',525000, false)
ON CONFLICT DO NOTHING;