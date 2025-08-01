@extends('layouts.site')

@section('title', 'Home')
@section('description', 'MC-COMERCIAL - Centro de formação profissional especializado em diversas áreas do conhecimento')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Invista no seu <span class="text-warning">Futuro Profissional</span>
                    </h1>
                    <p class="lead mb-4">
                        Formação de qualidade com mais de 10 anos de experiência. 
                        Prepare-se para os desafios do mercado de trabalho com os nossos cursos especializados.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('site.centros') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-search me-2"></i>Explorar Cursos
                        </a>
                        <a href="#sobre" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-info-circle me-2"></i>Saber Mais
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Formação Profissional" 
                         class="img-fluid rounded-3 shadow-lg"
                         style="max-height: 400px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Estatísticas -->
<section class="section bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="fw-bold text-primary" id="total-alunos">500+</h3>
                        <p class="text-muted mb-0">Alunos Formados</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 class="fw-bold text-primary" id="total-cursos-home">
                            <i class="fas fa-spinner fa-spin"></i>
                        </h3>
                        <p class="text-muted mb-0">Cursos Disponíveis</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3 class="fw-bold text-primary" id="total-centros-home">
                            <i class="fas fa-spinner fa-spin"></i>
                        </h3>
                        <p class="text-muted mb-0">Centros de Formação</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="fw-bold text-primary">100%</h3>
                        <p class="text-muted mb-0">Taxa de Sucesso</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nossos Centros -->
<section class="section" id="centros">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Nossos Centros de Formação</h2>
            <p class="section-subtitle">Escolha o centro mais próximo de si e explore os nossos cursos</p>
        </div>
        
        <div class="row" id="centros-home">
            <div class="col-12">
                <div class="loading">
                    <div class="spinner"></div>
                    <p>Carregando centros...</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('site.centros') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-building me-2"></i>Ver Todos os Centros
            </a>
        </div>
    </div>
</section>

<!-- Por que escolher-nos -->
<section class="section bg-light" id="sobre">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="section-title text-start">Por que escolher a MC-COMERCIAL?</h2>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div style="width: 50px; height: 50px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Experiência Comprovada</h6>
                                <p class="text-muted small mb-0">Mais de 10 anos no mercado de formação</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div style="width: 50px; height: 50px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Formadores Qualificados</h6>
                                <p class="text-muted small mb-0">Profissionais experientes e certificados</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div style="width: 50px; height: 50px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Várias Localizações</h6>
                                <p class="text-muted small mb-0">Centros estrategicamente localizados</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div style="width: 50px; height: 50px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                    <i class="fas fa-handshake"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Apoio Personalizado</h6>
                                <p class="text-muted small mb-0">Acompanhamento durante todo o percurso</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     alt="Equipa MC-COMERCIAL" 
                     class="img-fluid rounded-3 shadow-lg"
                     style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Nossos Serviços -->
