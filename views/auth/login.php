<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Ventas</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-sm">
        <h2 class="text-2xl font-bold text-center mb-6">Iniciar Sesión</h2>

        <form method="POST" action="index.php?controller=Auth&action=login" class="space-y-4">
            <div>
                <label for="usuario" class="block text-gray-700 font-medium mb-1">Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label for="clave" class="block text-gray-700 font-medium mb-1">Contraseña</label>
                <input type="password" name="clave" id="clave" placeholder="Ingrese su contraseña"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">Ingresar</button>
        </form>

        <?php if (isset($error)) : ?>
            <p class="text-red-500 text-center mt-4"><?= $error ?></p>
        <?php endif; ?>
    </div>

</body>

</html>