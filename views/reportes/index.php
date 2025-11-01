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
    <title>Reporte de Ventas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <?php include 'views/partials/sidebar.php'; ?>

    <div class="flex-1 p-8 overflow-auto">
        <h1 class="text-3xl font-bold mb-4">Reporte de Ventas</h1>
        <a href="index.php?controller=Reporte&action=exportCSV" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 mb-4 inline-block">Exportar CSV</a>

        <?php if (!empty($ventas)): ?>
            <?php foreach ($ventas as $v): ?>
                <div class="bg-white rounded shadow p-4 mb-4">
                    <h2 class="font-bold text-xl mb-2">Venta #<?= $v['id'] ?> - Cliente: <?= htmlspecialchars($v['cliente']) ?></h2>
                    <p class="text-gray-600 mb-2">Fecha: <?= $v['fecha'] ?></p>

                    <table class="min-w-full bg-gray-50 rounded shadow border border-gray-300 border-collapse">
                        <thead class="bg-gray-200 border-b border-gray-300">
                            <tr>
                                <th class="p-2 border border-gray-300">Producto</th>
                                <th class="p-2 border border-gray-300">Cantidad</th>
                                <th class="p-2 border border-gray-300">Precio Unitario</th>
                                <th class="p-2 border border-gray-300">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($v['productos'] as $p): ?>
                                <tr class="border-b border-gray-300">
                                    <td class="p-2 border border-gray-300"><?= htmlspecialchars($p['nombre']) ?></td>
                                    <td class="p-2 border border-gray-300"><?= $p['cantidad'] ?></td>
                                    <td class="p-2 border border-gray-300">$<?= number_format($p['precio_unitario'], 2) ?></td>
                                    <td class="p-2 border border-gray-300">$<?= number_format($p['subtotal'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="bg-gray-100 font-bold border-t border-gray-300">
                                <td colspan="3" class="p-2 text-right border border-gray-300">Total:</td>
                                <td class="p-2 border border-gray-300">$<?= number_format($v['total'], 2) ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-gray-700">No hay ventas registradas.</p>
        <?php endif; ?>
    </div>
</body>

</html>