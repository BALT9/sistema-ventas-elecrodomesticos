<?php
require_once './config/database.php';

class Cliente
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conectar();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM clientes";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nombre, $telefono, $email, $direccion)
    {
        $stmt = $this->conn->prepare("INSERT INTO clientes (nombre, telefono, email, direccion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $telefono, $email, $direccion);
        $stmt->execute();
    }

    public function update($id, $nombre, $telefono, $email, $direccion)
    {
        $stmt = $this->conn->prepare("UPDATE clientes SET nombre=?, telefono=?, email=?, direccion=? WHERE id=?");
        $stmt->bind_param("ssssi", $nombre, $telefono, $email, $direccion, $id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM clientes WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
