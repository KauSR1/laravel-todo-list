<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Todo List</title>

    {{-- Bootstrap & FontAwesome CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        /* Sidebar layout styling */
        #sidebar {
            min-width: 260px;
            max-width: 260px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Collapsed state adjustments */
        #sidebar.collapsed {
            min-width: 76px;
            max-width: 76px;
        }

        #sidebar.collapsed .sidebar-text,
        #sidebar.collapsed .user-profile-name,
        #sidebar.collapsed .menu-title {
            display: none !important;
        }

        #sidebar.collapsed .sidebar-brand {
            justify-content: center !important;
            width: 100%;
        }

        #sidebar.collapsed .user-profile {
            justify-content: center !important;
            padding: 0.5rem !important;
        }

        #sidebar.collapsed .nav-link,
        #sidebar.collapsed button[type="submit"] {
            justify-content: center !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        #content {
            width: 100%;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

<div class="d-flex">
    {{-- Include the Left Sidebar Component --}}
    @include('layouts.left_bar')

    {{-- Main Content Area --}}
    <div id="content" class="p-4">

        {{-- Alertas de Feedback da Sessão (Sucesso / Erro) --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert"
                 style="border-radius: 0; font-size: 0.85rem;">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert"
                 style="border-radius: 0; font-size: 0.85rem;">
                <i class="fa-solid fa-triangle-exclamation me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Conteúdo dinâmico das views --}}
        @yield('content')
    </div>
</div>

{{-- Sidebar Toggle Script --}}
<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });
</script>

{{-- Bootstrap JS --}}
<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
