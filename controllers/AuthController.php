<?php
require_once './models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario']; // CAMBIO: antes $email
            $clave = $_POST['clave'];     // CAMBIO: antes $password

            $user = $this->userModel->login($usuario, $clave); // El modelo ya hace MD5
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=Dashboard&action=index');
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos";
                require 'views/auth/login.php';
            }
        } else {
            require 'views/auth/login.php';
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
