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

<body class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <?php include 'views/partials/sidebar.php'; ?>


    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold mb-4">Clientes</h1>
        <a href="index.php?controller=Cliente&action=create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Agregar Cliente</a>
        <table class="min-w-full mt-4 bg-white rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Teléfono</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $c): ?>
                    <tr class="border-b">
                        <td class="p-2"><?= $c['id'] ?></td>
                        <td class="p-2"><?= htmlspecialchars($c['nombre']) ?></td>
                        <td class="p-2"><?= htmlspecialchars($c['email']) ?></td>
                        <td class="p-2"><?= htmlspecialchars($c['telefono']) ?></td>
                        <td class="p-2">
                            <a href="index.php?controller=Cliente&action=edit&id=<?= $c['id'] ?>" class="text-blue-600">Editar</a> |
                            <a href="index.php?controller=Cliente&action=delete&id=<?= $c['id'] ?>" class="text-red-600" onclick="return confirm('¿Eliminar cliente?')">Borrar</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>