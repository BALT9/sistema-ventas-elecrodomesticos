<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ElectroHogar - Tu tienda de electrodomésticos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <header class="bg-blue-600 text-white shadow">
        <div class="container mx-auto flex justify-between items-center p-6">
            <h1 class="text-3xl font-bold">ElectroHogar</h1>
            <nav class="space-x-4">
                <a href="#productos" class="hover:underline">Productos</a>
                <a href="#beneficios" class="hover:underline">Beneficios</a>
                <a href="#contacto" class="hover:underline">Contacto</a>
                <a href="index.php?controller=Auth&action=login" class="hover:underline">Ingresar</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section
        id="hero"
        class="relative flex flex-col items-center justify-center text-center 
         bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300 
         py-24 px-6">
        <div class="max-w-3xl">
            <h2 class="text-5xl sm:text-6xl font-extrabold text-gray-800 mb-6 leading-tight">
                Electrodomésticos de calidad para tu hogar
            </h2>
            <p class="text-lg sm:text-xl text-gray-700 mb-8">
                Descubre la mejor tecnología para tu cocina y lavandería, con diseños modernos y eficientes.
            </p>
            <a
                href="#productos"
                class="inline-block px-8 py-4 bg-blue-600 text-white font-semibold 
             rounded-lg shadow-lg transform transition 
             hover:-translate-y-1 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Ver productos
            </a>
        </div>
    </section>


    <!-- Productos -->
    <section id="productos" class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Nuestros Productos</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php foreach ($productos as $p): ?>
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="font-bold text-xl mb-2"><?= htmlspecialchars($p['nombre']) ?></h3>
                    <p class="text-gray-700 mb-2">Precio: $<?= number_format($p['precio'], 2) ?></p>
                    <p class="text-gray-500 mb-4">Stock: <?= $p['stock'] ?></p>
                    <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Comprar</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Beneficios -->
    <section id="beneficios" class="bg-gray-100 py-16">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div>
                <h3 class="text-xl font-bold mb-2">Envío rápido</h3>
                <p>Recibe tus productos en la puerta de tu hogar en tiempo récord.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-2">Garantía</h3>
                <p>Todos nuestros electrodomésticos cuentan con garantía oficial del fabricante.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-2">Precios competitivos</h3>
                <p>Ofrecemos los mejores precios del mercado con calidad garantizada.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contacto" class="bg-gray-800 text-white p-12 mt-12">
        <div class="container mx-auto text-center space-y-4">
            <h3 class="text-xl font-bold">Contáctanos</h3>
            <p>Email: contacto@electrohogar.com | Tel: +52 123 456 7890</p>
            <p>&copy; <?= date('Y') ?> ElectroHogar. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>