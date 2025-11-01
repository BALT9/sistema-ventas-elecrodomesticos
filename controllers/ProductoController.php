<?php
require_once './models/Producto.php';

class ProductoController
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new Producto();
    }

    public function index()
    {
        $productos = $this->productoModel->getAll();
        require 'views/productos/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $imagen = $_POST['imagen'] ?? null;

            $this->productoModel->create($nombre, $descripcion, $categoria, $precio, $stock, $imagen);

            header('Location: index.php?controller=Producto&action=index');
            exit;
        }

        require 'views/productos/create.php';
    }

    public function edit($id)
    {
        $producto = $this->productoModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $imagen = $_POST['imagen'] ?? null;

            $this->productoModel->update($id, $nombre, $descripcion, $categoria, $precio, $stock, $imagen);

            header('Location: index.php?controller=Producto&action=index');
            exit;
        }

        require 'views/productos/edit.php';
    }

    public function delete($id)
    {
        $this->productoModel->delete($id);
        header('Location: index.php?controller=Producto&action=index');
        exit;
    }
}
