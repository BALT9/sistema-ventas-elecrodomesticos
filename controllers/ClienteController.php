<?php
require_once './models/Cliente.php';

class ClienteController
{
    private $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
    }

    public function index()
    {
        $clientes = $this->clienteModel->getAll();
        require 'views/clientes/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->clienteModel->create(
                $_POST['nombre'],
                $_POST['telefono'],
                $_POST['email'],
                $_POST['direccion']
            );
            header('Location: index.php?controller=Cliente&action=index');
            exit;
        }
        require 'views/clientes/create.php';
    }

    public function edit($id)
    {
        $cliente = $this->clienteModel->getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->clienteModel->update(
                $id,
                $_POST['nombre'],
                $_POST['telefono'],
                $_POST['email'],
                $_POST['direccion']
            );
            header('Location: index.php?controller=Cliente&action=index');
            exit;
        }
        require 'views/clientes/edit.php';
    }

    public function delete($id)
    {
        $this->clienteModel->delete($id);
        header('Location: index.php?controller=Cliente&action=index');
        exit;
    }
}
