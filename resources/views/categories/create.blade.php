<!DOCTYPE html>
<html>
<head>
    <title>Criar Categoria</title>
</head>
<body>
    <h1>Criar Nova Categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <button type="submit">Criar</button>
    </form>

    <a href="{{ route('categories.index') }}">Voltar</a>
</body>
</html>
