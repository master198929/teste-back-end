<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
</head>
<body>
    <h1>Criar Novo Produto</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="price">Preço:</label>
        <input type="number" name="price" required>

        <label for="description">Descrição:</label>
        <textarea name="description" required></textarea>

        <label for="category_id">Categoria:</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="image">Imagem:</label>
        <input type="file" name="image">

        <button type="submit">Criar Produto</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar</a>
</body>
</html>
