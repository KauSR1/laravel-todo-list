@extends('layouts.main_layout')
@section('content')

    <!-- Layout Principal do Home -->
    <div class="container-fluid min-vh-100 p-0 bg-light">
        <div class="row g-0 min-vh-100">

            <!-- COLUNA ESQUERDA: Menu Lateral / Branding (Desktop) -->
            <div class="col-lg-3 d-none d-lg-flex flex-column justify-content-between p-4 bg-dark text-white position-relative overflow-hidden border-end border-secondary">

                <!-- Topo: Logo / Nome -->
                <div class="z-1">
                    <div class="d-inline-flex align-items-center gap-2 mb-4">
                        <div class="bg-primary text-white rounded-2 p-2 d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 36px; height: 36px;">
                            <i class="fa-solid fa-check-double"></i>
                        </div>
                        <span class="fw-bold text-uppercase fs-6 tracking-wider text-white" style="letter-spacing: 0.15em;">Todo OS</span>
                    </div>

                    <!-- Perfil do Usuário na Sidebar -->
                    <div class="bg-secondary bg-opacity-25 p-3 rounded-3 d-flex align-items-center gap-3 border border-secondary border-opacity-50">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 42px; height: 42px;">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="overflow-hidden">
                            <span class="d-block text-light opacity-75 small text-uppercase fw-semibold" style="font-size: 0.7rem;">Logado como</span>
                            <strong class="text-white text-truncate d-block fs-6">{{ session('username', 'Usuário') }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Centro: Navegação / Ações Rápidas -->
                <div class="z-1 my-auto py-4">
                    <p class="text-uppercase text-light opacity-75 fw-bold mb-3" style="font-size: 0.75rem; letter-spacing: 0.1em;">Menu Principal</p>
                    <ul class="nav flex-column gap-2">
                        <li>
                            <a href="#" class="nav-link text-white bg-primary rounded-2 py-2 px-3 fw-semibold d-flex align-items-center gap-2 shadow-sm">
                                <i class="fa-solid fa-list-check"></i> Minhas Tarefas
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Rodapé da Esquerda: Logout -->
                <div class="z-1 pt-3 border-top border-secondary">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100 text-start fw-semibold py-2">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- COLUNA DIREITA: Conteúdo Principal (Tarefas) -->
            <div class="col-lg-9 d-flex flex-column p-4 p-sm-5 bg-white">

                <!-- Cabeçalho Superior Mobile/Desktop -->
                <div class="d-flex justify-content-between align-items-center pb-4 mb-4 border-bottom border-2">
                    <div class="d-lg-none d-flex align-items-center gap-2">
                        <div class="bg-dark text-white rounded-2 p-2 d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">
                            <i class="fa-solid fa-check-double"></i>
                        </div>
                        <h2 class="h6 fw-bold mb-0">Todo OS</h2>
                    </div>
                    <div class="d-none d-lg-block">
                        <h1 class="h3 fw-bold text-dark mb-1">Painel de Tarefas</h1>
                        <p class="text-secondary fw-medium small mb-0">Gerencie seu dia a dia com rapidez e organização.</p>
                    </div>

                    <!-- Botão Nova Tarefa (Topo) -->
                    <div>
                        <a href="#" class="btn btn-primary px-4 py-2 fw-semibold rounded-2 shadow-sm d-inline-flex align-items-center gap-2">
                            <i class="fa-solid fa-plus"></i> Nova Tarefa
                        </a>
                    </div>
                </div>

                <!-- CONDIÇÃO 2: Tarefas disponíveis (Grid de Cards / Listagem) -->
                <div class="row g-4">

                    <!-- Exemplo de Card de Tarefa Pendente -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card h-100 border border-secondary border-opacity-25 bg-white p-4 rounded-3 position-relative transition-all hover-shadow shadow-sm">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-start gap-2">
                                    <!-- Checkbox para concluir tarefa -->
                                    <input class="form-check-input mt-1 cursor-pointer border-secondary" type="checkbox" value="" id="taskCheck1" style="width: 1.25em; height: 1.25em;">
                                    <div>
                                        <span class="badge bg-warning text-dark fw-bold mb-2 px-2 py-1" style="font-size: 0.75rem;">Trabalho</span>
                                        <h4 class="h5 fw-bold text-dark text-truncate mb-0" style="max-width: 180px;">Finalizar relatório</h4>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link text-dark p-0 text-decoration-none shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border shadow">
                                        <li><a class="dropdown-item py-2 fw-medium" href="#"><i class="fa-regular fa-pen-to-square me-2 text-primary"></i>Editar</a></li>
                                        <li><a class="dropdown-item py-2 text-danger fw-medium" href="#"><i class="fa-regular fa-trash-can me-2"></i>Excluir</a></li>
                                    </ul>
                                </div>
                            </div>

                            <p class="text-secondary mb-4 flex-grow-1" style="font-size: 0.9rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                Organizar os dados mensais de vendas e enviar para o setor financeiro analisar os resultados obtidos.
                            </p>

                            <div class="d-flex align-items-center justify-content-between pt-3 border-top border-secondary border-opacity-25 text-dark fw-semibold" style="font-size: 0.8rem;">
                                <span><i class="fa-regular fa-clock me-1 text-muted"></i> Prazo: 10/08/2026</span>
                            </div>
                        </div>
                    </div>
                    <!-- Fim do Card Exemplo -->

                </div>

                <!-- Rodapé da Direita -->
                <div class="mt-auto pt-5 text-center text-secondary fw-medium small">
                    &copy; {{ date('Y') }} Todo Studio. Todos os direitos reservados.
                </div>

            </div>

        </div>
    </div>

    <!-- Estilos de Refinamento -->
    <style>
        .hover-shadow:hover {
            transform: translateY(-2px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.1) !important;
            transition: all 0.2s ease-in-out;
        }
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@endsection
