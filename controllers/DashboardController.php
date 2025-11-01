<?php
class DashboardController
{
    public function index()
    {
        // Proteger la sesión
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=Auth&action=login");
            exit;
        }

        $usuario = $_SESSION['user']['nombre'];
        require 'views/dashboard/index.php';
    }
}
