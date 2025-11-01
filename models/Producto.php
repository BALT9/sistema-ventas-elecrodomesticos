<?php
require_once './config/database.php';

class Producto
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conectar();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM productos";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nombre, $descripcion, $categoria, $precio, $stock)
    {
        $stmt = $this->conn->prepare("INSERT INTO productos (nombre, descripcion, categoria, precio, stock, creado_en) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssdi", $nombre, $descripcion, $categoria, $precio, $stock);
        $stmt->execute();
    }

    public function update($id, $nombre, $descripcion, $categoria, $precio, $stock)
    {
        $stmt = $this->conn->prepare("UPDATE productos SET nombre=?, descripcion=?, categoria=?, precio=?, stock=? WHERE id=?");
        $stmt->bind_param("sssdii", $nombre, $descripcion, $categoria, $precio, $stock, $id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM productos WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
