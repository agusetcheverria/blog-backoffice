<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post</title>
</head>
<body>
    <h1>Editar Post</h1>
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}" required>
        <br>
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" required>{{ $post->content }}</textarea>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
