@extends('layouts.site')

@section('title', $centro->nome)
@section('description', "Centro de formação {$centro->nome} localizado em {$centro->localizacao}")

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('site.centros') }}">Centros</a></li>
                <li class="breadcrumb-item active">{{ $centro->nome }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Page Header -->
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="section-title text-start">{{ $centro->nome }}</h1>
                <p class="section-subtitle text-start">
                    <i class="fas fa-map-marker-alt me-2"></i>{{ $centro->localizacao }}
                </p>
                
                <!-- Informações de Contacto -->
                <div class="row">
                    @if($centro->email)
                    <div class="col-md-6 mb-2">
                        <p class="mb-0">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <a href="mailto:{{ $centro->email }}" class="text-decoration-none">{{ $centro->email }}</a>
                        </p>
                    </div>
                    @endif
                    
                    @if($centro->contactos)
                        @foreach($centro->contactos as $contacto)
                        <div class="col-md-6 mb-2">
                            <p class="mb-0">
                                <i class="fas fa-phone text-primary me-2"></i>
                                {{ $contacto['tipo'] ?? 'Telefone' }}: {{ $contacto['valor'] }}
                            </p>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="feature-icon mx-auto" style="width: 120px; height: 120px; font-size: 3rem;">
                    <i class="fas fa-building"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cursos Disponíveis -->
<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Cursos Disponíveis</h2>
            <p class="section-subtitle">Explore todos os cursos oferecidos neste centro</p>
        </div>
        
        <div class="row" id="cursos-centro">
            <div class="col-12">
                <div class="loading">
                    <div class="spinner"></div>
                    <p>Carregando cursos...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Formulário de Pré-inscrição -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">
                            <i class="fas fa-user-plus me-2"></i>Pré-inscrição
                        </h4>
                        <p class="mb-0 mt-2 opacity-75">Manifeste o seu interesse em participar nos nossos cursos</p>
                    </div>
                    <div class="card-body">
                        <form id="preInscricaoForm" action="{{ route('api.pre-inscricoes.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="centro_id" value="{{ $centro->id }}">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nome_completo" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telefone" class="form-label">Telefone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="telefone" name="telefone" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="curso_id" class="form-label">Curso de Interesse <span class="text-danger">*</span></label>
                                    <select class="form-select" id="curso_id" name="curso_id" required>
                                        <option value="">Selecione um curso</option>
                                        <!-- Opções carregadas via AJAX -->
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="observacoes" class="form-label">Observações</label>
                                <textarea class="form-control" id="observacoes" name="observacoes" rows="3" 
                                         placeholder="Deixe aqui alguma observação ou questão sobre o curso"></textarea>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="termos" required>
                                <label class="form-check-label" for="termos">
                                    Concordo com os <a href="#" data-bs-toggle="modal" data-bs-target="#termosModal">termos e condições</a> <span class="text-danger">*</span>
                                </label>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Submeter Pré-inscrição
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal de Termos e Condições -->
<div class="modal fade" id="termosModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Termos e Condições</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6>1. Aceitação dos Termos</h6>
                <p>Ao submeter uma pré-inscrição, você concorda com estes termos e condições.</p>
                
                <h6>2. Pré-inscrição</h6>
                <p>A pré-inscrição não garante a sua participação no curso. É uma manifestação de interesse que será analisada pela nossa equipa.</p>
                
                <h6>3. Dados Pessoais</h6>
                <p>Os seus dados pessoais serão utilizados exclusivamente para contacto relacionado com a formação e não serão partilhados com terceiros.</p>
                
                <h6>4. Confirmação</h6>
                <p>Entraremos em contacto consigo no prazo de 48 horas para confirmação da disponibilidade e próximos passos.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Sucesso -->
<div class="modal fade" id="sucessoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    <i class="fas fa-check-circle me-2"></i>Pré-inscrição Enviada!
                </h5>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                <h5>Obrigado pelo seu interesse!</h5>
                <p class="text-muted">
                    Recebemos a sua pré-inscrição e entraremos em contacto 
                    consigo no prazo máximo de 48 horas.
                </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    carregarCursos();
    configurarFormulario();
});

function carregarCursos() {
    $.get('{{ route("api.cursos.index") }}')
        .done(function(data) {
            // Filtrar cursos do centro atual e ativos
            const cursosDoCentro = data.filter(curso => 
                curso.centro_id == {{ $centro->id }} && curso.ativo
            );
            
            exibirCursos(cursosDoCentro);
            preencherSelectCursos(cursosDoCentro);
        })
        .fail(function() {
            $('#cursos-centro').html(`
                <div class="col-12 text-center py-5">
                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                    <p class="text-muted">Erro ao carregar cursos.</p>
                </div>
            `);
        });
}

function exibirCursos(cursos) {
    let html = '';
    
    if (cursos.length === 0) {
        html = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-book fa-3x text-muted mb-3"></i>
                <p class="text-muted">Nenhum curso disponível neste centro no momento.</p>
            </div>
        `;
    } else {
        cursos.forEach(function(curso) {
            const modalidadeBadge = curso.modalidade === 'online' ? 'bg-info' : 
                                   curso.modalidade === 'presencial' ? 'bg-success' : 'bg-warning';
            
            html += `
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title">${curso.nome}</h5>
                                <span class="badge ${modalidadeBadge}">${curso.modalidade}</span>
                            </div>
                            ${curso.descricao ? `<p class="text-muted small">${curso.descricao}</p>` : ''}
                            <div class="row text-center mt-3">
                                ${curso.duracao_horas ? `
                                    <div class="col-6">
                                        <i class="fas fa-clock text-info"></i>
                                        <br><small>${curso.duracao_horas}h</small>
                                    </div>
                                ` : ''}
                                ${curso.preco ? `
                                    <div class="col-6">
                                        <i class="fas fa-money-bill text-success"></i>
                                        <br><small>${parseFloat(curso.preco).toLocaleString('pt-AO')} AOA</small>
                                    </div>
                                ` : `
                                    <div class="col-6">
                                        <i class="fas fa-gift text-primary"></i>
                                        <br><small>Gratuito</small>
                                    </div>
                                `}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    }
    
    $('#cursos-centro').html(html);
}

function preencherSelectCursos(cursos) {
    const select = $('#curso_id');
    select.html('<option value="">Selecione um curso</option>');
    
    cursos.forEach(function(curso) {
        select.append(`<option value="${curso.id}">${curso.nome}</option>`);
    });
}

function configurarFormulario() {
    $('#preInscricaoForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = $(this).serialize();
        
        $.post('{{ route("api.pre-inscricoes.store") }}', formData)
            .done(function(response) {
                $('#sucessoModal').modal('show');
                $('#preInscricaoForm')[0].reset();
            })
            .fail(function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Por favor, corrija os seguintes erros:\n';
                    for (const field in errors) {
                        errorMessage += '- ' + errors[field][0] + '\n';
                    }
                    alert(errorMessage);
                } else {
                    alert('Erro ao enviar pré-inscrição. Tente novamente.');
                }
            });
    });
}
</script>
@endpush
