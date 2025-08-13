<?php

echo "=== MC-COMERCIAL - Populador de Base de Dados ===\n\n";

echo "1. Executando migrações...\n";
system('php artisan migrate:fresh');

echo "\n2. Executando seeders...\n";
system('php artisan db:seed');

echo "\n3. Verificando dados criados...\n";
system('php artisan tinker --execute="
echo \"Centros: \" . App\Models\Centro::count() . \"\\n\";
echo \"Cursos: \" . App\Models\Curso::count() . \"\\n\";
echo \"Formadores: \" . App\Models\Formador::count() . \"\\n\";
echo \"Horários: \" . App\Models\Horario::count() . \"\\n\";
echo \"Pré-inscrições: \" . App\Models\PreInscricao::count() . \"\\n\";
echo \"Categorias: \" . App\Models\Categoria::count() . \"\\n\";
echo \"Produtos: \" . App\Models\Produto::count() . \"\\n\";
"');

echo "\n✅ Base de dados populada com sucesso!\n";
echo "Agora pode testar os CRUDs no painel admin.\n\n";

echo "📋 Para acessar:\n";
echo "- Login: http://localhost:8000/login\n";
echo "- Dashboard: http://localhost:8000/dashboard\n\n";

echo "👤 Credenciais de admin:\n";
echo "- Email: admin@mccomercial.ao\n";
echo "- Senha: password\n\n";
