@extends('layouts.main_layout')
@section('content')

    <div class="container py-5 min-vh-100 d-flex flex-column justify-content-between">

        <!-- Top Section -->
        <div>
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div>
                    <h1 class="h4 fw-bold text-dark mb-1">Task List</h1>
                    <p class="text-muted small mb-0">Manage your daily tasks quickly and efficiently.</p>
                </div>
                <a href="{{ route('newTask') }}"
                   class="btn btn-dark btn-sm px-3 py-2 fw-semibold rounded-2 shadow-sm d-inline-flex align-items-center gap-2">
                    <i class="fa-solid fa-plus"></i> New Task
                </a>
            </div>

            <!-- Tasks Container -->
            <div class="bg-white border rounded-4 p-4 shadow-sm">

                <!-- Filters & Total Header -->
                <div
                    class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4 pb-3 border-bottom">
                    <span class="text-secondary small fw-medium">Total: {{ count($tasks) }} task(s)</span>

                    <!-- Filters (All, Open, Completed) -->
                    <div class="d-flex gap-2">
                        <a href="{{ route('home', ['filter' => 'all']) }}"
                           class="btn btn-{{ request('filter', 'all') == 'all' ? 'dark' : 'outline-secondary bg-light text-dark border-0' }} btn-sm px-3 py-1.5 fw-semibold rounded-pill shadow-sm">
                            All
                        </a>
                        <a href="{{ route('home', ['filter' => 'pending']) }}"
                           class="btn btn-{{ request('filter') == 'pending' ? 'dark' : 'outline-secondary bg-light text-dark border-0' }} btn-sm px-3 py-1.5 fw-semibold rounded-pill shadow-sm">
                            pending
                        </a>
                        <a href="{{ route('home', ['filter' => 'completed']) }}"
                           class="btn btn-{{ request('filter') == 'completed' ? 'dark' : 'outline-secondary bg-light text-dark border-0' }} btn-sm px-3 py-1.5 fw-semibold rounded-pill shadow-sm">
                            Completed
                        </a>
                    </div>
                </div>

                <!-- Tasks Grid / Empty State -->
                @if(count($tasks) > 0)
                    <div class="row g-3">
                        @foreach($tasks as $task)
                            @include('task.task')
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5 text-muted small">
                        <i class="fa-solid fa-clipboard-list fa-2x mb-2 text-black-50"></i>
                        <p class="mb-0">No tasks found in this filter.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 text-center text-muted small">
            &copy; {{ date('Y') }} Todo Studio. All rights reserved.
        </footer>

    </div>

    <!-- Refinement Styles -->
    <style>
        .hover-shadow:hover {
            transform: translateY(-2px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .05) !important;
            transition: all 0.2s ease-in-out;
        }
    </style>

@endsection
