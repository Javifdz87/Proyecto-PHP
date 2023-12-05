CREATE TABLE tareas (
    id INT PRIMARY KEY,
    NIF VARCHAR(9),
    Nombre VARCHAR(250),
    Apellidos VARCHAR(250),
    Telefono VARCHAR(9),
    Descripcion TEXT,
    email VARCHAR(250),
    Poblacion VARCHAR(250),
    cod_Postal VARCHAR(6),
    Provincia VARCHAR(250),
    Estado VARCHAR(20),
    Creacion_tarea DATE,
    Operario VARCHAR(250),
    fecha_realizacion DATE,
    Anotaciones_posteriores TEXT
);

CREATE TABLE Usuario (
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    rol BOOLEAN
);


INSERT INTO Usuario VALUES (1,'admin@gmail.com', 'admin', 'admin', 1);
INSERT INTO Usuario VALUES (0,'juan@gmail.com', 'Juan de Dios', 'juan', 0);



SELECT id, NIF, Nombre, Apellidos, Descripcion, email, Estado, Creacion_tarea, Operario, fecha_realizacion 
FROM tareas


INSERT INTO tareas VALUES (
    1,
    '123456789',
    'Juan',
    'Perez',
    '123456789',
    'Descripción de la tarea 1',
    'juan@email.com',
    'Ciudad',
    '12345',
    'Provincia 1',
    'Pendiente',
    '2023-01-01',
    'Operario 1',
    '2023-01-05',
    'Anotaciones adicionales para la tarea 1'
);