<section class="section bg-light" id="servicos">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Nossos Serviços</h2>
            <p class="section-subtitle">Soluções completas para o seu sucesso académico e profissional</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 service-card" onclick="abrirServicoAcademico()">
                    <div class="card-img-container position-relative">
                        <img src="https://public.youware.com/users-website-assets/prod/c452da46-1437-4697-a416-fe7935ee1d97/d08e324270874d27b2bcd8b499c4d807.jpg" 
                             alt="Projectos Académicos" class="card-img-top service-img">
                        <div class="card-overlay">
                            <div class="feature-icon">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Projectos Académicos</h5>
                        <p class="card-text text-muted">
                            Apoio especializado para monografias, dissertações, teses e artigos científicos.
                        </p>
                        <div class="cta-button">
                            <i class="fas fa-chevron-right me-2"></i>Ver Detalhes
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 service-card" onclick="abrirLoja()">
                    <div class="card-img-container position-relative">
                        <img src="https://public.youware.com/users-website-assets/prod/c452da46-1437-4697-a416-fe7935ee1d97/501612e340e644e19958a542d1ae78e5.png" 
                             alt="Loja" class="card-img-top service-img">
                        <div class="card-overlay">
                            <div class="feature-icon">
                                <i class="fas fa-desktop"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Loja MC</h5>
                        <p class="card-text text-muted">
                            Computadores, acessórios, material escolar e software personalizado.
                        </p>
                        <div class="cta-button">
                            <i class="fas fa-chevron-right me-2"></i>Ver Catálogo
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 service-card" onclick="abrirSnackBar()">
                    <div class="card-img-container position-relative">
                        <img src="https://public.youware.com/users-website-assets/prod/c452da46-1437-4697-a416-fe7935ee1d97/8d9205e2c07e4b6eb5b0a22876465ff9.jpg" 
                             alt="SNACK-BAR" class="card-img-top service-img">
                        <div class="card-overlay">
                            <div class="feature-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">SNACK-BAR MC</h5>
                        <p class="card-text text-muted">
                            Espaço acolhedor com bebidas, comidas e snacks de qualidade.
                        </p>
                        <div class="cta-button">
                            <i class="fas fa-chevron-right me-2"></i>Ver Menu
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);">
    <div class="container text-center text-white">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-4">Pronto para começar a sua jornada?</h2>
                <p class="lead mb-4">
                    Não perca mais tempo! Explore os nossos centros, escolha o seu curso ideal 
                    e faça a sua pré-inscrição hoje mesmo.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('site.centros') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-building me-2"></i>Ver Centros
                    </a>
                    <a href="{{ route('site.contactos') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Falar Connosco
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal para Projectos Académicos -->
<div class="modal fade" id="modalAcademicos" tabindex="-1" aria-labelledby="modalAcademicosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalAcademicosLabel">
                    <i class="fas fa-book me-2"></i>Projectos Académicos
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-4">Oferecemos apoio especializado e personalizado para todos os tipos de trabalhos académicos.</p>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="service-item">
                            <div class="d-flex align-items-center mb-2">
                                <div style="width: 40px; height: 40px; background: var(--light-gray); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--accent-color); font-size: 1.2rem; margin-right: 1rem;">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <h6 class="mb-0">Monografias</h6>
                            </div>
                            <p class="text-muted small">Desenvolvimento completo de monografias de graduação com metodologia rigorosa.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="service-item">
                            <div class="d-flex align-items-center mb-2">
                                <div style="width: 40px; height: 40px; background: var(--light-gray); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--accent-color); font-size: 1.2rem; margin-right: 1rem;">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <h6 class="mb-0">Dissertações</h6>
                            </div>
                            <p class="text-muted small">Suporte para dissertações de mestrado com acompanhamento personalizado.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="service-item">
                            <div class="d-flex align-items-center mb-2">
                                <div style="width: 40px; height: 40px; background: var(--light-gray); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--accent-color); font-size: 1.2rem; margin-right: 1rem;">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <h6 class="mb-0">Teses</h6>
                            </div>
                            <p class="text-muted small">Apoio completo para teses de doutoramento com orientação especializada.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="service-item">
                            <div class="d-flex align-items-center mb-2">
                                <div style="width: 40px; height: 40px; background: var(--light-gray); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--accent-color); font-size: 1.2rem; margin-right: 1rem;">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <h6 class="mb-0">Artigos Científicos</h6>
                            </div>
                            <p class="text-muted small">Redação e formatação de artigos para publicação em revistas científicas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <a href="{{ route('site.contactos') }}" class="btn btn-primary">
                    <i class="fas fa-envelope me-2"></i>Solicitar Orçamento
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Loja -->
<div class="modal fade" id="modalLoja" tabindex="-1" aria-labelledby="modalLojaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLojaLabel">
                    <i class="fas fa-desktop me-2"></i>Loja MC - Catálogo de Produtos
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Tabs das categorias -->
                    <div class="col-12 mb-4">
                        <ul class="nav nav-pills justify-content-center" id="loja-tabs" role="tablist">
                            <!-- Tabs serão carregadas dinamicamente -->
                        </ul>
                    </div>
                    
                    <!-- Conteúdo das categorias -->
                    <div class="col-12">
                        <div class="tab-content" id="loja-content">
                            <div class="text-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Carregando...</span>
                                </div>
                                <p class="mt-3">Carregando produtos...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Snack Bar -->
