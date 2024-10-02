@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
    <p>Use os links abaixo para navegar:</p>
    
    <div class="mt-4">
        <h4>Links Rápidos:</h4>
        <ul>
            <li><a href="{{ route('profile.edit') }}">Editar Perfil</a></li>
            <li><a href="{{ route('categories.index') }}">Categorias</a></li>
            <li><a href="{{ route('products.index') }}">Produtos</a></li>
        </ul>
    </div>
</div>
@endsection
