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
    <title>Editar Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex flex-col p-4">
        <h2 class="text-2xl font-bold mb-4">Sistema Ventas</h2>
        <a href="index.php?controller=Cliente&action=index" class="block p-2 rounded hover:bg-gray-700 mb-2">Volver a Clientes</a>
        <a href="index.php?controller=Auth&action=logout" class="block p-2 mt-4 bg-red-600 rounded hover:bg-red-700 text-center">Cerrar sesión</a>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold mb-6">Editar Cliente</h1>
        <form method="POST" class="bg-white p-6 rounded shadow max-w-2xl">
            <div class="mb-4">
                <label class="block font-bold mb-1">Nombre</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($cliente['nombre']) ?>" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Teléfono</label>
                <input type="text" name="telefono" value="<?= htmlspecialchars($cliente['telefono']) ?>" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Dirección</label>
                <input type="text" name="direccion" value="<?= htmlspecialchars($cliente['direccion']) ?>" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar Cambios</button>
        </form>
    </div>
</body>

</html>