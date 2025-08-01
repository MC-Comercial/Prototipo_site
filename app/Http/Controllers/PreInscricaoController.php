<?php

namespace App\Http\Controllers;

use App\Models\PreInscricao;
use Illuminate\Http\Request;

class PreInscricaoController extends Controller
{
    public function index()
    {
        $preInscricoes = PreInscricao::all();
        return view('pre-inscricoes.index', compact('preInscricoes'));
    }

    public function create()
    {
        return view('pre-inscricoes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_completo' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
        ]);
        $preInscricao = PreInscricao::create($validated);
        return redirect()->route('pre-inscricoes.index')->with('success', 'Pré-inscrição criada com sucesso!');
    }

    public function show($id)
    {
        $preInscricao = PreInscricao::findOrFail($id);
        return view('pre-inscricoes.show', compact('preInscricao'));
    }

    public function edit($id)
    {
        $preInscricao = PreInscricao::findOrFail($id);
        return view('pre-inscricoes.edit', compact('preInscricao'));
    }

    public function update(Request $request, $id)
    {
        $preInscricao = PreInscricao::findOrFail($id);
        $validated = $request->validate([
            'nome_completo' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
        ]);
        $preInscricao->update($validated);
        return redirect()->route('pre-inscricoes.index')->with('success', 'Pré-inscrição atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $preInscricao = PreInscricao::findOrFail($id);
        $preInscricao->delete();
        return redirect()->route('pre-inscricoes.index')->with('success', 'Pré-inscrição deletada com sucesso!');
    }

    public function updateStatus(Request $request, $id)
    {
        $preInscricao = PreInscricao::findOrFail($id);
        $preInscricao->status = $request->input('status', $preInscricao->status);
        $preInscricao->save();
        return redirect()->route('pre-inscricoes.index')->with('success', 'Status atualizado!');
    }
}