<div class="modal fade" id="modalSnackBar" tabindex="-1" aria-labelledby="modalSnackBarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalSnackBarLabel">
                    <i class="fas fa-utensils me-2"></i>SNACK-BAR MC - Menu
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="snack-content">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Carregando...</span>
                        </div>
                        <p class="mt-3">Carregando menu...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Projectos Académicos -->
<div class="modal fade" id="modalAcademicos" tabindex="-1" aria-labelledby="modalAcademicosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalAcademicosLabel">
                    <i class="fas fa-graduation-cap me-2"></i>Projectos Académicos MC
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <p class="lead text-center">
                                Oferecemos apoio especializado e personalizado para todos os tipos de trabalhos académicos.
                            </p>
                        </div>
                    </div>
                    
                    <div class="row g-4">
                        <!-- Monografias -->
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-file-alt fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="card-title">Monografias</h5>
                                    <p class="card-text">Desenvolvimento completo de monografias de graduação com metodologia rigorosa e acompanhamento personalizado.</p>
                                    <ul class="list-unstyled text-start">
                                        <li><i class="fas fa-check text-success me-2"></i>Escolha do tema</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Revisão bibliográfica</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Metodologia científica</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Formatação ABNT</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Dissertações -->
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-book-open fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="card-title">Dissertações</h5>
                                    <p class="card-text">Suporte para dissertações de mestrado com acompanhamento especializado e orientação metodológica.</p>
                                    <ul class="list-unstyled text-start">
                                        <li><i class="fas fa-check text-success me-2"></i>Projeto de pesquisa</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Coleta e análise de dados</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Redação académica</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Defesa e apresentação</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Teses -->
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-university fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="card-title">Teses de Doutoramento</h5>
                                    <p class="card-text">Apoio completo para teses de doutoramento com orientação especializada e metodologia avançada.</p>
                                    <ul class="list-unstyled text-start">
                                        <li><i class="fas fa-check text-success me-2"></i>Investigação original</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Análise estatística</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Publicações científicas</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Orientação especializada</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Artigos Científicos -->
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-newspaper fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="card-title">Artigos Científicos</h5>
                                    <p class="card-text">Redação e formatação de artigos para publicação em revistas científicas nacionais e internacionais.</p>
                                    <ul class="list-unstyled text-start">
                                        <li><i class="fas fa-check text-success me-2"></i>Estrutura científica</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Revisão por pares</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Normas de publicação</li>
                                        <li><i class="fas fa-check text-success me-2"></i>Submissão a revistas</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Outros Serviços -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm bg-light">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-3">
                                        <i class="fas fa-plus-circle text-primary me-2"></i>Outros Serviços Académicos
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <i class="fas fa-edit text-primary me-2"></i>Relatórios de Estágio
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <i class="fas fa-chart-bar text-primary me-2"></i>Projetos de Investigação
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <i class="fas fa-presentation text-primary me-2"></i>Apresentações Académicas
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <i class="fas fa-book text-primary me-2"></i>Trabalhos de Curso
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <i class="fas fa-clipboard-check text-primary me-2"></i>Revisão e Formatação
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <i class="fas fa-language text-primary me-2"></i>Tradução Académica
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <p class="mb-3"><strong>Precisa de ajuda com o seu projecto académico?</strong></p>
                            <a href="tel:+244900000000" class="btn btn-primary me-2">
                                <i class="fas fa-phone me-2"></i>Contactar Agora
                            </a>
                            <a href="mailto:academicos@mc.ao" class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>Enviar Email
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
    carregarDadosHome();
});

function carregarDadosHome() {
    // Carregar estatísticas de cursos
    $.get('{{ route("api.cursos.index") }}')
        .done(function(data) {
            const cursosAtivos = data.filter(curso => curso.ativo);
            $('#total-cursos-home').text(cursosAtivos.length);
        })
        .fail(function() {
            $('#total-cursos-home').text('N/A');
        });
    
    // Carregar centros
    $.get('{{ route("api.centros.index") }}')
        .done(function(data) {
            $('#total-centros-home').text(data.length);
            exibirCentrosHome(data);
        })
        .fail(function() {
            $('#total-centros-home').text('N/A');
            $('#centros-home').html(`
                <div class="col-12 text-center py-5">
                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                    <p class="text-muted">Erro ao carregar centros. Tente novamente mais tarde.</p>
                </div>
            `);
        });
}

