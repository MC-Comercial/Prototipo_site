# 🚀 GUIA DE TESTE - MC COMERCIAL

## ✅ PROBLEMAS CORRIGIDOS

### 🔐 **AUTENTICAÇÃO**
- ✅ Login simplificado usando autenticação web padrão Laravel
- ✅ APIs aceitam tanto autenticação web (cookies) quanto tokens
- ✅ Middleware corrigido para aceitar `auth:sanctum,web`
- ✅ Logout funcionando corretamente

### 🐛 **ERROS JAVASCRIPT CORRIGIDOS**
- ✅ Erro 404 (favicon ausente) resolvido
- ✅ Erro de listener assíncrono nas páginas de edição corrigido
- ✅ Removidas todas as referências problemáticas a localStorage
- ✅ AJAX simplificado sem tokens desnecessários

### 🛠️ **CRUDs CORRIGIDOS**
- ✅ Cursos - CRUD completo funcionando
- ✅ Centros - CRUD completo funcionando  
- ✅ Formadores - CRUD completo funcionando
- ✅ Horários - CRUD completo funcionando
- ✅ Pré-inscrições - CRUD completo funcionando
- ✅ Produtos - CRUD completo funcionando
- ✅ Categorias - CRUD completo funcionando

### 🌐 **ROTAS CORRIGIDAS**
- ✅ `/login` - Autenticação web padrão
- ✅ `/api/*` - APIs com autenticação híbrida
- ✅ Rotas protegidas funcionando

---

## 🧪 COMO TESTAR

### 1. **Preparar Base de Dados**
```bash
# No diretório do projeto Laravel
php artisan migrate:fresh --seed
```

### 2. **Iniciar Servidor**
```bash
php artisan serve
```

### 3. **Testar Login**
- Acesse: `http://localhost:8000/login`
- **Email:** `admin@site.com`
- **Senha:** `senha123`
- Deve redirecionar para `/dashboard`

### 4. **Testar CRUDs**
Acesse cada seção no menu lateral:
- **Cursos** → Listar, criar, editar, eliminar
- **Centros** → Listar, criar, editar, eliminar
- **Formadores** → Listar, criar, editar, eliminar
- **Horários** → Listar, criar, editar, eliminar
- **Pré-inscrições** → Listar, ver detalhes, eliminar
- **Categorias** → Listar, criar, editar, eliminar
- **Produtos** → Listar, criar, editar, eliminar

### 5. **Testar Site Público**
- Acesse: `http://localhost:8000`
- Navegue pelas páginas:
  - Home
  - Centros
  - Sobre Nós
  - Contactos

---

## 🔧 PRINCIPAIS CORREÇÕES FEITAS

### **1. Autenticação Simplificada**
```php
// ANTES: Só API tokens
Route::middleware('auth:sanctum')

// AGORA: Web + API
Route::middleware(['auth:sanctum,web'])
```

### **2. Login Direto**
```javascript
// ANTES: API híbrida complexa
url: '/api/web-login'

// AGORA: Laravel padrão
url: '/login'
```

### **3. CRUDs Funcionais**
```javascript
// ANTES: CrudManager complexo
window.cursosManager = new CrudManager('Curso', '/api/cursos');

// AGORA: AJAX simples
$.ajax({ url: '/api/cursos', method: 'GET' })
```

### **4. Logout Simples**
```javascript
// ANTES: API logout
$.ajax({ url: '/api/logout' })

// AGORA: Form padrão
form.action = '/logout'
```

---

## 🐛 SE AINDA HOUVER PROBLEMAS

### **Erro 401/403 nas APIs:**
```bash
# Limpar cache
php artisan config:clear
php artisan route:clear
php artisan cache:clear
```

### **Tabelas não existem:**
```bash
php artisan migrate:fresh --seed
```

### **Sessão não funciona:**
```bash
# Gerar nova chave
php artisan key:generate
```

### **CORS Issues:**
Verificar `config/cors.php`:
```php
'paths' => ['api/*', 'sanctum/csrf-cookie'],
'allowed_origins' => ['*'],
```

---

## 📊 DADOS DE TESTE

### **Admin Login:**
- Email: `admin@site.com`
- Senha: `senha123`

### **Base de Dados:**
- ✅ 3 Centros criados
- ✅ 15 Cursos criados
- ✅ 7 Formadores criados
- ✅ 50 Horários criados
- ✅ 100 Pré-inscrições criadas
- ✅ 5 Categorias criadas
- ✅ 20 Produtos criados

---

## 🎯 FUNCIONALIDADES TESTADAS

✅ **Login/Logout**  
✅ **Dashboard com estatísticas**  
✅ **Todos os CRUDs**  
✅ **Site público**  
✅ **Formulários funcionais**  
✅ **Autenticação em todas as rotas**  

---

**O sistema está 100% funcional e pronto para uso!** 🎉
