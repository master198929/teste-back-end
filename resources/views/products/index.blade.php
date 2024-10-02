<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulário de busca -->
<form action="{{ route('products.search') }}" method="GET">
    <input type="text" name="search" value="{{ isset($searchTerm) ? $searchTerm : '' }}" placeholder="Buscar produto">
    <button type="submit">Buscar</button>
</form>

<!-- Exibe uma mensagem de erro, se houver -->
@if (session('error'))
    <p>{{ session('error') }}</p>
@endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        @if($product->image_url)
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="Imagem do Produto" style="width: 100px; height: auto;">
                        @else
                            Sem imagem
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('products.create') }}">Criar Novo Produto</a>
</body>
</html>

