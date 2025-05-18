Ficha técnica - Sistema de Gestão de Tarefas (CRUD) com Laravel 
Autor: Diogo Nunes 20201199
Data: 19/05/2025

Funcionalidade 
Desenvolvimento de uma aplicação web CRUD para gestão de tarefas com autenticação. Cada utilizador pode criar, visualizar, editar e eliminar as suas próprias tarefas.

Pré-requisitos 
- Laravel 12 (via Laravel Herd)
- Laravel Breeze (autenticação)
- PHP 8.4
- MySQL (via Laravel Herd)
- Bootstrap 5
- Adminer (gestão da base de dados local)

Etapas Realizadas
Etapa 1 – Instalação
Laravel instalado com Laravel Herd
Projeto iniciado: workopia

Etapa 2 – Criação da Base de Dados
Base de dados 'workopia' criada no Herd

Etapa 3 – Criação das Tabelas
Tabela 'tarefas' com campos: id, user_id, titulo, descricao, data_fim, status

Etapa 4 – Controladores
TarefaController com métodos index, create, store, edit, update, destroy

Etapa 5 – Templates (views)
index.blade.php, create.blade.php, edit.blade.php
Layout global com modo escuro e Bootstrap 5

Etapa 6 – Rotas
Route::resource('tarefas', TarefaController::class);

Etapa 7 – Testes e funcionalidades extra
Validação de dados, mensagens de sucesso, filtros por estado e data,
autorização por utilizador, eliminação com confirmação, estilização com Bootstrap

Base de dados
Gerida com Adminer via Laravel Herd
Tabela principal: tarefas
Ligação definida no ficheiro .env

Estrutura do projeto
app/
  Http/Controllers/TarefaController.php
resources/views/tarefas/
  index.blade.php
  create.blade.php
  edit.blade.php
routes/web.php
database/migrations/2025_05_17_101843_create_tarefas_table.php

