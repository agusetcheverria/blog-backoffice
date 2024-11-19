<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Post</title>
</head>
<body>
    <h1>Crear Nuevo Post</h1>
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" required></textarea>
        <br>
        <label for="author_id">ID del Autor:</label>
        <input type="number" name="author_id" id="author_id" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
