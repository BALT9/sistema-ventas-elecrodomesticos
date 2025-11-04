<?php
if (!isset($_SESSION['user'])) {
    header("Location: index.php?controller=Auth&action=login");
    exit;
}

$usuario = $_SESSION['user']['nombre'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ventas | ElectroHogar</title>
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
                <h1 class="text-3xl font-extrabold text-blue-700">Gestión de Ventas</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-semibold hidden sm:block">👤 <?= htmlspecialchars($usuario) ?></span>
                    <a href="index.php?controller=Auth&action=logout"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                        Cerrar sesión
                    </a>
                </div>
            </header>

            <!-- Encabezado de Ventas -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Ventas</h2>
                    <p class="text-gray-600">Consulta y administra tus ventas realizadas.</p>
                </div>
                <a href="index.php?controller=Venta&action=create"
                    class="mt-4 sm:mt-0 px-5 py-3 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Nueva Venta</span>
                </a>
            </div>

            <!-- Contenido de Ventas -->
            <?php if (empty($ventas)): ?>
                <div class="text-center mt-20">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076508.png" alt="Sin ventas"
                        class="w-32 h-32 mx-auto opacity-70 mb-6">
                    <p class="text-gray-600 text-lg">No hay ventas registradas aún.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <?php foreach ($ventas as $v): ?>
                        <div
                            class="bg-white rounded-xl shadow-md hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden flex flex-col border border-gray-100">
                            <div class="p-6 flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h2 class="font-bold text-xl text-blue-700">Venta #<?= $v['id'] ?></h2>
                                        <span
                                            class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full font-semibold">Completada</span>
                                    </div>
                                    <p class="text-gray-700"><strong>Cliente:</strong> <?= htmlspecialchars($v['cliente']) ?></p>
                                    <p class="text-gray-700"><strong>Fecha:</strong> <?= $v['fecha'] ?? '' ?></p>
                                    <p class="text-gray-800 font-semibold text-lg mt-2">
                                        Total: $<?= number_format($v['total'], 2) ?>
                                    </p>
                                    <p class="text-gray-600 text-sm mt-1">
                                        <strong>Productos:</strong> <?= htmlspecialchars($v['productos']) ?>
                                    </p>
                                </div>

                                <div class="mt-6 flex justify-end border-t pt-3">
                                    <a href="index.php?controller=Venta&action=delete&id=<?= $v['id'] ?>"
                                        class="text-red-600 font-semibold hover:text-red-800 transition flex items-center space-x-1"
                                        onclick="return confirm('¿Eliminar venta?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        <span>Borrar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>