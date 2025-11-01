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
    <title>Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <?php include 'views/partials/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 p-8 overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Productos</h1>
            <a href="index.php?controller=Producto&action=create"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                + Agregar Producto
            </a>
        </div>

        <?php if (empty($productos)): ?>
            <p class="text-gray-600 text-center mt-10">No hay productos registrados aún.</p>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($productos as $p): ?>
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden flex flex-col">
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

                        <!-- Detalles del producto -->
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h2 class="font-bold text-lg mb-2 text-gray-800">
                                    <?= htmlspecialchars($p['nombre']) ?>
                                </h2>
                                <p class="text-gray-600 mb-2 text-sm">
                                    <?= htmlspecialchars($p['descripcion']) ?>
                                </p>
                                <p class="text-gray-500 text-s
                                m">Categoría: <?= htmlspecialchars($p['categoria']) ?></p>
                                <p class="text-gray-700 font-semibold mt-1">$<?= number_format($p['precio'], 2) ?></p>
                                <p class="text-gray-600">Stock: <?= (int)$p['stock'] ?></p>
                            </div>

                            <!-- Acciones -->
                            <div class="mt-4 flex justify-between items-center border-t pt-2">
                                <a href="index.php?controller=Producto&action=edit&id=<?= $p['id'] ?>"
                                    class="text-blue-600 hover:underline">Editar</a>
                                <a href="index.php?controller=Producto&action=delete&id=<?= $p['id'] ?>"
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('¿Eliminar producto?')">Borrar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>