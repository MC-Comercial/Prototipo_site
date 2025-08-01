@extends('layouts.admin')

@section('title', 'Editar Pré-Inscrição')

@section('content')
<div class="container">
    <h1>Editar Pré-Inscrição</h1>
    <form action="{{ route('pre-inscricoes.update', $preInscricao->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome_completo" class="form-label">Nome Completo</label>
            <input type="text" name="nome_completo" id="nome_completo" class="form-control" value="{{ old('nome_completo', $preInscricao->nome_completo) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $preInscricao->email) }}">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('pre-inscricoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
