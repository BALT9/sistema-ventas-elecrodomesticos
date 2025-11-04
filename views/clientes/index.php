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
    <title>Clientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <?php include 'views/partials/sidebar.php'; ?>

    <!-- Contenido principal -->
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Clientes</h1>

        <!-- Botón agregar -->
        <a href="index.php?controller=Cliente&action=create"
            class="inline-block px-5 py-2 mb-6 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition-colors">
            Agregar Cliente
        </a>

        <!-- Tabla -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full border-collapse">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 border-b">
                    <tr>
                        <th class="p-3 text-left text-sm font-semibold text-gray-700 uppercase">ID</th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-700 uppercase">Nombre</th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-700 uppercase">Email</th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-700 uppercase">Teléfono</th>
                        <th class="p-3 text-center text-sm font-semibold text-gray-700 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($clientes as $c): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-gray-700"><?= $c['id'] ?></td>
                            <td class="p-3 text-gray-700"><?= htmlspecialchars($c['nombre']) ?></td>
                            <td class="p-3 text-gray-700"><?= htmlspecialchars($c['email']) ?></td>
                            <td class="p-3 text-gray-700"><?= htmlspecialchars($c['telefono']) ?></td>
                            <td class="p-3 text-center space-x-3">
                                <a href="index.php?controller=Cliente&action=edit&id=<?= $c['id'] ?>"
                                    class="text-blue-600 font-medium hover:underline">Editar</a>
                                <a href="index.php?controller=Cliente&action=delete&id=<?= $c['id'] ?>"
                                    class="text-red-600 font-medium hover:underline"
                                    onclick="return confirm('¿Eliminar cliente?')">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>