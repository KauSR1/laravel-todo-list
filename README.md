# Sistema de Controle de Tarefas Pessoais

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![DDEV](https://img.shields.io/badge/DDEV-DE3A5D?style=flat&logo=docker&logoColor=white)](https://ddev.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](#licença)

Aplicação web para gerenciamento de tarefas pessoais, desenvolvida com Laravel, com foco em organização de responsabilidades, separação de regras de negócio e manutenção do código.

---

## Sumário

- [Sobre o projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Stack](#stack)
- [Arquitetura](#arquitetura)
  - [Responsabilidades por camada](#responsabilidades-por-camada)
  - [Fluxo da aplicação](#fluxo-da-aplicação)
  - [Decisões de design](#decisões-de-design)
- [Modelo de dados](#modelo-de-dados)
- [Requisitos](#requisitos)
- [Instalação](#instalação)
- [Configuração de ambiente](#configuração-de-ambiente)
- [Comandos úteis](#comandos-úteis)
- [Testes](#testes)
- [Padrões de código](#padrões-de-código)
- [Segurança](#segurança)
- [Contribuindo](#contribuindo)
- [Roadmap / Próximas evoluções](#próximas-evoluções)
- [FAQ](#faq)
- [Objetivo técnico](#objetivo-técnico)
- [Licença](#licença)
- [Autor](#autor)

---

## Sobre o projeto

O projeto implementa um fluxo completo de gerenciamento de tarefas autenticadas, permitindo que cada usuário crie, consulte, atualize e remova suas próprias tarefas.

Além das operações básicas de CRUD, a aplicação possui validação de entrada por meio de Form Requests e uma camada dedicada às regras de negócio, evitando concentrar responsabilidades nos Controllers. A proposta central é aplicar, em um projeto de escopo enxuto, práticas de organização de código normalmente vistas em aplicações de maior porte: separação de camadas, isolamento de regras de domínio e previsibilidade no fluxo de dados entre requisição e persistência.

## Funcionalidades

| Funcionalidade | Descrição |
|---|---|
| Autenticação de usuários | Cadastro, login e sessão autenticada via Laravel |
| Criação de tarefas | Cada usuário cria tarefas vinculadas à sua própria conta |
| Listagem de tarefas | Exibição das tarefas do usuário autenticado |
| Visualização de tarefas | Detalhamento individual de cada tarefa |
| Edição e atualização | Atualização dos dados de uma tarefa existente |
| Exclusão de tarefas | Remoção de tarefas pertencentes ao usuário |
| Prioridade | Classificação da tarefa por nível de prioridade |
| Data limite opcional | Campo opcional de prazo para conclusão |
| Validação com Form Requests | Regras de validação isoladas da lógica de negócio |
| Business Layer | Regras de domínio centralizadas fora dos Controllers |
| Rotas protegidas | Acesso condicionado à autenticação do usuário |

## Stack

**Backend**
- PHP
- Laravel

**Frontend**
- Blade
- Bootstrap

**Banco de dados**
- MySQL

**Ferramental / Ambiente**
- Composer
- DDEV (ambiente de desenvolvimento containerizado, baseado em Docker)

## Arquitetura

A aplicação utiliza uma separação de responsabilidades entre as principais camadas do domínio e da aplicação, evitando o padrão de Controllers "gordos" comum em projetos que crescem sem uma estrutura definida.

```text
app/
├── Business/
│   └── Task/          # Regras de negócio do domínio de tarefas
├── Http/
│   ├── Controllers/    # Orquestração das requisições HTTP
│   └── Requests/       # Validação e autorização de entrada
├── Models/              # Entidades persistidas (Eloquent)
└── Services/            # Comportamentos reutilizáveis e transversais
```

### Responsabilidades por camada

**Controllers**
Responsáveis por receber as requisições HTTP, coordenar o fluxo da aplicação e retornar as respostas apropriadas. Não concentram regras de negócio — atuam como um ponto de orquestração entre a requisição, a validação, a camada de negócio e a resposta.

**Form Requests**
Responsáveis pela validação e autorização das entradas recebidas pela aplicação antes que elas cheguem à lógica de negócio. Isolam as regras de "o dado está bem formado e o usuário pode enviá-lo" da lógica de "o que fazer com esse dado".

**Business Layer**
Concentra regras específicas do domínio de tarefas (ex.: regras de prioridade, validações de negócio, condições para edição/exclusão), mantendo essas decisões fora da camada HTTP e dos Models. Isso facilita reuso, testes unitários isolados e evolução das regras sem impacto direto nos Controllers.

**Models**
Representam as entidades persistidas no banco de dados e centralizam o mapeamento entre a aplicação e o armazenamento (Eloquent ORM), incluindo relacionamentos e casts de atributos.

**Services**
Agrupam operações ou comportamentos reutilizáveis que não pertencem diretamente a uma única responsabilidade de Controller ou Model — por exemplo, integrações ou rotinas auxiliares compartilhadas entre diferentes fluxos da aplicação.

Essa divisão busca reduzir acoplamento, facilitar testes e tornar a evolução do projeto mais previsível.

### Fluxo da aplicação

De forma simplificada, uma requisição segue o seguinte fluxo:

```text
HTTP Request
     │
     ▼
Controller
     │
     ▼
Form Request
     │
     ▼
Business Layer / Service
     │
     ▼
Model
     │
     ▼
MySQL
```

O objetivo dessa organização é manter cada camada responsável por um tipo específico de problema, evitando Controllers excessivamente grandes e regras de negócio espalhadas pela aplicação.

### Decisões de design

- **Separação de validação e negócio**: Form Requests tratam apenas de formato/autorização de entrada; a Business Layer trata de regras de domínio. Isso evita que validações simples (campo obrigatório, tipo, tamanho) se misturem com decisões de negócio (ex.: uma tarefa vencida não pode ser marcada como "em andamento").
- **Isolamento por usuário**: todas as operações de tarefas são escopadas ao usuário autenticado, prevenindo acesso cruzado entre contas.
- **Baixo acoplamento entre camadas**: cada camada depende apenas do que precisa da camada anterior, facilitando substituição ou testes isolados (ex.: testar a Business Layer sem subir o stack HTTP completo).

## Modelo de dados

Estrutura simplificada das principais entidades da aplicação:

```text
users
├── id
├── name
├── email
└── password

tasks
├── id
├── user_id (FK -> users.id, nullable)
├── title
├── description
├── priority          # 0 = Pending, 1 = Overdue, 2 = Complete
├── date_limited       # prazo opcional
├── completed_at
├── created_at
├── updated_at
└── deleted_at         # soft delete
```

> Não há uma coluna `status` separada: o estado da tarefa é derivado do campo `priority` através do accessor `getPriorityLabelAttribute()` no Model. A estrutura exata pode ser conferida em `database/migrations`.

## Requisitos

Antes de executar o projeto, certifique-se de possuir:

- [Git](https://git-scm.com/)
- [Docker](https://www.docker.com/)
- [DDEV](https://ddev.com/get-started/)

O PHP e o Composer são executados por meio do ambiente configurado pelo DDEV, portanto não é necessário instalá-los localmente.

## Instalação

Clone o repositório:

```bash
git clone https://github.com/KauSR1/laravel-todo-list.git
cd laravel-todo-list
```

Inicie o ambiente:

```bash
ddev start
```

Instale as dependências:

```bash
ddev composer install
```

Copie o arquivo de variáveis de ambiente (caso ainda não exista):

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
ddev artisan key:generate
```

Execute as migrations:

```bash
ddev artisan migrate
```

*(Opcional)* Popule o banco com dados de teste, caso existam seeders configurados:

```bash
ddev artisan db:seed
```

Após esses passos, a aplicação estará disponível no endereço exibido por:

```bash
ddev describe
```

## Configuração de ambiente

As principais variáveis relevantes para o funcionamento local ficam no arquivo `.env`, gerenciado automaticamente pelo DDEV para o ambiente de banco de dados. Pontos de atenção:

| Variável | Descrição |
|---|---|
| `APP_ENV` | Ambiente de execução (`local`, `production`, etc.) |
| `APP_KEY` | Gerada via `ddev artisan key:generate` |
| `DB_CONNECTION` | Driver do banco (padrão: `mysql`) |
| `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` | Configurados automaticamente pelo DDEV |

## Comandos úteis

Iniciar o ambiente:

```bash
ddev start
```

Parar o ambiente:

```bash
ddev stop
```

Executar comandos Artisan:

```bash
ddev artisan <comando>
```

Executar comandos Composer:

```bash
ddev composer <comando>
```

Executar migrations:

```bash
ddev artisan migrate
```

Acessar o shell do container:

```bash
ddev ssh
```

Ver logs da aplicação:

```bash
ddev logs
```

## Testes

*(Seção preparada para quando os testes automatizados forem implementados — ver [Roadmap](#próximas-evoluções))*

Estrutura sugerida:

```bash
ddev artisan test
```

Recomenda-se cobrir prioritariamente:

- Regras da Business Layer (testes unitários)
- Fluxos de autenticação e autorização (testes de feature)
- Isolamento de dados entre usuários (garantir que um usuário não acesse tarefas de outro)

## Padrões de código

- Convenções padrão do Laravel para nomenclatura de Controllers, Models e Requests.
- Regras de negócio não devem ser escritas diretamente em Controllers ou Models — devem residir na Business Layer.
- Form Requests para toda entrada de dados vinda de formulários ou requisições HTTP.
- Sugestão de uso do [Laravel Pint](https://laravel.com/docs/pint) para padronização automática de estilo de código:

```bash
ddev exec ./vendor/bin/pint
```

## Segurança

- Todas as rotas de manipulação de tarefas exigem autenticação (middleware `UserIsLogged`).
- Os IDs de tarefa trafegam criptografados na URL (`App\Services\Decrypt`), o que dificulta a enumeração direta.
- Senhas são armazenadas utilizando o hashing padrão do Laravel.
- Caso identifique uma vulnerabilidade, evite abrir uma issue pública — entre em contato diretamente com o mantenedor do repositório.

> ⚠️ **Limitação conhecida:** existe uma `TaskPolicy` que define corretamente as regras de posse (`$user->id === $task->user_id`), mas ela ainda **não está sendo aplicada** nos Controllers/Business Layer. Os métodos de edição, conclusão e exclusão de tarefas (`UpdateTaskBusiness`, `CompleteTaskBusiness`, `DeleteTaskBusiness`, e os métodos `edit`/`confirmDelete` do `TaskController`) buscam a tarefa apenas por ID, sem checar se ela pertence ao usuário autenticado. Isso caracteriza um risco de **IDOR** (acesso indevido a tarefas de outros usuários caso o ID seja descoberto).

## Contribuindo

Contribuições são bem-vindas. Sugestão de fluxo:

1. Faça um fork do repositório
2. Crie uma branch a partir da `main`: `git checkout -b feature/nome-da-feature`
3. Implemente a alteração, seguindo os [padrões de código](#padrões-de-código)
4. Garanta que a aplicação continua rodando corretamente via `ddev`
5. Abra um Pull Request descrevendo a motivação e o escopo da mudança

## FAQ

**Preciso ter PHP instalado localmente?**
Não. O PHP e o Composer rodam dentro do ambiente gerenciado pelo DDEV.

**Como resetar o banco de dados local?**
Execute `ddev artisan migrate:fresh` (e `--seed`, se houver seeders configurados).

**A aplicação possui API?**
Ainda não. Está prevista no [roadmap](#próximas-evoluções) do projeto.

## Objetivo técnico

O projeto serve também como exercício prático de desenvolvimento backend com Laravel, com ênfase em organização de código, separação de responsabilidades, validação de dados e aplicação de regras de negócio fora da camada HTTP. A escolha por uma Business Layer explícita, mesmo em um domínio relativamente simples, busca demonstrar a aplicação de princípios de arquitetura que se tornam essenciais à medida que um sistema cresce em complexidade.

## Licença

Este projeto está sob a licença MIT. Consulte o arquivo `LICENSE` para mais detalhes.

## Autor

Desenvolvido por [KauSR1](https://github.com/KauSR1).
