@extends('layouts.admin')

@section('title', 'Editar Curso')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cursos.index') }}">Cursos</a></li>
            <li class="breadcrumb-item active">Editar Curso</li>
        </ol>
    </nav>

    <!-- Cabeçalho da página -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3">
                <i class="fas fa-edit me-3 text-primary"></i>Editar Curso
            </h1>
            <p class="text-muted">Atualizar os dados do curso: <strong>{{ $curso->nome }}</strong></p>
        </div>
    </div>

    <!-- Formulário -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-light-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Dados do Curso
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('cursos.update', $curso) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="nome" class="form-label">Nome do Curso <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('nome') is-invalid @enderror" 
                                       id="nome" 
                                       name="nome" 
                                       value="{{ old('nome', $curso->nome) }}" 
                                       required 
                                       placeholder="Digite o nome do curso">
                                @error('nome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="modalidade" class="form-label">Modalidade <span class="text-danger">*</span></label>
                                <select class="form-select @error('modalidade') is-invalid @enderror" 
                                        id="modalidade" 
                                        name="modalidade" 
                                        required>
                                    <option value="">Selecione a modalidade</option>
                                    <option value="presencial" {{ old('modalidade', $curso->modalidade) == 'presencial' ? 'selected' : '' }}>Presencial</option>
                                    <option value="online" {{ old('modalidade', $curso->modalidade) == 'online' ? 'selected' : '' }}>Online</option>
                                    <option value="hibrido" {{ old('modalidade', $curso->modalidade) == 'hibrido' ? 'selected' : '' }}>Híbrido</option>
                                </select>
                                @error('modalidade')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" 
                                      id="descricao" 
                                      name="descricao" 
                                      rows="4" 
                                      placeholder="Descrição detalhada do curso">{{ old('descricao', $curso->descricao) }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="duracao_horas" class="form-label">Duração (horas)</label>
                                <input type="number" 
                                       class="form-control @error('duracao_horas') is-invalid @enderror" 
                                       id="duracao_horas" 
                                       name="duracao_horas" 
                                       value="{{ old('duracao_horas', $curso->duracao_horas) }}" 
                                       min="1" 
                                       placeholder="Ex: 40">
                                @error('duracao_horas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="preco" class="form-label">Preço (AOA)</label>
                                <input type="number" 
                                       class="form-control @error('preco') is-invalid @enderror" 
                                       id="preco" 
                                       name="preco" 
                                       value="{{ old('preco', $curso->preco) }}" 
                                       step="0.01" 
                                       min="0" 
                                       placeholder="Ex: 15000.00">
                                @error('preco')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="centro_id" class="form-label">Centro</label>
                                <select class="form-select @error('centro_id') is-invalid @enderror" 
                                        id="centro_id" 
                                        name="centro_id">
                                    <option value="">Selecione um centro</option>
                                    <!-- Opcões carregadas via AJAX -->
                                </select>
                                @error('centro_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="ativo" 
                                       name="ativo" 
                                       value="1" 
                                       {{ old('ativo', $curso->ativo) ? 'checked' : '' }}>
                                <label class="form-check-label" for="ativo">
                                    Curso ativo (disponível para inscrições)
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Voltar
                            </a>
                            <div>
                                <a href="{{ route('cursos.show', $curso) }}" class="btn btn-info me-2">
                                    <i class="fas fa-eye me-2"></i>Visualizar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Atualizar Curso
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Informações do Curso -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-light-custom">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>Informações do Curso
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-primary">Status Atual:</h6>
                        <span class="badge {{ $curso->ativo ? 'bg-success' : 'bg-secondary' }} fs-6">
                            {{ $curso->ativo ? 'Ativo' : 'Inativo' }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-primary">Criado em:</h6>
                        <p class="text-muted mb-0">{{ $curso->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-primary">Última atualização:</h6>
                        <p class="text-muted mb-0">{{ $curso->updated_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Atenção:</strong> Alterações no curso podem afetar pré-inscrições existentes.
                    </div>
                </div>
            </div>

            <!-- Estatísticas -->
            <div class="card mt-3">
                <div class="card-header bg-light-custom">
                    <h6 class="mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Estatísticas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Pré-inscrições:</span>
                        <span class="badge bg-primary" id="total-inscricoes">0</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Pendentes:</span>
                        <span class="badge bg-warning text-dark" id="inscricoes-pendentes">0</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Confirmadas:</span>
                        <span class="badge bg-success" id="inscricoes-confirmadas">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    carregarCentros();
    carregarEstatisticas();
});

function carregarCentros() {
    $.get('{{ route("api.centros.index") }}')
        .done(function(data) {
            const select = $('#centro_id');
            select.html('<option value="">Selecione um centro</option>');
            
            data.forEach(function(centro) {
                const selected = {{ old('centro_id', $curso->centro_id) ?? 'null' }} == centro.id ? 'selected' : '';
                select.append(`<option value="${centro.id}" ${selected}>${centro.nome} - ${centro.localizacao}</option>`);
            });
        })
        .fail(function() {
            console.error('Erro ao carregar centros');
        });
}

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
        });
}
</script>
@endpush
