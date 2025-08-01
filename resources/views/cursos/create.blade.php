@extends('layouts.admin')

@section('title', 'Novo Curso')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cursos.index') }}">Cursos</a></li>
            <li class="breadcrumb-item active">Novo Curso</li>
        </ol>
    </nav>

    <!-- Cabeçalho da página -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3">
                <i class="fas fa-plus-circle me-3 text-primary"></i>Criar Novo Curso
            </h1>
            <p class="text-muted">Preencha os dados para criar um novo curso no sistema</p>
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
                    <form action="{{ route('cursos.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="nome" class="form-label">Nome do Curso <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('nome') is-invalid @enderror" 
                                       id="nome" 
                                       name="nome" 
                                       value="{{ old('nome') }}" 
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
                                    <option value="presencial" {{ old('modalidade') == 'presencial' ? 'selected' : '' }}>Presencial</option>
                                    <option value="online" {{ old('modalidade') == 'online' ? 'selected' : '' }}>Online</option>
                                    <option value="hibrido" {{ old('modalidade') == 'hibrido' ? 'selected' : '' }}>Híbrido</option>
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
                                      placeholder="Descrição detalhada do curso">{{ old('descricao') }}</textarea>
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
                                       value="{{ old('duracao_horas') }}" 
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
                                       value="{{ old('preco') }}" 
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
                                       {{ old('ativo', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="ativo">
                                    Curso ativo (disponível para inscrições)
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Voltar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Criar Curso
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Informações Adicionais -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-light-custom">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>Informações
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-primary">Modalidades Disponíveis:</h6>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-users me-2 text-success"></i><strong>Presencial:</strong> Aulas no centro de formação</li>
                            <li><i class="fas fa-laptop me-2 text-info"></i><strong>Online:</strong> Aulas virtuais via plataforma</li>
                            <li><i class="fas fa-sync me-2 text-warning"></i><strong>Híbrido:</strong> Combinação de presencial e online</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-primary">Campos Obrigatórios:</h6>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-asterisk me-2 text-danger"></i>Nome do curso</li>
                            <li><i class="fas fa-asterisk me-2 text-danger"></i>Modalidade</li>
                        </ul>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Dica:</strong> Preencha todos os campos para melhor gestão e apresentação do curso aos interessados.
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
});

function carregarCentros() {
    $.get('{{ route("api.centros.index") }}')
        .done(function(data) {
            const select = $('#centro_id');
            select.html('<option value="">Selecione um centro</option>');
            
            data.forEach(function(centro) {
                const selected = {{ old('centro_id') }} == centro.id ? 'selected' : '';
                select.append(`<option value="${centro.id}" ${selected}>${centro.nome} - ${centro.localizacao}</option>`);
            });
        })
        .fail(function() {
            console.error('Erro ao carregar centros');
        });
}
</script>
@endpush
