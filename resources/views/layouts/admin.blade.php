<!DOCTYPE html>
<html lang="pt">
<head>
    <!-- ==============================================
         META TAGS E CONFIGURAÇÕES BÁSICAS DA APLICAÇÃO ADMINISTRATIVA
         ============================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MC-COMERCIAL - @yield('title', 'Dashboard')</title>
    <!-- Token CSRF para requisições AJAX e formulários -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- ==============================================
         BIBLIOTECAS CSS EXTERNAS PARA PAINEL ADMINISTRATIVO
         ============================================== -->
    <!-- Bootstrap CSS - Framework principal para layout e componentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome - Biblioteca de ícones para interface administrativa -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS - Plugin para tabelas interativas com paginação, busca e ordenação -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <!-- ==============================================
         ESTILOS CSS PERSONALIZADOS PARA PAINEL ADMINISTRATIVO
         ============================================== -->
    <style>
        /* ===========================================
           VARIÁVEIS CSS GLOBAIS - CORES DO PAINEL ADMINISTRATIVO
           =========================================== */
        :root {
            --primary-color: #1e40af;      /* Azul profissional */
            --secondary-color: #64748b;    /* Cinza neutro */
            --success-color: #059669;      /* Verde profissional */
            --danger-color: #dc2626;       /* Vermelho profissional */
            --warning-color: #d97706;      /* Laranja profissional */
            --info-color: #0284c7;         /* Azul claro profissional */
            --light-color: #f8fafc;        /* Cor de fundo muito clara */
            --dark-color: #1e293b;         /* Cor escura para texto */
            --border-color: #e2e8f0;       /* Cor de bordas suave */
            --sidebar-bg: #1e293b;         /* Fundo escuro para sidebar */
        }
        
        /* ===========================================
           CONFIGURAÇÕES GERAIS DO BODY
           =========================================== */
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-color);
            font-size: 0.9rem;
            line-height: 1.6;
        }
        
        /* ===========================================
           ESTILOS DA MARCA/LOGO NO NAVBAR
           =========================================== */
        .navbar-brand {
            font-weight: 600;
            color: var(--primary-color) !important;
            font-size: 1.25rem;
        }
        
        /* ===========================================
           BARRA LATERAL (SIDEBAR) - MENU PRINCIPAL
           =========================================== */
        .sidebar {
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            z-index: 1000;
            padding-top: 70px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        /* Links do menu na sidebar */
        .sidebar .nav-link {
            color: #cbd5e1;
            border-radius: 0.375rem;
            margin: 0.125rem 1rem;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        /* Estados hover e active dos links da sidebar */
        .sidebar .nav-link:hover {
            background-color: rgba(59, 130, 246, 0.1);
            color: #e2e8f0;
            transform: translateX(2px);
        }
        
        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 2px 4px rgba(30, 64, 175, 0.3);
        }
        
        /* Separadores na sidebar */
        .sidebar hr {
            border-color: #475569;
            margin: 1rem 1.5rem;
        }
        
        .sidebar .section-title {
            color: #94a3b8;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 1rem 1.5rem 0.5rem;
        }
        
        /* ===========================================
           ÁREA PRINCIPAL DE CONTEÚDO
           =========================================== */
        .main-content {
            margin-left: 260px;
            padding: 2rem;
            min-height: 100vh;
            background-color: var(--light-color);
        }
        
        /* ===========================================
           ESTILOS DOS CARTÕES (CARDS)
           =========================================== */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            background-color: white;
        }
        
        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background-color: #f8fafc;
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
            color: var(--dark-color);
        }
        
        /* ===========================================
           ESTILOS DOS BOTÕES
           =========================================== */
        .btn {
            border-radius: 0.375rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }
        
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #1e40af;
            border-color: #1e40af;
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        .btn-warning {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
        }
        
        .btn-info {
            background-color: var(--info-color);
            border-color: var(--info-color);
        }
        
        /* ===========================================
           BARRA DE NAVEGAÇÃO SUPERIOR (NAVBAR)
           =========================================== */
        .navbar {
            background: white !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1001;
            border-bottom: 1px solid var(--border-color);
        }
        
        /* ===========================================
           ESTILOS DAS TABELAS
           =========================================== */
        .table-responsive {
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        
        .table th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 1rem 0.75rem;
        }
        
        .table td {
            padding: 0.75rem;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        
        .table tbody tr:hover {
            background-color: #f8fafc;
        }
        
        /* ===========================================
           BADGES E ALERTAS
           =========================================== */
        .badge {
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            font-weight: 500;
            font-size: 0.75rem;
        }
        
        .alert {
            border: none;
            border-radius: 0.5rem;
            padding: 1rem 1.25rem;
        }
        
        /* ===========================================
           FORMULÁRIOS
           =========================================== */
        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            transition: all 0.2s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        /* ===========================================
           ESTATÍSTICAS CARDS
           =========================================== */
        .stats-card {
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            color: white;
            border: none;
        }
        
        .stats-card.success {
            background: linear-gradient(135deg, var(--success-color), #10b981);
        }
        
        .stats-card.warning {
            background: linear-gradient(135deg, var(--warning-color), #f59e0b);
        }
        
        .stats-card.info {
            background: linear-gradient(135deg, var(--info-color), #06b6d4);
        }
        
        /* ===========================================
           RESPONSIVIDADE PARA DISPOSITIVOS MÓVEIS
           =========================================== */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .navbar .container-fluid {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
        
        /* ===========================================
           UTILITIES
           =========================================== */
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .text-success {
            color: var(--success-color) !important;
        }
        
        .text-danger {
            color: var(--danger-color) !important;
        }
        
        .text-warning {
            color: var(--warning-color) !important;
        }
        
        .text-info {
            color: var(--info-color) !important;
        }
        
        .bg-light-custom {
            background-color: #f8fafc !important;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- ==============================================
         BARRA DE NAVEGAÇÃO SUPERIOR FIXA
         ============================================== -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Botão hambúrguer para abrir sidebar em dispositivos móveis -->
            <button class="btn btn-outline-primary d-md-none" type="button" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Logo e nome da aplicação - link para dashboard -->
            <a class="navbar-brand ms-3" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo MC-COMERCIAL" style="height:30px;" class="me-2">
                MC-COMERCIAL
            </a>
            
            <!-- Menu do usuário - lado direito -->
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name ?? 'Administrador' }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog me-2"></i>Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-2"></i>Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==============================================
         BARRA LATERAL - MENU PRINCIPAL DE NAVEGAÇÃO
         ============================================== -->
    <nav class="sidebar" id="sidebar">
        <div class="nav flex-column">
            <!-- Dashboard - Página inicial do painel -->
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            
            <!-- =======  SEÇÃO: GESTÃO EDUCACIONAL  ======= -->
            <div class="section-title">Gestão Educacional</div>
            
            <a class="nav-link {{ request()->routeIs('cursos.*') ? 'active' : '' }}" href="{{ route('cursos.index') }}">
                <i class="fas fa-book me-2"></i>Cursos
            </a>
            
            <a class="nav-link {{ request()->routeIs('centros.*') ? 'active' : '' }}" href="{{ route('centros.index') }}">
                <i class="fas fa-building me-2"></i>Centros
            </a>
            
            <a class="nav-link {{ request()->routeIs('formadores.*') ? 'active' : '' }}" href="{{ route('formadores.index') }}">
                <i class="fas fa-chalkboard-teacher me-2"></i>Formadores
            </a>
            
            <a class="nav-link {{ request()->routeIs('horarios.*') ? 'active' : '' }}" href="{{ route('horarios.index') }}">
                <i class="fas fa-clock me-2"></i>Horários
            </a>
            
            <a class="nav-link {{ request()->routeIs('pre-inscricoes.*') ? 'active' : '' }}" href="{{ route('pre-inscricoes.index') }}">
                <i class="fas fa-user-plus me-2"></i>Pré-Inscrições
            </a>
            
            <!-- =======  SEÇÃO: LOJA & SNACK BAR  ======= -->
            <div class="section-title">Loja & Snack Bar</div>
            
            <a class="nav-link {{ request()->routeIs('categorias.*') ? 'active' : '' }}" href="{{ route('categorias.index') }}">
                <i class="fas fa-tags me-2"></i>Categorias
            </a>
            
            <a class="nav-link {{ request()->routeIs('produtos.*') ? 'active' : '' }}" href="{{ route('produtos.index') }}">
                <i class="fas fa-box me-2"></i>Produtos
            </a>
        </div>
    </nav>

    <!-- ==============================================
         ÁREA PRINCIPAL DE CONTEÚDO
         ============================================== -->
    <main class="main-content">
        <!-- =======  ALERTAS DE FEEDBACK DO SISTEMA  ======= -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <!-- Conteúdo dinâmico das páginas -->
        @yield('content')
    </main>

    <!-- ==============================================
         SCRIPTS JAVASCRIPT PARA FUNCIONALIDADE DO PAINEL
         ============================================== -->
    
    <!-- Bootstrap JS - Componentes interativos -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery - Biblioteca base para manipulação DOM e AJAX -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- DataTables - Plugin para tabelas avançadas -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- SweetAlert2 - Alertas e confirmações elegantes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- ==============================================
         FUNÇÕES JAVASCRIPT PERSONALIZADAS
         ============================================== -->
    <script>
        /* ===========================================
           FUNÇÃO: ALTERNAR SIDEBAR EM DISPOSITIVOS MÓVEIS
           =========================================== */
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }

        /* ===========================================
           CONFIGURAÇÃO GLOBAL: TOKEN CSRF PARA AJAX
           =========================================== */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* ===========================================
           FUNÇÃO: CONFIRMAÇÃO DE EXCLUSÃO COM SWEETALERT
           =========================================== */
        function confirmDelete(url, message = 'Esta ação não pode ser desfeita!') {
            Swal.fire({
                title: 'Tem certeza?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sim, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
    
    @stack('scripts')
</body>
</html>
