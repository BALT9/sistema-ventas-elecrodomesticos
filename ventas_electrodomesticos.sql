-- Crear base de datos
CREATE DATABASE IF NOT EXISTS ventas_electrodomesticos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Usar la base de datos
USE ventas_electrodomesticos;

-- Tabla de clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    email VARCHAR(100),
    direccion VARCHAR(255),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    categoria VARCHAR(100),
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    imagen VARCHAR(255),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de usuarios (para login)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL, -- Guardada en MD5 según tu código
    nombre_completo VARCHAR(100),
    rol ENUM('admin', 'empleado') DEFAULT 'empleado'
);

-- Tabla de ventas
CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_cliente INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id) ON DELETE CASCADE
);

-- Tabla de detalle de ventas
CREATE TABLE detalle_ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_venta INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_venta) REFERENCES ventas(id) ON DELETE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES productos(id) ON DELETE CASCADE
);

-- Índices opcionales para mejorar el rendimiento
CREATE INDEX idx_cliente ON ventas(id_cliente);
CREATE INDEX idx_producto ON detalle_ventas(id_producto);

-- Usuario de ejemplo
INSERT INTO usuarios (usuario, clave, nombre_completo, rol)
VALUES ('admin', MD5('admin123'), 'Administrador General', 'admin');

-- Cliente de ejemplo
INSERT INTO clientes (nombre, telefono, email, direccion)
VALUES ('Juan Pérez', '123456789', 'juan@example.com', 'Av. Siempre Viva 123');

-- Producto de ejemplo
INSERT INTO productos (nombre, descripcion, categoria, precio, stock)
VALUES ('Televisor LG 42"', 'Televisor LED Full HD', 'Televisores', 350.00, 10);
