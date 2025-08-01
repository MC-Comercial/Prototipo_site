@extends('layouts.admin')

@section('title', 'Detalhes da Pré-Inscrição')

@section('content')
<div class="container">
    <h1>Detalhes da Pré-Inscrição</h1>
    <a href="{{ route('pre-inscricoes.index') }}" class="btn btn-secondary mb-3">Voltar</a>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $preInscricao->id }}</p>
            <p><strong>Nome Completo:</strong> {{ $preInscricao->nome_completo }}</p>
            <p><strong>Email:</strong> {{ $preInscricao->email }}</p>
        </div>
    </div>
</div>
@endsection
