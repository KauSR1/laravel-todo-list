@extends('layouts.guest_layout')
@section('content')

    <!-- Full Screen Split Layout -->
    <div class="container-fluid min-vh-100 p-0">
        <div class="row g-0 min-vh-100">

            <!-- LEFT COLUMN: Branding & Concept (Identical to login to maintain consistency) -->
            <div class="col-lg-7 d-none d-lg-flex flex-column justify-content-between p-5 bg-dark text-white position-relative overflow-hidden border-end border-secondary">

                <!-- Subtle background graphic elements (modern glow) -->
                <div class="position-absolute top-0 start-0 translate-middle rounded-circle bg-primary opacity-10 blur-3xl" style="width: 500px; height: 500px;"></div>
                <div class="position-absolute bottom-0 end-0 translate-middle rounded-circle bg-info opacity-10 blur-3xl" style="width: 400px; height: 400px;"></div>

                <!-- Left Top: Logo / Name -->
                <div class="z-1">
                    <div class="d-inline-flex align-items-center gap-2">
                        <div class="bg-primary text-white rounded-2 p-2 d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 36px; height: 36px;">
                            <i class="fa-solid fa-check-double"></i>
                        </div>
                        <span class="fw-bold tracking-widest text-uppercase text-white" style="font-size: 0.85rem; letter-spacing: 0.25em;">Todo OS</span>
                    </div>
                </div>

                <!-- Left Center: Impact Statement for Account Creation -->
                <div class="z-1 my-auto py-5" style="max-width: 500px;">
                    <span class="badge bg-primary text-white fw-semibold px-3 py-2 rounded-pill mb-4 shadow-sm" style="font-size: 0.75rem; letter-spacing: 0.05em;">
                        🚀 Start for free
                    </span>
                    <h1 class="display-5 fw-bold text-white mb-3" style="letter-spacing: -0.02em; line-height: 1.2;">
                        Transform chaos into completed tasks.
                    </h1>
                    <p class="text-light text-opacity-75 lead fs-6 mb-0 fw-medium">
                        Create your account in seconds and gain full control over your notes, ideas, and daily projects in one place.
                    </p>
                </div>

                <!-- Left Footer -->
                <div class="z-1 text-light text-opacity-75 small fw-medium">
                    &copy; {{ date('Y') }} Todo Studio. All rights reserved.
                </div>
            </div>

            <!-- RIGHT COLUMN: The Registration Form (Minimalist and Focused) -->
            <div class="col-lg-5 d-flex align-items-center justify-content-center p-4 p-sm-5 bg-white">
                <div class="w-100" style="max-width: 400px;">

                    <!-- Mobile Header (Appears only on small screens) -->
                    <div class="d-lg-none mb-4 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-dark text-white rounded-2 p-2 mb-2 fw-bold shadow-sm" style="width: 36px; height: 36px;">
                            <i class="fa-solid fa-check-double"></i>
                        </div>
                        <h2 class="h5 fw-bold">Todo OS</h2>
                    </div>

                    <!-- Welcome Title -->
                    <div class="mb-4">
                        <h2 class="fw-bold text-dark fs-3 mb-1">Create an account</h2>
                        <p class="text-secondary fw-medium small">Fill in the details below to get started.</p>
                    </div>

                    <!-- Registration Form -->
                    <form action="{{ route('register.store') }}" method="post" novalidate autocomplete="off">
                        @csrf

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="text_username" class="form-label text-dark small fw-semibold">Username</label>
                            <div class="input-group border border-secondary border-opacity-25 rounded-2 bg-light">
                                <span class="input-group-text bg-transparent border-0 text-secondary ps-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.24C11.36 13.5 9.5 13 8 13s-3.36.5-4.168 1.756c-.678.254-.831.994-.832 1.24C3 16 18 16 18 16z"/>
                                    </svg>
                                </span>
                                <input type="text" class="form-control bg-transparent border-0 py-2.5 fs-6 shadow-none text-dark"
                                       id="text_username"
                                       name="text_username"
                                       value="{{ old('text_username') }}"
                                       placeholder="Enter your username"
                                       required>
                            </div>

                            @error('text_username')
                            <div class="text-danger small mt-2 fw-medium">
                                ［ {{ $message }} ］
                            </div>
                            @enderror
                        </div>

                        <!-- E-mail -->
                        <div class="mb-3">
                            <label for="text_email" class="form-label text-dark small fw-semibold">E-mail</label>
                            <div class="input-group border border-secondary border-opacity-25 rounded-2 bg-light">
                                <span class="input-group-text bg-transparent border-0 text-secondary ps-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </span>
                                <input type="email" class="form-control bg-transparent border-0 py-2.5 fs-6 shadow-none text-dark"
                                       id="text_email"
                                       name="text_email"
                                       value="{{ old('text_email') }}"
                                       placeholder="your@email.com"
                                       required>
                            </div>

                            @error('text_email')
                            <div class="text-danger small mt-2 fw-medium">
                                ［ {{ $message }} ］
                            </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="text_password" class="form-label text-dark small fw-semibold">Password</label>
                            <div class="input-group border border-secondary border-opacity-25 rounded-2 bg-light">
                                <span class="input-group-text bg-transparent border-0 text-secondary ps-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </span>
                                <input type="password" class="form-control bg-transparent border-0 py-2.5 fs-6 shadow-none text-dark"
                                       id="text_password"
                                       name="text_password"
                                       placeholder="••••••••"
                                       required>
                            </div>

                            @error('text_password')
                            <div class="text-danger small mt-2 fw-medium">
                                ［ {{ $message }} ］
                            </div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="text_password_confirmation" class="form-label text-dark small fw-semibold">Confirm Password</label>
                            <div class="input-group border border-secondary border-opacity-25 rounded-2 bg-light">
                                <span class="input-group-text bg-transparent border-0 text-secondary ps-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.838.858.75.75 0 0 0-.5.742v5.681c0 4.145 2.508 7.94 6.06 9.05a1.5 1.5 0 0 0 .876 0c3.552-1.11 6.06-4.905 6.06-9.05V3.19a.75.75 0 0 0-.5-.742 61.411 61.411 0 0 0-2.838-.858.75.75 0 0 0-.928.36c-.34.78-.85 1.516-1.5 2.158A54.728 54.728 0 0 1 8 5.5c-1.255 0-2.443-.29-3.5-.832A54.64 54.64 0 0 1 3.012 1.95a.75.75 0 0 0-.928-.36zM8 4.5c.983 0 1.93.18 2.812.507-.336.568-.793 1.09-1.342 1.545A46.735 46.735 0 0 1 8 6.5a46.726 46.726 0 0 1-1.47-.05c-.55-.455-1.006-.977-1.342-1.545A8.347 8.347 0 0 1 8 4.5zM2.5 3.99c.64-.176 1.332-.34 2.05-.486.292.658.7 1.282 1.206 1.834-.844.336-1.637.76-2.356 1.258V4.022l.1-.033zm11 0v2.552c-.719-.498-1.512-.922-2.356-1.258.506-.552.914-1.176 1.206-1.834.718.146 1.41.31 2.05.486l.1.033z"/>
                                    </svg>
                                </span>
                                <input type="password" class="form-control bg-transparent border-0 py-2.5 fs-6 shadow-none text-dark"
                                       id="text_password_confirmation"
                                       name="text_password_confirmation"
                                       placeholder="••••••••"
                                       required>
                            </div>

                            @error('text_password_confirmation')
                            <div class="text-danger small mt-2 fw-medium">
                                ［ {{ $message }} ］
                            </div>
                            @enderror
                        </div>

                        <!-- Action Button -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark w-100 py-3 fw-semibold rounded-2 shadow-sm transition-all">
                                Create Account
                            </button>
                        </div>

                        <!-- Link back to Login -->
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="small text-decoration-none text-secondary fw-semibold hover-dark">
                                Already have an account? <span class="text-dark fw-bold">Sign in</span>
                            </a>
                        </div>
                    </form>

                    <!-- Mobile Footer -->
                    <div class="d-lg-none text-center text-secondary fw-medium mt-5 small">
                        &copy; {{ date('Y') }} Todo Studio
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Refinement Styles -->
    <style>
        .hover-dark:hover {
            color: #000 !important;
        }

        .input-group:focus-within {
            border-color: #000 !important;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.15) !important;
            background-color: #fff !important;
        }

        .input-group:focus-within input {
            background-color: #fff !important;
        }
    </style>
@endsection
