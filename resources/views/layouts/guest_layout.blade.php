<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laravel Todo List</title>

    {{-- Bootstrap & FontAwesome CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
</head>
<body class="bg-light">

{{-- Renderiza apenas o conteúdo do login, sem sidebar --}}
@yield('content')

{{-- Bootstrap JS --}}
<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
