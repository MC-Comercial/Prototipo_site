@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- ==============================================
         CABEÇALHO DA PÁGINA DASHBOARD
         ============================================== -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3">
                <i class="fas fa-tachometer-alt me-3 text-primary"></i>Dashboard
            </h1>
            <p class="text-muted">Visão geral do sistema de gestão MC-COMERCIAL</p>
        </div>
    </div>

    <!-- ==============================================
         SEÇÃO: CARDS DE ESTATÍSTICAS PRINCIPAIS
         ============================================== -->
    <div class="row mb-5">
        <!-- CARD 1: ESTATÍSTICA DE CURSOS -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0 opacity-75">Total de Cursos</h6>
                            <h2 class="display-6 fw-bold mb-0" id="total-cursos">
                                <i class="fas fa-spinner fa-spin"></i>
                            </h2>
                            <small class="opacity-75">Cursos ativos no sistema</small>
                        </div>
                        <div class="fs-1 opacity-25">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2: ESTATÍSTICA DE CENTROS -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-card success h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0 opacity-75">Centros</h6>
                            <h2 class="display-6 fw-bold mb-0" id="total-centros">
                                <i class="fas fa-spinner fa-spin"></i>
                            </h2>
                            <small class="opacity-75">Centros registados</small>
                        </div>
                        <div class="fs-1 opacity-25">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 3: ESTATÍSTICA DE FORMADORES -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-card info h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0 opacity-75">Formadores</h6>
                            <h2 class="display-6 fw-bold mb-0" id="total-formadores">
                                <i class="fas fa-spinner fa-spin"></i>
                            </h2>
                            <small class="opacity-75">Formadores registados</small>
                        </div>
                        <div class="fs-1 opacity-25">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 4: ESTATÍSTICA DE PRÉ-INSCRIÇÕES -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-card warning h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0 opacity-75">Pré-Inscrições</h6>
                            <h2 class="display-6 fw-bold mb-0" id="total-pre-inscricoes">
                                <i class="fas fa-spinner fa-spin"></i>
                            </h2>
                            <small class="opacity-75">Pendentes de aprovação</small>
                        </div>
                        <div class="fs-1 opacity-25">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==============================================
         SEÇÃO: GRÁFICOS E INFORMAÇÕES DETALHADAS
         ============================================== -->
    <div class="row">
        <!-- ÚLTIMAS PRÉ-INSCRIÇÕES -->
        <div class="col-lg-8 mb-4">
            <div class="card h-100">
                <div class="card-header bg-light-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-line me-2 text-primary"></i>Últimas Pré-Inscrições
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Curso</th>
                                    <th>Centro</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="ultimas-inscricoes">
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-spinner fa-spin me-2"></i>Carregando dados...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-3">
                        <a href="{{ route('pre-inscricoes.index') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>Ver Todas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ESTATÍSTICAS RÁPIDAS -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-light-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-pie me-2 text-primary"></i>Distribuição por Modalidade
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Cursos Online</span>
                            <span class="badge bg-primary" id="cursos-online">0</span>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-primary" id="progress-online" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Cursos Presenciais</span>
                            <span class="badge bg-success" id="cursos-presencial">0</span>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-success" id="progress-presencial" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Pré-Inscrições Pendentes</span>
                            <span class="badge bg-warning text-dark" id="pendentes">0</span>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-warning" id="progress-pendentes" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('cursos.index') }}" class="btn btn-outline-primary btn-sm me-2">
                            <i class="fas fa-book me-1"></i>Gerir Cursos
                        </a>
                        <a href="{{ route('pre-inscricoes.index') }}" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-user-plus me-1"></i>Ver Pendentes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==============================================
         SEÇÃO: AÇÕES RÁPIDAS
         ============================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt me-2 text-primary"></i>Ações Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('cursos.create') }}" class="btn btn-primary w-100 py-3 text-decoration-none">
                                <i class="fas fa-plus-circle fa-2x mb-2 d-block"></i>
                                <span class="fw-semibold">Novo Curso</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('centros.create') }}" class="btn btn-success w-100 py-3 text-decoration-none">
                                <i class="fas fa-building fa-2x mb-2 d-block"></i>
                                <span class="fw-semibold">Novo Centro</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('formadores.create') }}" class="btn btn-info w-100 py-3 text-decoration-none">
                                <i class="fas fa-user-plus fa-2x mb-2 d-block"></i>
                                <span class="fw-semibold">Novo Formador</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('horarios.create') }}" class="btn btn-warning w-100 py-3 text-decoration-none">
                                <i class="fas fa-clock fa-2x mb-2 d-block"></i>
                                <span class="fw-semibold">Novo Horário</span>
                            </a>
                        </div>
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
    carregarEstatisticas();
    carregarUltimasInscricoes();
});

