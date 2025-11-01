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
    <title>Ventas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <?php include 'views/partials/sidebar.php'; ?>


    <!-- Main Content -->
    <div class="flex-1 p-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold">Ventas</h1>
            <a href="index.php?controller=Venta&action=create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Nueva Venta</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php foreach ($ventas as $v): ?>
                <div class="bg-white rounded shadow p-4 flex flex-col justify-between">
                    <div>
                        <h2 class="font-bold text-xl mb-2">Venta #<?= $v['id'] ?></h2>
                        <p class="text-gray-600">Cliente: <?= htmlspecialchars($v['cliente']) ?></p>
                        <p class="text-gray-600">Fecha: <?= $v['fecha'] ?? '' ?></p>
                        <p class="text-gray-600 font-bold">Total: $<?= $v['total'] ?></p>
                        <p class="text-gray-600">Productos: <?= htmlspecialchars($v['productos']) ?></p>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <a href="index.php?controller=Venta&action=delete&id=<?= $v['id'] ?>" class="text-red-600" onclick="return confirm('¿Eliminar venta?')">Borrar</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>