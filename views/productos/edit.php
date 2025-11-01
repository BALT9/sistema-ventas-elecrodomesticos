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
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex flex-col p-4">
        <h2 class="text-2xl font-bold mb-4">Sistema Ventas</h2>
        <a href="index.php?controller=Producto&action=index"
           class="block p-2 rounded hover:bg-gray-700 mb-2">← Volver a Productos</a>
        <a href="index.php?controller=Auth&action=logout"
           class="block p-2 mt-4 bg-red-600 rounded hover:bg-red-700 text-center">Cerrar sesión</a>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8 overflow-y-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Editar Producto</h1>

        <form method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nombre -->
                <div>
                    <label class="block font-bold mb-1 text-gray-700">Nombre</label>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200" required>
                </div>

                <!-- Categoría -->
                <div>
                    <label class="block font-bold mb-1 text-gray-700">Categoría</label>
                    <input type="text" name="categoria" value="<?= htmlspecialchars($producto['categoria']) ?>"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200">
                </div>
            </div>

            <!-- Descripción -->
            <div class="mt-4">
                <label class="block font-bold mb-1 text-gray-700">Descripción</label>
                <textarea name="descripcion" class="w-full border p-2 rounded focus:ring focus:ring-blue-200"
                          rows="3"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <!-- Precio -->
                <div>
                    <label class="block font-bold mb-1 text-gray-700">Precio</label>
                    <input type="number" name="precio" value="<?= $producto['precio'] ?>" step="0.01"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200" required>
                </div>

                <!-- Stock -->
                <div>
                    <label class="block font-bold mb-1 text-gray-700">Stock</label>
                    <input type="number" name="stock" value="<?= $producto['stock'] ?>"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200" required>
                </div>

                <!-- Imagen -->
                <div>
                    <label class="block font-bold mb-1 text-gray-700">URL de Imagen</label>
                    <input type="url" name="imagen" id="imagen"
                           value="<?= htmlspecialchars($producto['imagen']) ?>"
                           placeholder="https://ejemplo.com/imagen.jpg"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200">
                </div>
            </div>

            <!-- Vista previa -->
            <div class="mt-6">
                <p class="font-bold text-gray-700 mb-2">Vista previa:</p>
                <img id="preview"
                     src="<?= htmlspecialchars($producto['imagen'] ?? 'https://via.placeholder.com/200?text=Sin+Imagen') ?>"
                     alt="Vista previa de la imagen"
                     class="rounded border w-48 h-48 object-cover shadow">
            </div>

            <button type="submit"
                    class="mt-6 w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Guardar Cambios
            </button>
        </form>
    </div>

    <script>
        // Vista previa dinámica
        const imagenInput = document.getElementById('imagen');
        const preview = document.getElementById('preview');

        imagenInput.addEventListener('input', () => {
            const url = imagenInput.value.trim();
            preview.src = url || 'https://via.placeholder.com/200?text=Sin+Imagen';
        });
    </script>
</body>
</html>
