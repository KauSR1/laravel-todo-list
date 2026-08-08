@extends('layouts.main_layout')
@section('content')

    <!-- Main Home Layout -->
    <div class="container-fluid min-vh-100 p-0 bg-light">
        <div class="row g-0 min-vh-100">

            <!-- RIGHT COLUMN: Main Content (Tasks) -->
            <div class="col-lg-12 d-flex flex-column p-4 p-sm-5 bg-white">

                <!-- Mobile/Desktop Top Header -->
                <div class="d-flex justify-content-between align-items-center pb-4 mb-4 border-bottom border-2">
                    <div class="d-lg-none d-flex align-items-center gap-2">
                        <div
                            class="bg-dark text-white rounded-2 p-2 d-flex align-items-center justify-content-center fw-bold"
                            style="width: 32px; height: 32px;">
                            <i class="fa-solid fa-check-double"></i>
                        </div>
                        <h2 class="h6 fw-bold mb-0">Todo OS</h2>
                    </div>
                    <div class="d-none d-lg-block">
                        <h1 class="h3 fw-bold text-dark mb-1">Task Dashboard</h1>
                        <p class="text-secondary fw-medium small mb-0">Manage your daily tasks quickly and
                            organized.</p>
                    </div>

                    <!-- New Task Button (Top) -->
                    <div>
                        <a href="{{ route('newTask') }}"
                           class="btn btn-primary px-4 py-2 fw-semibold rounded-2 shadow-sm d-inline-flex align-items-center gap-2">
                            <i class="fa-solid fa-plus"></i> New Task
                        </a>
                    </div>
                </div>

                <!-- Tasks Grid -->
                <div class="row g-4">

                    @foreach($tasks as $task)
                        @include('task.task')
                    @endforeach

                </div>

                <!-- Right Footer -->
                <div class="mt-auto pt-5 text-center text-secondary fw-medium small">
                    &copy; {{ date('Y') }} Todo Studio. All rights reserved.
                </div>

            </div>

        </div>
    </div>

    <!-- Refinement Styles -->
    <style>
        .hover-shadow:hover {
            transform: translateY(-2px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .08) !important;
            border-color: rgba(var(--bs-primary-rgb), 0.4) !important;
            transition: all 0.2s ease-in-out;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        #sidebar.collapsed .logout-btn {
            justify-content: center !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

    </style>
@endsection
