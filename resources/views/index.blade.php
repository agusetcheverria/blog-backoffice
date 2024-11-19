<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Backoffice</h1>
    </header>
    <nav>
        <ul>
            <li><a href="{{ route('posts.index') }}">Gestión de Posts</a></li>
            <li><a href="{{ route('users.index') }}">Gestión de Usuarios</a></li>
        </ul>
    </nav>
</body>
</html>
