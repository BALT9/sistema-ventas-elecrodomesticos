<?php
session_start();

require_once "./config/config.php";
require_once "./core/routes.php";

// Obtener parámetros de URL
$controller = $_GET['controller'] ?? CONTROLADOR_PRINCIPAL;
$accion = $_GET['action'] ?? ACCION_PRINCIPAL;
$id = $_GET['id'] ?? null;

// Cargar controlador y acción
$controllerObj = cargarControlador($controller);
cargarAccion($controllerObj, $accion, $id);
