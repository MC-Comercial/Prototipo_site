<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\FormadorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PreInscricaoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Site Público Routes
|--------------------------------------------------------------------------
*/

// Páginas do site público
Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/home', [SiteController::class, 'home'])->name('site.home.alt');
Route::get('/site', [SiteController::class, 'home'])->name('site.home.alt2');
Route::get('/site/centros', [SiteController::class, 'centros'])->name('site.centros');
Route::get('/site/centro/{centro}', [SiteController::class, 'centro'])->name('site.centro');
Route::get('/site/sobre', [SiteController::class, 'sobre'])->name('site.sobre');
Route::get('/site/contactos', [SiteController::class, 'contactos'])->name('site.contactos');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Rota de login simples para teste
Route::get('/simple-login', function() {
    return '<h1>Login Page</h1><form method="POST" action="/login">' . csrf_field() . '<input name="email" placeholder="Email" required><input name="password" type="password" placeholder="Password" required><button type="submit">Login</button></form>';
})->middleware('guest')->name('simple.login');

// Rotas de teste para debug
Route::get('/test-login', function() {
    return 'Login route is working!';
});

Route::get('/debug-routes', function() {
    $routes = collect(\Route::getRoutes())->map(function ($route) {
        return [
            'method' => implode('|', $route->methods()),
            'uri' => $route->uri(),
            'name' => $route->getName(),
            'action' => $route->getActionName(),
        ];
    });
    
    return response()->json($routes);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Cursos
    Route::resource('cursos', CursoController::class);
    Route::patch('cursos/{curso}/toggle-status', [CursoController::class, 'toggleStatus'])->name('cursos.toggle-status');
    
    // Centros
    Route::resource('centros', CentroController::class);
    
    // Formadores
    Route::resource('formadores', FormadorController::class);
    
    // Horários
    Route::resource('horarios', HorarioController::class);
    
    // Pré-inscrições
    Route::resource('pre-inscricoes', PreInscricaoController::class);
    Route::patch('pre-inscricoes/{preInscricao}/status', [PreInscricaoController::class, 'updateStatus'])->name('pre-inscricoes.update-status');
    
    // Categorias
    Route::resource('categorias', CategoriaController::class);
    
    // Produtos
    Route::resource('produtos', ProdutoController::class);
});
