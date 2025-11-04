<?php
// views/partials/sidebar.php
$usuario = $_SESSION['user']['nombre'] ?? 'Usuario';
?>

<div class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-gray-200 flex flex-col shadow-lg">
    <!-- Encabezado -->
    <div class="p-5 border-b border-gray-700">
        <h2 class="text-2xl font-bold text-white">Sistema Ventas</h2>
        <p class="text-sm text-gray-400 mt-1">Bienvenido, <?= htmlspecialchars($usuario) ?></p>
    </div>

    <!-- Navegación -->
    <nav class="flex-1 p-4 space-y-2">
        <a href="index.php?controller=Dashboard&action=index"
            class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7v8h10v-8z" />
            </svg>
            <span>Dashboard</span>
        </a>

        <a href="index.php?controller=Producto&action=index"
            class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M4 17h16M4 21h16" />
            </svg>
            <span>Productos</span>
        </a>

        <a href="index.php?controller=Cliente&action=index"
            class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m4 0a4 4 0 10-8 0m8 0a4 4 0 108 0z" />
            </svg>
            <span>Clientes</span>
        </a>

        <a href="index.php?controller=Venta&action=index"
            class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 14l2-2m0 0l2-2m-2 2v6m-2-6h4m5-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Ventas</span>
        </a>

        <a href="index.php?controller=Venta&action=reporte"
            class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 17v-2m4 2v-4m4 4v-6m4 6a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Reporte de Ventas</span>
        </a>
    </nav>

    <!-- Cerrar sesión -->
    <div class="p-4 border-t border-gray-700">
        <a href="index.php?controller=Auth&action=logout"
            class="flex items-center justify-center space-x-2 bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
            </svg>
            <span>Cerrar sesión</span>
        </a>
    </div>
</div>