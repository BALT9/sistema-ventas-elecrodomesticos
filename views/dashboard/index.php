<?php
$usuario = $_SESSION['user']['nombre'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <?php include 'views/partials/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold mb-4">Bienvenido, <?= htmlspecialchars($usuario) ?> 👋</h1>
        <p class="text-gray-600">Aquí puedes gestionar productos, clientes y ventas.</p>
    </div>
</body>

</html>