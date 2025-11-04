<?php
$usuario = $_SESSION['user']['nombre'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Control | ElectroHogar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-card {
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
        }

        .content {
            background-image: url('https://images.unsplash.com/photo-1581579186987-481fe4f9d2f9?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
        }

        .content::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<body class="flex h-screen bg-gray-100 overflow-hidden">

    <!-- Sidebar -->
    <?php include 'views/partials/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col relative content p-8 overflow-y-auto">
        <div class="relative z-10">
            <!-- Top Bar -->
            <header class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-extrabold text-blue-700">Panel de Control</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-semibold">👤 <?= htmlspecialchars($usuario) ?></span>
                    <a href="index.php?controller=Auth&action=logout"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                        Cerrar sesión
                    </a>
                </div>
            </header>

            <!-- Welcome Card -->
            <div
                class="gradient-card text-white rounded-2xl shadow-lg p-8 flex items-center justify-between mb-10 transform transition hover:scale-[1.01]">
                <div>
                    <h2 class="text-2xl font-bold mb-2">¡Bienvenido de nuevo, <?= htmlspecialchars($usuario) ?>! 👋</h2>
                    <p class="text-white/90">Gestiona fácilmente tus productos, clientes y ventas desde un solo lugar.</p>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                    alt="Usuario" class="w-24 h-24 opacity-90 hidden sm:block">
            </div>
        </div>
    </div>
</body>

</html>