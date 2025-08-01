@extends('layouts.admin')

@section('title', 'Detalhes do Curso')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cursos.index') }}">Cursos</a></li>
            <li class="breadcrumb-item active">{{ $curso->nome }}</li>
        </ol>
    </nav>

    <!-- Cabeçalho da página -->
    <div class="row mb-4">
        <div class="col-sm-8">
            <h1 class="h3 mb-3">
                <i class="fas fa-book me-3 text-primary"></i>{{ $curso->nome }}
            </h1>
            <p class="text-muted">Informações detalhadas do curso</p>
        </div>
        <div class="col-sm-4 text-end">
            <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Editar
            </a>
            <button onclick="confirmDelete('{{ route('cursos.destroy', $curso) }}')" class="btn btn-danger">
                <i class="fas fa-trash me-2"></i>Eliminar
            </button>
        </div>
    </div>

    <div class="row">
        <!-- Informações Principais -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-light-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>Informações Gerais
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6 class="text-primary">Nome do Curso:</h6>
                            <p class="fs-5 fw-semibold mb-0">{{ $curso->nome }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6 class="text-primary">Modalidade:</h6>
                            <span class="badge {{ $curso->modalidade === 'online' ? 'bg-info' : ($curso->modalidade === 'presencial' ? 'bg-success' : 'bg-warning') }} fs-6">
                                {{ ucfirst($curso->modalidade) }}
                            </span>
                        </div>
                    </div>

                    @if($curso->descricao)
                    <div class="mb-3">
                        <h6 class="text-primary">Descrição:</h6>
                        <p class="text-muted">{{ $curso->descricao }}</p>
                    </div>
                    @endif

                    <div class="row">
                        @if($curso->duracao_horas)
                        <div class="col-md-4 mb-3">
                            <h6 class="text-primary">Duração:</h6>
                            <p class="fw-semibold mb-0">
                                <i class="fas fa-clock text-info me-2"></i>{{ $curso->duracao_horas }} horas
                            </p>
                        </div>
                        @endif

                        @if($curso->preco)
                        <div class="col-md-4 mb-3">
                            <h6 class="text-primary">Preço:</h6>
                            <p class="fw-semibold mb-0 text-success">
                                <i class="fas fa-money-bill text-success me-2"></i>{{ number_format($curso->preco, 2, ',', '.') }} AOA
                            </p>
                        </div>
                        @endif

                        <div class="col-md-4 mb-3">
                            <h6 class="text-primary">Status:</h6>
                            <span class="badge {{ $curso->ativo ? 'bg-success' : 'bg-secondary' }} fs-6">
                                <i class="fas {{ $curso->ativo ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                                {{ $curso->ativo ? 'Ativo' : 'Inativo' }}
                            </span>
                        </div>
                    </div>

                    @if($curso->centro)
                    <div class="mb-3">
                        <h6 class="text-primary">Centro de Formação:</h6>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-building text-primary me-2"></i>
                            <div>
                                <p class="fw-semibold mb-0">{{ $curso->centro->nome }}</p>
                                <small class="text-muted">{{ $curso->centro->localizacao }}</small>
                            </div>
                        </div>
                    </div>
                    @endif

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary">Criado em:</h6>
                            <p class="text-muted mb-0">{{ $curso->created_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-primary">Última atualização:</h6>
                            <p class="text-muted mb-0">{{ $curso->updated_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar com estatísticas e ações -->
        <div class="col-lg-4">
            <!-- Estatísticas -->
            <div class="card mb-3">
                <div class="card-header bg-light-custom">
                    <h6 class="mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Estatísticas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="border-end">
                                <h4 class="text-primary mb-0" id="total-inscricoes">0</h4>
                                <small class="text-muted">Total</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border-end">
                                <h4 class="text-warning mb-0" id="inscricoes-pendentes">0</h4>
                                <small class="text-muted">Pendentes</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <h4 class="text-success mb-0" id="inscricoes-confirmadas">0</h4>
                            <small class="text-muted">Confirmadas</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ações Rápidas -->
            <div class="card mb-3">
                <div class="card-header bg-light-custom">
                    <h6 class="mb-0">
                        <i class="fas fa-bolt me-2"></i>Ações Rápidas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('pre-inscricoes.index') }}?curso={{ $curso->id }}" class="btn btn-outline-primary">
                            <i class="fas fa-users me-2"></i>Ver Pré-inscrições
                        </a>
                        <a href="{{ route('horarios.create') }}?curso={{ $curso->id }}" class="btn btn-outline-success">
                            <i class="fas fa-clock me-2"></i>Criar Horário
                        </a>
                        @if(!$curso->ativo)
                        <form action="{{ route('cursos.toggle-status', $curso) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-outline-warning w-100">
                                <i class="fas fa-toggle-on me-2"></i>Ativar Curso
                            </button>
                        </form>
                        @else
                        <form action="{{ route('cursos.toggle-status', $curso) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-toggle-off me-2"></i>Desativar Curso
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Informações Adicionais -->
            <div class="card">
                <div class="card-header bg-light-custom">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>Informações Adicionais
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-primary">ID do Curso:</h6>
                        <code>#{{ $curso->id }}</code>
                    </div>

                    @if($curso->formadores && $curso->formadores->count() > 0)
                    <div class="mb-3">
                        <h6 class="text-primary">Formadores:</h6>
                        @foreach($curso->formadores as $formador)
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-chalkboard-teacher text-info me-2"></i>
                            <span>{{ $formador->nome }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <div class="alert alert-info">
                        <i class="fas fa-lightbulb me-2"></i>
                        <small>Use as ações rápidas para gerir este curso de forma eficiente.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Voltar -->
    <div class="row mt-4">
        <div class="col-12">
            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Voltar à Lista de Cursos
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    carregarEstatisticas();
});

function carregarEstatisticas() {
    $.get('{{ route("api.pre-inscricoes.index") }}')
        .done(function(data) {
            const cursoId = {{ $curso->id }};
            const inscricoesDoCurso = data.filter(inscricao => inscricao.curso_id == cursoId);
            const pendentes = inscricoesDoCurso.filter(inscricao => inscricao.status === 'pendente').length;
            const confirmadas = inscricoesDoCurso.filter(inscricao => inscricao.status === 'confirmado').length;
            
            $('#total-inscricoes').text(inscricoesDoCurso.length);
            $('#inscricoes-pendentes').text(pendentes);
            $('#inscricoes-confirmadas').text(confirmadas);
        })
        .fail(function() {
            console.error('Erro ao carregar estatísticas');
            $('#total-inscricoes').text('N/A');
            $('#inscricoes-pendentes').text('N/A');
            $('#inscricoes-confirmadas').text('N/A');
        });
}
</script>
@endpush
