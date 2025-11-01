<?php
function cargarControlador($controlador)
{
    $nombreControlador = ucwords($controlador) . "Controller";
    $archivoControlador = 'controllers/' . $nombreControlador . '.php';

    if (!is_file($archivoControlador)) {
        $controlador = CONTROLADOR_PRINCIPAL;
        $nombreControlador = ucwords($controlador) . "Controller";
        $archivoControlador = 'controllers/' . $nombreControlador . '.php';
    }

    require_once $archivoControlador;
    return new $nombreControlador();
}

function cargarAccion($controller, $accion, $id = null)
{
    if (isset($accion) && method_exists($controller, $accion)) {
        if ($id === null) {
            $controller->$accion();
        } else {
            $controller->$accion($id);
        }
    } else {
        die("La acción '$accion' no existe en el controlador " . get_class($controller));
        // o alternativamente: $controller->index();
    }
}
