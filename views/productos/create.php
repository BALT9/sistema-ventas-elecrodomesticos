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
    <title>Agregar Producto</title>
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
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Agregar Producto</h1>

        <form method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg">
            <div class="mb-4">
                <label class="block font-bold mb-1 text-gray-700">Nombre</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1 text-gray-700">Descripción</label>
                <textarea name="descripcion" class="w-full border p-2 rounded focus:ring focus:ring-blue-200"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1 text-gray-700">Categoría</label>
                <input type="text" name="categoria" class="w-full border p-2 rounded focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1 text-gray-700">Precio</label>
                <input type="number" name="precio" step="0.01"
                    class="w-full border p-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1 text-gray-700">Stock</label>
                <input type="number" name="stock" class="w-full border p-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <!-- Nuevo campo: URL de Imagen -->
            <div class="mb-6">
                <label class="block font-bold mb-1 text-gray-700">URL de Imagen</label>
                <input type="url" name="imagen" placeholder="https://ejemplo.com/imagen.jpg"
                    class="w-full border p-2 rounded focus:ring focus:ring-blue-200">
                <p class="text-sm text-gray-500 mt-1">Pega aquí la URL de la imagen del producto.</p>
            </div>

            <button type="submit"
                class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Guardar Producto
            </button>
        </form>
    </div>
</body>

</html>