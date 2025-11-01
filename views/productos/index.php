<?php
if (!isset($_SESSION['user'])) {
    header("Location: index.php?controller=Auth&action=login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex flex-col">
        <h2 class="text-2xl font-bold p-4 border-b border-gray-700">Sistema Ventas</h2>
        <nav class="flex-1 p-4 space-y-2">
            <a href="index.php?controller=Dashboard&action=index" class="block p-2 rounded hover:bg-gray-700">Dashboard</a>
            <a href="index.php?controller=Producto&action=index" class="block p-2 rounded bg-gray-700">Productos</a>
            <a href="index.php?controller=Cliente&action=index" class="block p-2 rounded hover:bg-gray-700">Clientes</a>
            <a href="index.php?controller=Venta&action=index" class="block p-2 rounded hover:bg-gray-700">Ventas</a>
            <a href="index.php?controller=Auth&action=logout" class="block p-2 mt-4 bg-red-600 rounded hover:bg-red-700 text-center">Cerrar sesión</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold">Productos</h1>
            <a href="index.php?controller=Producto&action=create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Agregar Producto</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php foreach ($productos as $p): ?>
                <div class="bg-white rounded shadow p-4 flex flex-col justify-between">
                    <div>
                        <h2 class="font-bold text-xl mb-2"><?= htmlspecialchars($p['nombre']) ?></h2>
                        <p class="text-gray-700 mb-2"><?= htmlspecialchars($p['descripcion']) ?></p>
                        <p class="text-gray-600">Categoría: <?= htmlspecialchars($p['categoria']) ?></p>
                        <p class="text-gray-600">Precio: $<?= $p['precio'] ?></p>
                        <p class="text-gray-600">Stock: <?= $p['stock'] ?></p>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <a href="index.php?controller=Producto&action=edit&id=<?= $p['id'] ?>" class="text-blue-600">Editar</a>
                        <a href="index.php?controller=Producto&action=delete&id=<?= $p['id'] ?>" class="text-red-600" onclick="return confirm('¿Eliminar producto?')">Borrar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>