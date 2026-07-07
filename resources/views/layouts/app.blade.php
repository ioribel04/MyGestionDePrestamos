<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Gestión de Préstamos</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand" href="/dashboard">

            💰 My Gestión de Préstamos

        </a>

        <div class="navbar-nav">

            <a class="nav-link" href="/dashboard">Dashboard</a>

            <a class="nav-link" href="/clientes">Clientes</a>

            <a class="nav-link" href="#">Préstamos</a>

            <a class="nav-link" href="#">Pagos</a>

            <a class="nav-link" href="#">Reportes</a>

        </div>

    </div>

</nav>

<div class="container mt-4">

    @yield('contenido')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>