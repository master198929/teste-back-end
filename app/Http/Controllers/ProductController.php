<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Certifique-se de importar o Log

class ProductController extends Controller
{
    // Exibe a lista de produtos
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    // Exibe o formulário para criar um novo produto
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Armazena o produto no banco de dados
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image_url'] = $imagePath;
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    // Edita o produto
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Atualiza o produto no banco de dados
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image_url'] = $imagePath;
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Deleta o produto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto deletado com sucesso!');
    }

    public function search(Request $request)
{
    // Obtém o termo de busca da requisição
    $searchTerm = $request->input('search');
    
    // Verifica se o termo de busca não está vazio
    if (!empty($searchTerm)) {
        // Cria uma consulta para buscar produtos pelo nome ou pela categoria
        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhereHas('category', function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            })
            ->get();
        
        // Retorna a view 'products.index' com os produtos encontrados
        return view('products.index', compact('products', 'searchTerm'));
    } else {
        // Se não houver termo de busca, retorna todos os produtos ou uma mensagem
        $products = Product::all();
        
        // Retorna a view com todos os produtos (ou você pode redirecionar ou mostrar uma mensagem)
        return view('products.index', compact('products'))->with('error', 'Nenhum termo de busca fornecido.');
    }
}
}
