@extends('layouts.main_layout')
@section('content')

    <!-- Layout Dividido de Tela Cheia -->
    <div class="container-fluid min-vh-100 p-0">
        <div class="row g-0 min-vh-100">

            <!-- COLUNA ESQUERDA: Branding e Conceito (Escondida em mobile, destaque em desktop) -->
            <div
                class="col-lg-7 d-none d-lg-flex flex-column justify-content-between p-5 bg-dark text-white position-relative overflow-hidden">
                <!-- Elemento gráfico de fundo sutil (brilho moderno) -->
                <div
                    class="position-absolute top-0 start-0 translate-middle rounded-circle bg-primary opacity-10 blur-3xl"
                    style="width: 500px; height: 500px;"></div>
                <div
                    class="position-absolute bottom-0 end-0 translate-middle rounded-circle bg-info opacity-10 blur-3xl"
                    style="width: 400px; height: 400px;"></div>

                <!-- Topo da Esquerda: Logo / Nome -->
                <div class="z-1">
                    <div class="d-inline-flex align-items-center gap-2">
                        <div
                            class="bg-white text-dark rounded-2 p-1 d-flex align-items-center justify-content-center fw-bold"
                            style="width: 32px; height: 32px;">
                            N
                        </div>
                        <span class="fw-bold tracking-widest text-uppercase"
                              style="font-size: 0.85rem; letter-spacing: 0.25em;">Notes OS</span>
                    </div>
                </div>

                <!-- Centro da Esquerda: Frase de Impacto para Todo-List -->
                <div class="z-1 my-auto py-5" style="max-width: 500px;">
                    <span class="badge bg-white bg-opacity-10 text-light fw-normal px-3 py-2 rounded-pill mb-4"
                          style="font-size: 0.75rem; letter-spacing: 0.05em;">
                        ✨ Produtividade sem atritos
                    </span>
                    <h1 class="display-5 fw-bold text-white mb-3" style="letter-spacing: -0.02em; line-height: 1.2;">
                        Organize suas ideias. Conquiste seu dia.
                    </h1>
                    <p class="text-light text-opacity-75 lead fs-6 mb-0">
                        Um espaço minimalista e veloz para gerenciar suas tarefas, notas e objetivos diários sem
                        distrações.
                    </p>
                </div>

                <!-- Rodapé da Esquerda -->
                <div class="z-1 text-light text-opacity-50 small">
                    &copy; {{ date('Y') }} Notes Studio. Todos os direitos reservados.
                </div>
            </div>

            <!-- COLUNA DIREITA: O Formulário de Login (Minimalista e Focado) -->
            <div class="col-lg-5 d-flex align-items-center justify-content-center p-4 p-sm-5 bg-white">
                <div class="w-100" style="max-width: 400px;">

                    <!-- Cabeçalho Mobile (Aparece apenas em telas pequenas onde a coluna esquerda some) -->
                    <div class="d-lg-none mb-4 text-center">
                        <div
                            class="d-inline-flex align-items-center justify-content-center bg-dark text-white rounded-2 p-2 mb-2 fw-bold">
                            N
                        </div>
                        <h2 class="h5 fw-bold">Notes OS</h2>
                    </div>

                    <!-- Título de Boas-vindas -->
                    <div class="mb-4">
                        <h2 class="fw-bold text-dark fs-3 mb-1">Bem-vindo de volta</h2>
                        <p class="text-muted small">Digite suas credenciais para acessar sua conta.</p>
                    </div>

                    <!-- Formulário -->
                    <form action="{{route('login.store')}}" method="post" novalidate autocomplete="off">
                        @csrf

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="text_username" class="form-label text-dark small fw-semibold">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 text-muted ps-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.24C11.36 13.5 9.5 13 8 13s-3.36.5-4.168 1.756c-.678.254-.831.994-.832 1.24C3 16 18 16 18 16z"/>
                                    </svg>
                                </span>
                                <input type="text" class="form-control bg-light border-0 py-2.5 fs-6 shadow-none"
                                       id="text_username"
                                       name="text_username"
                                       value="{{ old('text_username') }}"
                                       placeholder="Seu username"
                                       required>
                            </div>

                            {{-- Erro de validação do text_username fora do input-group para não quebrar o layout --}}
                            @error('text_username')
                            <div class="text-danger small mt-2 fw-light">
                                ［ {{ $message }} ］
                            </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label for="text_password"
                                       class="form-label text-dark small fw-semibold mb-0">Password</label>
                                <!-- Link opcional para recuperar senha -->
                                <a href="#" class="small text-decoration-none text-muted hover-dark">Esqueceu?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 text-muted ps-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-lock" viewBox="0 0 16 16">
                                        <path
                                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </span>
                                <input type="text_password" class="form-control bg-light border-0 py-2.5 fs-6 shadow-none"
                                       id="text_password"
                                       name="text_password"
                                       placeholder="••••••••"
                                       required>
                            </div>

                            {{-- Erro de validação do text_password fora do input-group --}}
                            @error('text_password')
                            <div class="text-danger small mt-2 fw-light">
                                ［ {{ $message }} ］
                            </div>
                            @enderror
                        </div>

                        <!-- Botão de Ação -->
                        <div class="mb-3">
                            <button type="submit"
                                    class="btn btn-dark w-100 py-3 fw-semibold rounded-2 shadow-sm transition-all">
                                Acessar Plataforma
                            </button>
                        </div>

                        <!-- Link opcional para recuperar senha -->
                        <a href="{{Route('register')}}" class="small text-decoration-none text-muted hover-dark">
                            Cadastre-se! </a>
                    </form>

                    <!-- Rodapé visível apenas no mobile para fechar a estrutura -->
                    <div class="d-lg-none text-center text-muted mt-5 small">
                        &copy; 2026 Notes Studio
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Estilos de Refinamento -->
    <style>
        .hover-dark:hover {
            color: #000 !important;
        }

        .form-control:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 2px #000 !important;
        }

        .input-group:focus-within {
            box-shadow: 0 0 0 2px #000;
            border-radius: 0.375rem;
        }
    </style>
@endsection
