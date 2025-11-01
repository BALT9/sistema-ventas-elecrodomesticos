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
    <title>Agregar Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">
    <div class="w-64 bg-gray-800 text-white flex flex-col p-4">
        <h2 class="text-2xl font-bold mb-4">Sistema Ventas</h2>
        <a href="index.php?controller=Cliente&action=index" class="block p-2 rounded hover:bg-gray-700 mb-2">Volver a Clientes</a>
        <a href="index.php?controller=Auth&action=logout" class="block p-2 mt-4 bg-red-600 rounded hover:bg-red-700 text-center">Cerrar sesión</a>
    </div>

    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold mb-6">Agregar Cliente</h1>
        <form method="POST" class="bg-white p-6 rounded shadow max-w-lg">
            <div class="mb-4">
                <label class="block font-bold mb-1">Nombre</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Teléfono</label>
                <input type="text" name="telefono" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Dirección</label>
                <input type="text" name="direccion" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar</button>
        </form>
    </div>
</body>

</html>