function carregarEstatisticas() {
    // Carregar total de cursos
    $.get('{{ route("api.cursos.index") }}')
        .done(function(data) {
            $('#total-cursos').text(data.length);
            
            const online = data.filter(curso => curso.modalidade === 'online').length;
            const presencial = data.filter(curso => curso.modalidade === 'presencial').length;
            const total = data.length;
            
            $('#cursos-online').text(online);
            $('#cursos-presencial').text(presencial);
            
            if (total > 0) {
                $('#progress-online').css('width', (online / total * 100) + '%');
                $('#progress-presencial').css('width', (presencial / total * 100) + '%');
            }
        })
        .fail(function() {
            $('#total-cursos').text('N/A');
        });
    
    // Carregar total de centros
    $.get('{{ route("api.centros.index") }}')
        .done(function(data) {
            $('#total-centros').text(data.length);
        })
        .fail(function() {
            $('#total-centros').text('N/A');
        });
    
    // Carregar total de formadores
    $.get('{{ route("api.formadores.index") }}')
        .done(function(data) {
            $('#total-formadores').text(data.length);
        })
        .fail(function() {
            $('#total-formadores').text('N/A');
        });
    
    // Carregar pré-inscrições
    $.get('{{ route("api.pre-inscricoes.index") }}')
        .done(function(data) {
            const pendentes = data.filter(inscricao => inscricao.status === 'pendente').length;
            $('#total-pre-inscricoes').text(pendentes);
            $('#pendentes').text(pendentes);
            
            if (data.length > 0) {
                $('#progress-pendentes').css('width', (pendentes / data.length * 100) + '%');
            }
        })
        .fail(function() {
            $('#total-pre-inscricoes').text('N/A');
        });
}

function carregarUltimasInscricoes() {
    $.get('{{ route("api.pre-inscricoes.index") }}')
        .done(function(data) {
            let html = '';
            
            if (data.length === 0) {
                html = '<tr><td colspan="6" class="text-center text-muted py-4">Nenhuma pré-inscrição encontrada</td></tr>';
            } else {
                // Mostrar apenas as últimas 5
                const ultimas = data.slice(0, 5);
                
                ultimas.forEach(function(inscricao) {
                    const statusClass = getStatusClass(inscricao.status);
                    const statusText = getStatusText(inscricao.status);
                    const data_formatada = new Date(inscricao.created_at).toLocaleDateString('pt-PT');
                    
                    html += `
                        <tr>
                            <td>
                                <div class="fw-semibold">${inscricao.nome_completo}</div>
                            </td>
                            <td>
                                <small class="text-muted">${inscricao.email}</small>
                            </td>
                            <td>
                                <small class="text-muted">ID: ${inscricao.curso_id}</small>
                            </td>
                            <td>
                                <small class="text-muted">ID: ${inscricao.centro_id}</small>
                            </td>
                            <td>
                                <small class="text-muted">${data_formatada}</small>
                            </td>
                            <td>
                                <span class="badge ${statusClass}">${statusText}</span>
                            </td>
                        </tr>
                    `;
                });
            }
            
            $('#ultimas-inscricoes').html(html);
        })
        .fail(function() {
            $('#ultimas-inscricoes').html('<tr><td colspan="6" class="text-center text-danger py-4">Erro ao carregar dados</td></tr>');
        });
}

function getStatusClass(status) {
    switch(status) {
        case 'pendente': return 'bg-warning text-dark';
        case 'confirmado': return 'bg-success';
        case 'cancelado': return 'bg-danger';
        default: return 'bg-secondary';
    }
}

function getStatusText(status) {
    switch(status) {
        case 'pendente': return 'Pendente';
        case 'confirmado': return 'Confirmado';
        case 'cancelado': return 'Cancelado';
        default: return status;
    }
}
</script>
@endpush
