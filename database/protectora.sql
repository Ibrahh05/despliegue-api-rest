
-- 2. Crear tabla con autoincrement y orden especificado
CREATE TABLE pet (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    born DATE,
    category VARCHAR(100),
    chip VARCHAR(100),
    adopt BOOLEAN DEFAULT false
);

-- 3. Insertar datos de mascotas
INSERT INTO pet (name, born, category, chip, adopt) VALUES
('Boby', '2023-03-15', 'Perro', 'CHIP12345', false),
('Miau', '2021-03-20', 'Gato', 'CHIP002', false),
('Yuri', '2020-05-15', 'Perro', 'CHIP001', true),
;

-- 4. Verificar los datos insertados
SELECT * FROM pet;