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
    <?php include 'views/partials/sidebar.php'; ?>


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