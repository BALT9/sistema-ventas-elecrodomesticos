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
        <form method="POST" id="formCliente" class="bg-white p-6 rounded shadow max-w-lg">
            <div class="mb-4">
                <label class="block font-bold mb-1">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-1">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar</button>
        </form>
    </div>

    <script>
        // Función para guardar datos en localStorage
        function guardarDatos() {
            const cliente = {
                nombre: document.getElementById('nombre').value,
                telefono: document.getElementById('telefono').value,
                email: document.getElementById('email').value,
                direccion: document.getElementById('direccion').value
            };
            localStorage.setItem('formCliente', JSON.stringify(cliente));
        }

        // Escuchar cambios en los campos
        document.querySelectorAll('#formCliente input').forEach(campo => {
            campo.addEventListener('input', guardarDatos);
        });

        // Recuperar datos al cargar la página
        window.addEventListener('load', () => {
            const guardado = localStorage.getItem('formCliente');
            if (guardado) {
                const datos = JSON.parse(guardado);
                document.getElementById('nombre').value = datos.nombre || '';
                document.getElementById('telefono').value = datos.telefono || '';
                document.getElementById('email').value = datos.email || '';
                document.getElementById('direccion').value = datos.direccion || '';
            }
        });

        // Limpiar localStorage al enviar el formulario
        document.getElementById('formCliente').addEventListener('submit', () => {
            localStorage.removeItem('formCliente');
        });
    </script>
</body>

</html>