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
