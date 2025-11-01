<?php
$usuario = $_SESSION['user']['nombre'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex flex-col">
        <h2 class="text-2xl font-bold p-4 border-b border-gray-700">Sistema Ventas</h2>
        <nav class="flex-1 p-4 space-y-2">
            <a href="index.php?controller=Dashboard&action=index" class="block p-2 rounded hover:bg-gray-700">Dashboard</a>
            <a href="index.php?controller=Producto&action=index" class="block p-2 rounded hover:bg-gray-700">Productos</a>
            <a href="index.php?controller=Cliente&action=index" class="block p-2 rounded hover:bg-gray-700">Clientes</a>
            <a href="index.php?controller=Venta&action=index" class="block p-2 rounded hover:bg-gray-700">Ventas</a>
            <a href="index.php?controller=Auth&action=logout" class="block p-2 mt-4 bg-red-600 rounded hover:bg-red-700 text-center">Cerrar sesión</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold mb-4">Bienvenido, <?= htmlspecialchars($usuario) ?> 👋</h1>
        <p class="text-gray-600">Aquí puedes gestionar productos, clientes y ventas.</p>
    </div>
</body>

</html>