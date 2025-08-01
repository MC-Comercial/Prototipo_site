@extends('layouts.admin')

@section('title', 'Formadores')

@section('content')
<div class="container">
    <h1>Formadores</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('formadores.create') }}" class="btn btn-primary mb-3">Novo Formador</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formadores as $formador)
                <tr>
                    <td>{{ $formador->id }}</td>
                    <td>{{ $formador->nome }}</td>
                    <td>{{ $formador->email }}</td>
                    <td>
                        <a href="{{ route('formadores.show', $formador->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('formadores.edit', $formador->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('formadores.destroy', $formador->id) }}" method="POST" style="display:inline-block">
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
