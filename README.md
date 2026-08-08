# Sistema de Controle de Tarefas Pessoais

Sistema web para gerenciamento de tarefas pessoais, desenvolvido com Laravel.

## Funcionalidades

* Autenticação de usuários
* Criação de tarefas
* Listagem e visualização de tarefas
* Edição e atualização de tarefas
* Exclusão de tarefas
* Prioridades
* Data limite opcional
* Validação através de Form Requests
* Regras de negócio separadas em uma Business Layer
* Rotas protegidas por autenticação

## Tecnologias

* PHP
* Laravel
* Blade
* Bootstrap
* MySQL
* Composer
* DDEV

## Arquitetura

O projeto utiliza uma separação de responsabilidades entre Controllers, Form Requests, Business Layer, Models e Services.

```text
app/
├── Business/Task/
├── Http/
│   ├── Controllers/
│   └── Requests/
├── Models/
└── Services/
```

## Executando o projeto

```bash
git clone https://github.com/KauSR1/laravel-todo-list.git
cd laravel-todo-list

ddev start
ddev composer install
ddev artisan key:generate
ddev artisan migrate
```