function exibirCentrosHome(centros) {
    let html = '';
    
    if (centros.length === 0) {
        html = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                <p class="text-muted">Nenhum centro disponível no momento.</p>
            </div>
        `;
    } else {
        // Mostrar apenas os primeiros 3 centros na homepage
        const centrosLimitados = centros.slice(0, 3);
        
        centrosLimitados.forEach(function(centro) {
            let contactosInfo = '';
            try {
                if (centro.contactos) {
                    const contactos = JSON.parse(centro.contactos);
                    if (contactos.length > 0) {
                        contactosInfo = `<small class="text-muted"><i class="fas fa-phone me-1"></i>${contactos[0].valor}</small>`;
                    }
                }
            } catch (e) {
                console.log('Erro ao processar contactos:', e);
            }
            
            html += `
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <div class="feature-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <h5 class="card-title">${centro.nome}</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>${centro.localizacao}
                            </p>
                            ${centro.email ? `<p class="text-muted mb-2"><i class="fas fa-envelope me-2"></i>${centro.email}</p>` : ''}
                            ${contactosInfo}
                            <div class="mt-3">
                                <a href="{{ route('site.centro', '') }}/${centro.id}" class="btn btn-primary">
                                    <i class="fas fa-eye me-2"></i>Ver Cursos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    }
    
    $('#centros-home').html(html);
}

// Função para abrir modal da Loja
function abrirLoja() {
    const modal = new bootstrap.Modal(document.getElementById('modalLoja'));
    modal.show();
    carregarLoja();
}

// Função para abrir modal do Snack Bar
function abrirSnackBar() {
    const modal = new bootstrap.Modal(document.getElementById('modalSnackBar'));
    modal.show();
    carregarSnackBar();
}

// Função para abrir modal de Serviços Acadêmicos  
function abrirServicoAcademico() {
    const modal = new bootstrap.Modal(document.getElementById('modalAcademicos'));
    modal.show();
}

