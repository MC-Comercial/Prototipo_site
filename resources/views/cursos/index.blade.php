@extends('layouts.admin')

@section('title', 'Gestão de Cursos')

@section('content')
<div class="container-fluid">
    <!-- Cabeçalho da página -->
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="h3 mb-3">
                <i class="fas fa-book me-3 text-primary"></i>Gestão de Cursos
            </h1>
            <p class="text-muted">Gerir todos os cursos disponíveis no sistema</p>
        </div>
        <div class="col-sm-6 text-end">
            <a href="{{ route('cursos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Novo Curso
            </a>
        </div>
    </div>

    <!-- Card principal -->
    <div class="card">
        <div class="card-header bg-light-custom">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>Lista de Cursos
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="cursosTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Modalidade</th>
                            <th>Duração</th>
                            <th>Preço</th>
                            <th>Status</th>
                            <th>Centro</th>
                            <th width="120">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dados carregados via DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#cursosTable').DataTable({
        ajax: {
            url: '{{ route("api.cursos.index") }}',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { 
                data: 'nome',
                render: function(data, type, row) {
                    return `<div class="fw-semibold">${data}</div>
                            <small class="text-muted">${row.descricao || 'Sem descrição'}</small>`;
                }
            },
            { 
                data: 'modalidade',
                render: function(data) {
                    const badgeClass = data === 'online' ? 'bg-info' : 'bg-success';
                    return `<span class="badge ${badgeClass}">${data}</span>`;
                }
            },
            { 
                data: 'duracao_horas',
                render: function(data) {
                    return data ? `${data}h` : 'N/A';
                }
            },
            { 
                data: 'preco',
                render: function(data) {
                    return data ? `${parseFloat(data).toLocaleString('pt-AO')} AOA` : 'Gratuito';
                }
            },
            { 
                data: 'ativo',
                render: function(data) {
                    return data ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-secondary">Inativo</span>';
                }
            },
            { 
                data: 'centro_id',
                render: function(data) {
                    return data ? `Centro #${data}` : 'N/A';
                }
            },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return `
                        <div class="btn-group" role="group">
                            <a href="/cursos/${row.id}" class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/cursos/${row.id}/edit" class="btn btn-sm btn-outline-warning" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="confirmDelete('/cursos/${row.id}')" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                }
            }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json'
        },
        order: [[0, 'desc']],
        pageLength: 25,
        responsive: true
    });
});
</script>
@endpush
