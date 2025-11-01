<?php
class HomeController
{
    public function index()
    {
        // Opcional: cargar productos para mostrar en la landing
        require './models/Producto.php';
        $productoModel = new Producto();
        $productos = $productoModel->getAll();

        require 'views/home/index.php';
    }
}
