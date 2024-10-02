<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15', // Validação opcional para telefone
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email', 'phone'));

        return redirect()->route('profile.edit')->with('success', 'Dados atualizados com sucesso!');
    }
}
