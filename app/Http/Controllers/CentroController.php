<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    public function index()
    {
        $centros = Centro::all();
        return view('centros.index', compact('centros'));
    }

    public function create()
    {
        return view('centros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:centros,nome',
            'localizacao' => 'required|string|max:150',
            'email' => 'nullable|email|max:100',
        ]);
        $centro = Centro::create($validated);
        return redirect()->route('centros.index')->with('success', 'Centro criado com sucesso!');
    }

    public function show($id)
    {
        $centro = Centro::findOrFail($id);
        return view('centros.show', compact('centro'));
    }

    public function edit($id)
    {
        $centro = Centro::findOrFail($id);
        return view('centros.edit', compact('centro'));
    }

    public function update(Request $request, $id)
    {
        $centro = Centro::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:centros,nome,' . $centro->id,
            'localizacao' => 'required|string|max:150',
            'email' => 'nullable|email|max:100',
        ]);
        $centro->update($validated);
        return redirect()->route('centros.index')->with('success', 'Centro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $centro = Centro::findOrFail($id);
        $centro->delete();
        return redirect()->route('centros.index')->with('success', 'Centro deletado com sucesso!');
    }
}