// Função para carregar categorias e produtos da loja
function carregarLoja() {
    const tabsContainer = $('#loja-tabs');
    const contentContainer = $('#loja-content');
    
    // Mostrar loading
    tabsContainer.html('');
    contentContainer.html(`
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
            <p class="mt-3">Carregando produtos...</p>
        </div>
    `);
    
    // Buscar categorias da loja
    $.get('/api/categorias?tipo=loja')
        .done(function(categorias) {
            if (categorias.length === 0) {
                contentContainer.html(`
                    <div class="text-center py-5">
                        <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Nenhum produto disponível no momento.</p>
                    </div>
                `);
                return;
            }
            
            // Criar tabs das categorias
            let tabsHtml = '';
            categorias.forEach(function(categoria, index) {
                const isActive = index === 0 ? 'active' : '';
                tabsHtml += `
                    <li class="nav-item" role="presentation">
                        <button class="nav-link ${isActive}" id="loja-tab-${categoria.id}" data-bs-toggle="pill" 
                                data-bs-target="#loja-pane-${categoria.id}" type="button" role="tab" 
                                onclick="carregarProdutosCategoria(${categoria.id}, 'loja')">
                            ${categoria.nome}
                        </button>
                    </li>
                `;
            });
            tabsContainer.html(tabsHtml);
            
            // Criar conteúdo das categorias
            let contentHtml = '';
            categorias.forEach(function(categoria, index) {
                const isActive = index === 0 ? 'show active' : '';
                contentHtml += `
                    <div class="tab-pane fade ${isActive}" id="loja-pane-${categoria.id}" role="tabpanel">
                        <div id="produtos-${categoria.id}">
                            <div class="text-center py-3">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Carregando produtos...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            contentContainer.html(contentHtml);
            
            // Carregar produtos da primeira categoria automaticamente
            if (categorias.length > 0) {
                carregarProdutosCategoria(categorias[0].id, 'loja');
            }
        })
        .fail(function() {
            contentContainer.html(`
                <div class="text-center py-5">
                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                    <p class="text-muted">Erro ao carregar produtos. Tente novamente mais tarde.</p>
                </div>
            `);
        });
}

// Função para carregar menu do snack bar
function carregarSnackBar() {
    const contentContainer = $('#snack-content');
    
    // Mostrar loading
    contentContainer.html(`
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
            <p class="mt-3">Carregando menu...</p>
        </div>
    `);
    
    // Buscar categorias do snack
    $.get('/api/categorias?tipo=snack')
        .done(function(categorias) {
            if (categorias.length === 0) {
                contentContainer.html(`
                    <div class="text-center py-5">
                        <i class="fas fa-utensils fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Menu não disponível no momento.</p>
                    </div>
                `);
                return;
            }
            
            let html = '';
            categorias.forEach(function(categoria) {
                html += `
                    <div class="menu-section mb-4">
                        <h4 class="mb-3 text-primary">
                            <i class="fas fa-utensils me-2"></i>${categoria.nome}
                        </h4>
                        ${categoria.descricao ? `<p class="text-muted mb-3">${categoria.descricao}</p>` : ''}
                        <div id="snack-produtos-${categoria.id}">
                            <div class="text-center py-3">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden">Carregando...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                // Carregar produtos desta categoria
                carregarProdutosCategoria(categoria.id, 'snack');
            });
            
            contentContainer.html(html);
        })
        .fail(function() {
            contentContainer.html(`
                <div class="text-center py-5">
                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                    <p class="text-muted">Erro ao carregar menu. Tente novamente mais tarde.</p>
                </div>
            `);
        });
}

// Função para carregar produtos de uma categoria específica
function carregarProdutosCategoria(categoriaId, tipo) {
    const containerId = tipo === 'loja' ? `produtos-${categoriaId}` : `snack-produtos-${categoriaId}`;
    const container = $(`#${containerId}`);
    
    $.get(`/api/categorias/${categoriaId}/produtos`)
        .done(function(produtos) {
            if (produtos.length === 0) {
                container.html(`
                    <div class="text-center py-3">
                        <i class="fas fa-box fa-2x text-muted mb-2"></i>
                        <p class="text-muted">Nenhum produto disponível nesta categoria.</p>
                    </div>
                `);
                return;
            }
            
            let html = '';
            
            if (tipo === 'loja') {
                html = '<div class="row">';
                produtos.forEach(function(produto) {
                    const imagemUrl = produto.imagem || 'https://via.placeholder.com/300x200?text=Produto';
                    html += `
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="${imagemUrl}" class="card-img-top" alt="${produto.nome}" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">${produto.nome}</h5>
                                    <p class="card-text">${produto.descricao || 'Sem descrição disponível'}</p>
                                    <p class="text-primary fw-bold fs-5">${produto.preco_formatado}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                html += '</div>';
            } else {
                // Formato para snack bar (lista de itens)
                produtos.forEach(function(produto) {
                    const imagemUrl = produto.imagem || null;
                    html += `
                        <div class="menu-item d-flex align-items-start mb-3 p-3 border-bottom">
                            ${imagemUrl ? `<img src="${imagemUrl}" alt="${produto.nome}" class="me-3" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">` : ''}
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${produto.nome}</h6>
                                <p class="text-muted mb-2 small">${produto.descricao || 'Sem descrição disponível'}</p>
                                <span class="text-primary fw-bold">${produto.preco_formatado}</span>
                            </div>
                        </div>
                    `;
                });
            }
            
            container.html(html);
        })
        .fail(function() {
            container.html(`
                <div class="text-center py-3">
                    <i class="fas fa-exclamation-triangle fa-2x text-warning mb-2"></i>
                    <p class="text-muted">Erro ao carregar produtos. Tente novamente.</p>
                </div>
            `);
        });
}
</script>
@endpush
