<?php
require_once './config/database.php';

class Producto
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conectar();
    }

    // Obtener todos los productos
    public function getAll()
    {
        $sql = "SELECT * FROM productos";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Obtener producto por ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Crear nuevo producto con imagen
    public function create($nombre, $descripcion, $categoria, $precio, $stock, $imagen)
    {
        $stmt = $this->conn->prepare("
        INSERT INTO productos (nombre, descripcion, categoria, precio, stock, imagen, creado_en)
        VALUES (?, ?, ?, ?, ?, ?, NOW())
    ");
        $stmt->bind_param("sssdis", $nombre, $descripcion, $categoria, $precio, $stock, $imagen);
        $stmt->execute();
    }


    // Actualizar producto
    public function update($id, $nombre, $descripcion, $categoria, $precio, $stock, $imagen)
    {
        $stmt = $this->conn->prepare("
            UPDATE productos 
            SET nombre=?, descripcion=?, categoria=?, precio=?, stock=?, imagen=? 
            WHERE id=?
        ");
        $stmt->bind_param("sssdiss", $nombre, $descripcion, $categoria, $precio, $stock, $imagen, $id);
        $stmt->execute();
    }

    // Eliminar producto
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM productos WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
