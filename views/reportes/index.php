<?php
if (!isset($_SESSION['user'])) {
    header("Location: index.php?controller=Auth&action=login");
    exit;
}

$usuario = $_SESSION['user']['nombre'] ?? 'Administrador';
$totalVentas = 0;
$montoTotal = 0;
if (!empty($ventas)) {
    foreach ($ventas as $venta) {
        $totalVentas++;
        $montoTotal += $venta['total'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas | ElectroHogar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .main-bg {
            background-image: url('https://images.unsplash.com/photo-1580910051073-d6c6cb02a93b?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .main-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(4px);
        }

        .main-content {
            position: relative;
            z-index: 10;
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden bg-gray-100">

    <!-- Sidebar -->
    <?php include 'views/partials/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col main-bg p-8 overflow-y-auto">
        <div class="main-content">
            <!-- Header -->
            <header class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-extrabold text-blue-700">Reporte de Ventas</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-semibold hidden sm:block">👤 <?= htmlspecialchars($usuario) ?></span>
                    <a href="index.php?controller=Auth&action=logout"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                        Cerrar sesión
                    </a>
                </div>
            </header>

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">

                <?php if (!empty($ventas)): ?>
                    <div class="mt-6 sm:mt-0 flex space-x-6 bg-white rounded-xl shadow p-4 border border-gray-100">
                        <div>
                            <p class="text-gray-500 text-sm">Total de Ventas</p>
                            <h3 class="text-2xl font-bold text-blue-700"><?= $totalVentas ?></h3>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Monto Total</p>
                            <h3 class="text-2xl font-bold text-green-600">$<?= number_format($montoTotal, 2) ?></h3>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Contenido del Reporte -->
            <?php if (!empty($ventas)): ?>
                <?php foreach ($ventas as $v): ?>
                    <div
                        class="bg-white rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 overflow-hidden mb-8 border border-gray-100">
                        <div class="p-6">
                            <h2 class="font-bold text-xl text-gray-800 mb-2">
                                Venta #<?= $v['id'] ?> - Cliente: <span
                                    class="text-blue-700"><?= htmlspecialchars($v['cliente']) ?></span>
                            </h2>
                            <p class="text-gray-600 mb-4">Fecha: <?= htmlspecialchars($v['fecha']) ?></p>

                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-gray-50 rounded-xl overflow-hidden border border-gray-200">
                                    <thead class="bg-blue-100 text-blue-800 font-semibold text-sm">
                                        <tr>
                                            <th class="p-3 text-left border-b border-gray-200">Producto</th>
                                            <th class="p-3 text-left border-b border-gray-200">Cantidad</th>
                                            <th class="p-3 text-left border-b border-gray-200">Precio Unitario</th>
                                            <th class="p-3 text-left border-b border-gray-200">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700 text-sm">
                                        <?php foreach ($v['productos'] as $p): ?>
                                            <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                                                <td class="p-3"><?= htmlspecialchars($p['nombre']) ?></td>
                                                <td class="p-3"><?= $p['cantidad'] ?></td>
                                                <td class="p-3">$<?= number_format($p['precio_unitario'], 2) ?></td>
                                                <td class="p-3">$<?= number_format($p['subtotal'], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr class="bg-blue-50 font-semibold border-t border-gray-300">
                                            <td colspan="3" class="p-3 text-right text-blue-800">Total:</td>
                                            <td class="p-3 text-blue-800">$<?= number_format($v['total'], 2) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center mt-20">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076508.png" alt="Sin datos"
                        class="w-32 h-32 mx-auto opacity-70 mb-6">
                    <p class="text-gray-600 text-lg">No hay ventas registradas aún.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>