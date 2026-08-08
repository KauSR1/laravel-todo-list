@extends('layouts.main_layout')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <!-- Confirm Delete Card Styled Like Task Cards -->
                <div class="card border border-secondary border-opacity-25 bg-white p-5 text-center rounded-3 shadow-sm">
                    <div class="card-body p-0">

                        <!-- Warning Icon -->
                        <span class="display-4 mb-3 d-block">
                            <i class="fa-solid fa-triangle-exclamation text-warning opacity-75"></i>
                        </span>

                        <!-- Dynamic Task Title -->
                        <h4 class="h4 fw-bold text-dark mb-3">{{ $task['title'] }}</h4>

                        <!-- Description preview or confirmation prompt -->
                        <p class="text-secondary mb-4" style="font-size: 0.95rem;">
                            Are you sure you want to delete this task? This action cannot be undone.
                        </p>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <!-- No Button (Returns to Home) -->
                            <a href="{{ route('home') }}" class="btn btn-light border border-secondary border-opacity-25 px-4 py-2 fw-semibold text-dark shadow-sm">
                                <i class="fa-solid fa-xmark me-2"></i>No
                            </a>

                            <!-- Yes Button (Submits DELETE method with encrypted ID) -->
                            <form action="{{ route('deleteTask', ['id' => Crypt::encrypt($task['id'])]) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger px-4 py-2 fw-semibold shadow-sm">
                                    <i class="fa-solid fa-trash me-2"></i>Yes
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
