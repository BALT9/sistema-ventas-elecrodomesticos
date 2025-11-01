<?php
require_once './models/Venta.php';
require_once './models/Cliente.php';
require_once './models/Producto.php';

class VentaController
{
    private $ventaModel;
    private $clienteModel;
    private $productoModel;

    public function __construct()
    {
        $this->ventaModel = new Venta();
        $this->clienteModel = new Cliente();
        $this->productoModel = new Producto();
    }

    public function index()
    {
        $ventas = $this->ventaModel->getAllWithProductos();
        require 'views/ventas/index.php';
    }

    public function create()
    {
        $clientes = $this->clienteModel->getAll();
        $productos = $this->productoModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usuario = $_SESSION['user']['id'];
            $id_cliente = $_POST['cliente_id'];
            $productos_seleccionados = $_POST['productos'] ?? [];
            $productos_seleccionados = array_filter($productos_seleccionados, fn($cantidad) => $cantidad > 0);

            try {
                $this->ventaModel->create($id_usuario, $id_cliente, $productos_seleccionados);
                header('Location: index.php?controller=Venta&action=index');
                exit;
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }

        require 'views/ventas/create.php';
    }

    public function reporte()
    {
        $ventas = $this->ventaModel->getAllWithDetalle();
        require 'views/reportes/index.php';
    }

    public function delete()
    {
        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=Venta&action=index");
            exit;
        }

        $id = (int)$_GET['id'];

        try {
            $this->ventaModel->delete($id);
        } catch (Exception $e) {
            $error = $e->getMessage();
            // Opcional: mostrar error en un view o en el listado
        }

        header("Location: index.php?controller=Venta&action=index");
        exit;
    }
}
