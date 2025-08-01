<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['centros', 'formadores', 'horarios', 'preInscricoes'])->get();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:cursos,nome',
            'modalidade' => 'required|string',
        ]);
        $curso = Curso::create($validated);
        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    public function show($id)
    {
        $curso = Curso::with(['centros', 'formadores', 'horarios', 'preInscricoes'])->findOrFail($id);
        return view('cursos.show', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:cursos,nome,' . $curso->id,
            'modalidade' => 'required|string',
        ]);
        $curso->update($validated);
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso deletado com sucesso!');
    }

    public function toggleStatus($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->ativo = !$curso->ativo;
        $curso->save();
        return redirect()->route('cursos.index')->with('success', 'Status do curso alterado!');
    }
}
