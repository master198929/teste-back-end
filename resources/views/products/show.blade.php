<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Produto</title>
</head>
<body>
    <h1>Detalhes do Produto</h1>

    <p><strong>Nome:</strong> {{ $product->name }}</p>
    <p><strong>Preço:</strong> R$ {{ $product->price }}</p>
    <p><strong>Categoria:</strong> {{ $product->category->name ?? 'Sem categoria' }}</p>
    <p><strong>Descrição:</strong> {{ $product->description }}</p>

    <!-- Exibe a imagem do produto se houver -->
     @if($product->image_url)
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="Imagem do Produto" style="width: 100px; height: aut>
                        @else
                            Sem imagem
                        @endif

    <a href="{{ url('products') }}">Voltar</a>
</body>
</html>
