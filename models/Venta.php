<?php
require_once './config/database.php';

class Venta
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conectar();
    }

    // Obtener todas las ventas con cliente y usuario
    public function getAllWithProductos()
    {
        $sql = "SELECT v.id, v.id_cliente, c.nombre AS cliente, v.fecha, 
                   SUM(d.subtotal) AS total,
                   GROUP_CONCAT(p.nombre SEPARATOR ', ') AS productos
            FROM ventas v
            JOIN clientes c ON v.id_cliente = c.id
            JOIN detalle_ventas d ON v.id = d.id_venta
            JOIN productos p ON d.id_producto = p.id
            GROUP BY v.id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    // Crear nueva venta
    public function create($id_usuario, $id_cliente, $productos)
    {
        if (!is_array($productos) || empty($productos)) {
            throw new Exception("Debe seleccionar al menos un producto.");
        }

        // Insertar en tabla ventas
        $stmt = $this->conn->prepare("INSERT INTO ventas (id_usuario, id_cliente) VALUES (?, ?)");
        $stmt->bind_param("ii", $id_usuario, $id_cliente);
        $stmt->execute();
        $id_venta = $this->conn->insert_id;

        // Inserta cada producto en detalle_ventas y actualizar stock
        foreach ($productos as $id_producto => $cantidad) {
            $cantidad = (int)$cantidad;
            if ($cantidad <= 0) continue;

            // Obtener precio y stock actual
            $stmt2 = $this->conn->prepare("SELECT precio, stock FROM productos WHERE id=?");
            $stmt2->bind_param("i", $id_producto);
            $stmt2->execute();
            $res = $stmt2->get_result()->fetch_assoc();

            if (!$res) continue;

            $precio = $res['precio'];
            $stock_actual = $res['stock'];
            if ($cantidad > $stock_actual) {
                throw new Exception("No hay suficiente stock para el producto ID $id_producto");
            }

            $subtotal = $cantidad * $precio;

            // Insertar detalle
            $stmt3 = $this->conn->prepare("INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, precio_unitario, subtotal) VALUES (?, ?, ?, ?, ?)");
            $stmt3->bind_param("iiidd", $id_venta, $id_producto, $cantidad, $precio, $subtotal);
            $stmt3->execute();

            // Actualizar stock
            $nuevo_stock = $stock_actual - $cantidad;
            $stmt4 = $this->conn->prepare("UPDATE productos SET stock=? WHERE id=?");
            $stmt4->bind_param("ii", $nuevo_stock, $id_producto);
            $stmt4->execute();
        }

        return $id_venta;
    }

    public function getAllWithDetalle()
    {
        $sql = "SELECT v.id, c.nombre as cliente, v.fecha
            FROM ventas v
            INNER JOIN clientes c ON v.id_cliente = c.id
            ORDER BY v.id DESC";

        $result = $this->conn->query($sql);
        $ventas = [];

        while ($row = $result->fetch_assoc()) {
            $venta_id = $row['id'];

            $sqlProductos = "SELECT p.nombre, dv.cantidad, dv.precio_unitario, dv.subtotal
                         FROM detalle_ventas dv
                         INNER JOIN productos p ON dv.id_producto = p.id
                         WHERE dv.id_venta = $venta_id";
            $productosResult = $this->conn->query($sqlProductos);

            $productos = [];
            while ($prod = $productosResult->fetch_assoc()) {
                $productos[] = $prod;
            }

            $row['productos'] = $productos;
            $row['total'] = array_sum(array_column($productos, 'subtotal'));

            $ventas[] = $row;
        }

        return $ventas;
    }

    public function delete($id)
    {
        // Primero eliminamos los detalles
        $stmt = $this->conn->prepare("DELETE FROM detalle_ventas WHERE id_venta=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Luego eliminamos la venta
        $stmt2 = $this->conn->prepare("DELETE FROM ventas WHERE id=?");
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
    }
}
