<?php
class Database
{
    public static function conectar()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "ventas_electrodomesticos";

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_errno) {
            die("Error de conexión: " . $conn->connect_error);
        }

        return $conn;
    }
}
