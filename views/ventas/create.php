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
    <title>Nueva Venta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex flex-col p-4">
        <h2 class="text-2xl font-bold mb-4">Sistema Ventas</h2>
        <a href="index.php?controller=Venta&action=index" class="block p-2 rounded hover:bg-gray-700 mb-2">Volver a Ventas</a>
        <a href="index.php?controller=Auth&action=logout" class="block p-2 mt-4 bg-red-600 rounded hover:bg-red-700 text-center">Cerrar sesión</a>
    </div>

    <!-- Main -->
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold mb-6">Nueva Venta</h1>

        <?php if (isset($error)): ?>
            <div class="mb-4 p-2 bg-red-200 text-red-800 rounded"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" class="bg-white p-6 rounded shadow max-w-2xl">
            <div class="mb-4">
                <label class="block font-bold mb-1">Cliente</label>
                <select name="cliente_id" class="w-full border p-2 rounded" required>
                    <option value="">Seleccione un cliente</option>
                    <?php foreach ($clientes as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <h2 class="text-xl font-bold mb-2">Productos</h2>
            <?php foreach ($productos as $p): ?>
                <div class="mb-2 flex items-center justify-between">
                    <span><?= htmlspecialchars($p['nombre']) ?> ($<?= $p['precio'] ?>) - Stock: <?= $p['stock'] ?></span>
                    <input type="number" name="productos[<?= $p['id'] ?>]" min="0" max="<?= $p['stock'] ?>" value="0" class="border p-1 w-20 text-center">
                </div>
            <?php endforeach; ?>

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Registrar Venta</button>
        </form>
    </div>
</body>

</html>