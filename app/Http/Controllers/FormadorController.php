<?php

namespace App\Http\Controllers;

use App\Models\Formador;
use Illuminate\Http\Request;

class FormadorController extends Controller
{
    public function index()
    {
        $formadores = Formador::with(['cursos', 'centros'])->get();
        return view('formadores.index', compact('formadores'));
    }

    public function create()
    {
        return view('formadores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
        ]);
        $formador = Formador::create($validated);
        return redirect()->route('formadores.index')->with('success', 'Formador criado com sucesso!');
    }

    public function show($id)
    {
        $formador = Formador::with(['cursos', 'centros'])->findOrFail($id);
        return view('formadores.show', compact('formador'));
    }

    public function edit($id)
    {
        $formador = Formador::findOrFail($id);
        return view('formadores.edit', compact('formador'));
    }

    public function update(Request $request, $id)
    {
        $formador = Formador::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
        ]);
        $formador->update($validated);
        return redirect()->route('formadores.index')->with('success', 'Formador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $formador = Formador::findOrFail($id);
        $formador->delete();
        return redirect()->route('formadores.index')->with('success', 'Formador deletado com sucesso!');
    }
}
