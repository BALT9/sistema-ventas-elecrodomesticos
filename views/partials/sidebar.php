<?php
// views/partials/sidebar.php
$usuario = $_SESSION['user']['nombre'];
?>
<div class="w-64 bg-gray-800 text-white flex flex-col">
    <h2 class="text-2xl font-bold p-4 border-b border-gray-700">Sistema Ventas</h2>
    <nav class="flex-1 p-4 space-y-2">
        <a href="index.php?controller=Dashboard&action=index" class="block p-2 rounded hover:bg-gray-700">Dashboard</a>
        <a href="index.php?controller=Producto&action=index" class="block p-2 rounded hover:bg-gray-700">Productos</a>
        <a href="index.php?controller=Cliente&action=index" class="block p-2 rounded hover:bg-gray-700">Clientes</a>
        <a href="index.php?controller=Venta&action=index" class="block p-2 rounded hover:bg-gray-700">Ventas</a>
        <a href="index.php?controller=Venta&action=reporte" class="block p-2 rounded hover:bg-gray-700">Reporte de Ventas</a>
        <a href="index.php?controller=Auth&action=logout" class="block p-2 mt-4 bg-red-600 rounded hover:bg-red-700 text-center">Cerrar sesión</a>
    </nav>
</div>
