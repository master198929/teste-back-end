k<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto: {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Adiciona o método PUT para atualização -->

        <label for="name">Nome:</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required>

        <label for="price">Preço:</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" required>

        <label for="description">Descrição:</label>
        <textarea name="description" required>{{ old('description', $product->description) }}</textarea>

        <label for="category_id">Categoria:</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label for="image">Imagem:</label>
        <input type="file" name="image">

        <button type="submit">Atualizar Produto</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar</a>
</body>
</html>

