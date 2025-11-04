<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroHogar - Tu tienda de electrodomésticos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Imagen de fondo del hero */
        #hero {
            background-image: url('https://apalliser.com/wp-content/uploads/2021/03/electrodomesticos-apalliser-bra.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
            color: white;
        }

        /* Superposición oscura */
        #hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(2px);
            z-index: 0;
        }

        #hero>div {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-blue-700 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center p-6">
            <h1 class="text-3xl font-extrabold tracking-wide">ElectroHogar</h1>
            <nav class="space-x-6 text-lg">
                <a href="#productos" class="hover:text-blue-200 transition">Productos</a>
                <a href="#beneficios" class="hover:text-blue-200 transition">Beneficios</a>
                <a href="#contacto" class="hover:text-blue-200 transition">Contacto</a>
                <a href="index.php?controller=Auth&action=login"
                    class="bg-white text-blue-700 px-4 py-2 rounded font-semibold hover:bg-blue-100 transition">
                    Ingresar
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section id="hero" class="relative flex flex-col items-center justify-center text-center py-32 px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-5xl sm:text-6xl font-extrabold mb-6 leading-tight">
                Electrodomésticos de calidad para tu hogar
            </h2>
            <p class="text-lg sm:text-xl text-gray-200 mb-8">
                Descubre la mejor tecnología para tu cocina y lavandería, con diseños modernos y eficientes.
            </p>
            <a href="#productos"
                class="inline-block px-10 py-4 bg-blue-600 text-white font-semibold rounded-lg shadow-xl transform transition hover:-translate-y-1 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Ver productos
            </a>
        </div>
    </section>

    <!-- Productos -->
    <section id="productos" class="container mx-auto p-10">
        <h2 class="text-3xl font-bold mb-10 text-center text-blue-700">Nuestros Productos</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php foreach ($productos as $p): ?>
                <div
                    class="bg-white p-6 rounded-xl shadow hover:shadow-2xl transition transform hover:-translate-y-1 flex flex-col">
                    <?php if (!empty($p['imagen'])): ?>
                        <img src="<?= htmlspecialchars($p['imagen']) ?>" alt="<?= htmlspecialchars($p['nombre']) ?>"
                            class="mb-4 w-full h-52 object-cover rounded-lg">
                    <?php else: ?>
                        <div
                            class="mb-4 w-full h-52 bg-gray-200 flex items-center justify-center text-gray-500 rounded-lg text-sm">
                            Sin Imagen
                        </div>
                    <?php endif; ?>

                    <h3 class="font-bold text-xl mb-2 text-gray-800"><?= htmlspecialchars($p['nombre']) ?></h3>
                    <p class="text-gray-700 mb-1">Precio: $<?= number_format($p['precio'], 2) ?></p>
                    <p class="text-gray-500 mb-4">Stock: <?= $p['stock'] ?></p>
                    <button
                        class="mt-auto w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Comprar
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Beneficios -->
    <section id="beneficios" class="bg-blue-50 py-16 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-700 mb-8">¿Por qué elegirnos?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-bold text-xl mb-2 text-blue-600">Calidad garantizada</h3>
                    <p>Trabajamos con las mejores marcas y ofrecemos garantía en todos nuestros productos.</p>
                </div>
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-bold text-xl mb-2 text-blue-600">Atención personalizada</h3>
                    <p>Te asesoramos para encontrar el electrodoméstico ideal para tus necesidades.</p>
                </div>
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-bold text-xl mb-2 text-blue-600">Envíos rápidos</h3>
                    <p>Recibe tus productos en tiempo récord, directamente en la puerta de tu casa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contacto" class="bg-gray-900 text-white p-12 mt-12">
        <div class="container mx-auto text-center space-y-4">
            <h3 class="text-xl font-bold">Contáctanos</h3>
            <p>Email: <a href="mailto:contacto@electrohogar.com" class="underline">contacto@electrohogar.com</a> |
                Tel: +52 123 456 7890</p>
            <p>&copy; <?= date('Y') ?> <span class="font-semibold">ElectroHogar</span>. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>