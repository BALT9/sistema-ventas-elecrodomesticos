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
            $this->productoModel->create(
                $_POST['nombre'],
                $_POST['descripcion'],
                $_POST['categoria'],
                $_POST['precio'],
                $_POST['stock']
            );
            header('Location: index.php?controller=Producto&action=index');
            exit;
        }
        require 'views/productos/create.php';
    }

    public function edit($id)
    {
        $producto = $this->productoModel->getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->productoModel->update(
                $id,
                $_POST['nombre'],
                $_POST['descripcion'],
                $_POST['categoria'],
                $_POST['precio'],
                $_POST['stock']
            );
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
