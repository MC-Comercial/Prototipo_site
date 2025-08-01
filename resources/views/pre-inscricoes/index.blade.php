@extends('layouts.admin')

@section('title', 'Pré-Inscrições')

@section('content')
<div class="container">
    <h1>Pré-Inscrições</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('pre-inscricoes.create') }}" class="btn btn-primary mb-3">Nova Pré-Inscrição</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($preInscricoes as $preInscricao)
                <tr>
                    <td>{{ $preInscricao->id }}</td>
                    <td>{{ $preInscricao->nome_completo }}</td>
                    <td>{{ $preInscricao->email }}</td>
                    <td>
                        <a href="{{ route('pre-inscricoes.show', $preInscricao->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pre-inscricoes.edit', $preInscricao->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pre-inscricoes.destroy', $preInscricao->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
