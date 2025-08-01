<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        return view('horarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
        ]);
        $horario = Horario::create($validated);
        return redirect()->route('horarios.index')->with('success', 'Horário criado com sucesso!');
    }

    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return view('horarios.show', compact('horario'));
    }

    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        return view('horarios.edit', compact('horario'));
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
        ]);
        $horario->update($validated);
        return redirect()->route('horarios.index')->with('success', 'Horário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horário deletado com sucesso!');
    }
}
