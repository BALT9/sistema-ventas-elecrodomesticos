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
    <title>Productos | ElectroHogar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .main-bg {
            background-image: url('https://images.unsplash.com/photo-1606813902916-f6e8b7b6d2f2?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .main-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(5px);
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
            <!-- Top Bar -->
            <header class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-extrabold text-blue-700">Gestión de Productos</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-semibold hidden sm:block">👤 <?= htmlspecialchars($usuario) ?></span>
                    <a href="index.php?controller=Auth&action=logout"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                        Cerrar sesión
                    </a>
                </div>
            </header>

            <!-- Header section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Productos</h2>
                    <p class="text-gray-600">Administra tus productos fácilmente desde aquí.</p>
                </div>
                <a href="index.php?controller=Producto&action=create"
                    class="mt-4 sm:mt-0 px-5 py-3 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Agregar Producto</span>
                </a>
            </div>

            <!-- Productos -->
            <?php if (empty($productos)): ?>
                <div class="text-center mt-20">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076508.png" alt="Sin productos"
                        class="w-32 h-32 mx-auto opacity-70 mb-6">
                    <p class="text-gray-600 text-lg">No hay productos registrados aún.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <?php foreach ($productos as $p): ?>
                        <div
                            class="bg-white rounded-xl shadow-md hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden flex flex-col border border-gray-100">
                            <!-- Imagen del producto -->
                            <?php if (!empty($p['imagen'])): ?>
                                <img src="<?= htmlspecialchars($p['imagen']) ?>"
                                    alt="<?= htmlspecialchars($p['nombre']) ?>"
                                    class="h-48 w-full object-cover">
                            <?php else: ?>
                                <div class="h-48 w-full bg-gray-200 flex items-center justify-center text-gray-500">
                                    Sin imagen
                                </div>
                            <?php endif; ?>

                            <!-- Detalles -->
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="font-bold text-xl mb-1 text-gray-800"><?= htmlspecialchars($p['nombre']) ?></h3>
                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                        <?= htmlspecialchars($p['descripcion']) ?>
                                    </p>
                                    <p class="text-sm text-gray-500">Categoría:
                                        <span class="font-medium text-gray-700"><?= htmlspecialchars($p['categoria']) ?></span>
                                    </p>
                                    <p class="mt-2 text-lg font-semibold text-blue-700">$<?= number_format($p['precio'], 2) ?></p>
                                    <p class="text-gray-600 text-sm">Stock: <?= (int)$p['stock'] ?></p>
                                </div>

                                <!-- Acciones -->
                                <div class="mt-4 flex justify-between items-center border-t pt-3">
                                    <a href="index.php?controller=Producto&action=edit&id=<?= $p['id'] ?>"
                                        class="text-blue-600 font-semibold hover:text-blue-800 transition flex items-center space-x-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536M4 20h4l10.232-10.232a2.121 2.121 0 000-3l-1.536-1.536a2.121 2.121 0 00-3 0L4 16v4z" />
                                        </svg>
                                        <span>Editar</span>
                                    </a>

                                    <a href="index.php?controller=Producto&action=delete&id=<?= $p['id'] ?>"
                                        class="text-red-600 font-semibold hover:text-red-800 transition flex items-center space-x-1"
                                        onclick="return confirm('¿Eliminar producto?')">
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