@extends('layouts.main_layout')
@section('content')

    <!-- Main Form Layout -->
    <div class="container-fluid min-vh-100 p-0" style="background-color: #f7f6f2;">
        <div class="row g-0 min-vh-100">

            <!-- RIGHT COLUMN: Main Content (New Task Form) -->
            <div class="col d-flex flex-column p-4 p-sm-5 bg-white" style="border-left: 1px solid #e5e3dd;">

                <!-- Header with Close Button -->
                <div class="d-flex justify-content-between align-items-center pb-4 mb-4" style="border-bottom: 1px solid #f0eee9;">
                    <h2 class="h5 mb-0 fw-normal tracking-oriental text-uppercase" style="color: #1a1a1a; font-size: 0.9rem;">
                        ［ Edit Task ］
                    </h2>
                    {{-- Cancel and return to Home --}}
                    <a href="{{ route('home') }}" class="btn btn-oriental-danger px-3 py-1 text-decoration-none" title="Cancel">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>

                <!-- Stylized Separator -->
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1" style="border-top: 1px dashed #e5e3dd;" aria-hidden="true"></div>
                    <span class="mx-3 text-muted" style="font-size: 0.65rem; letter-spacing: 0.3em;">NEW ENTRY</span>
                    <div class="flex-grow-1" style="border-top: 1px dashed #e5e3dd;" aria-hidden="true"></div>
                </div>

                <!-- Form Card -->
                <div class="p-4 p-md-5 bg-white mb-4" style="border: 1px solid #e5e3dd;">

                    <!-- Task Update Form -->
                    <form action="{{ route('editTasksSubmit', ['id' => Crypt::encrypt($task['id'])]) }}" method="post">
                        @csrf

                        {{-- Campo oculto essencial para o Controller receber via $request->task_id --}}
                        <input type="hidden" name="task_id" value="{{ Crypt::encrypt($task['id']) }}">

                        <!-- Field: Title -->
                        <div class="mb-4">
                            <label class="form-label text-muted small text-uppercase tracking-oriental" style="font-size: 0.65rem;">
                                Task Title
                            </label>
                            <input type="text"
                                   class="form-control input-oriental"
                                   name="text_title"
                                   value="{{ old('text_title', $task['title']) }}"
                                   placeholder="Enter task title..."
                                   required>

                            @error('text_title')
                            <div class="text-oriental-error small mt-2 fw-light" style="color: #c93b2b;">
                                ［ {{ $message }} ］
                            </div>
                            @enderror
                        </div>

                        <!-- Field: Content / Description -->
                        <div class="mb-4">
                            <label class="form-label text-muted small text-uppercase tracking-oriental" style="font-size: 0.65rem;">
                                Task Content
                            </label>
                            <textarea class="form-control input-oriental"
                                      name="text_note"
                                      rows="4"
                                      placeholder="Write your task description here..."
                                      required>{{ old('text_note', $task['description']) }}</textarea>

                            @error('text_note')
                            <div class="text-oriental-error small mt-2 fw-light" style="color: #c93b2b;">
                                ［ {{ $message }} ］
                            </div>
                            @enderror
                        </div>

                        <!-- Row with Priority and Limit Date -->
                        <div class="row mb-4">
                            <!-- Field: Priority -->
                            <div class="col-md-6 mb-4 mb-md-0">
                                <label class="form-label text-muted small text-uppercase tracking-oriental" style="font-size: 0.65rem;">
                                    Priority
                                </label>
                                {{-- Corrigido de <span> para <select> para que as options funcionem --}}
                                <select class="form-control input-oriental" name="priority">
                                    <option value="0" {{ (old('priority', $task['priority'] ?? 0) == 0) ? 'selected' : '' }}>Pending</option>
                                </select>

                                @error('priority')
                                <div class="text-oriental-error small mt-2 fw-light" style="color: #c93b2b;">
                                    ［ {{ $message }} ］
                                </div>
                                @enderror
                            </div>

                            <!-- Field: Limit Date -->
                            <div class="col-md-6">
                                <label class="form-label text-muted small text-uppercase tracking-oriental" style="font-size: 0.65rem;">
                                    Limit Date
                                </label>
                                <input type="date"
                                       class="form-control input-oriental"
                                       name="date_limited"
                                       value="{{ old('date_limited', $task['date_limited']) }}">

                                @error('date_limited')
                                <div class="text-oriental-error small mt-2 fw-light" style="color: #c93b2b;">
                                    ［ {{ $message }} ］
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-2 pt-3" style="border-top: 1px dashed #f0eee9;">
                            <a href="{{ route('home') }}" class="btn btn-oriental-outline py-2 px-4 text-uppercase text-decoration-none">
                                <i class="fa-solid fa-ban me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-oriental-dark py-2 px-4 text-uppercase fw-bold">
                                <i class="fa-regular fa-circle-check me-2"></i>Edit Entry
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right Footer -->
                <div class="mt-auto pt-5 d-flex justify-content-between text-muted" style="font-size: 0.65rem; border-top: 1px dashed #e5e3dd;">
                    <span class="tracking-oriental">&copy; {{ date('Y') }} TODO STUDIO</span>
                    <span style="font-family: monospace;">STAY MINIMAL</span>
                </div>

            </div>

        </div>
    </div>

    <!-- Custom CSS Styles for Inputs and Buttons -->
    <style>
        .tracking-oriental {
            letter-spacing: 0.15em;
        }

        /* Stylized Inputs */
        .input-oriental {
            background-color: #faf9f6 !important;
            border: 1px solid #e5e3dd !important;
            border-radius: 0 !important;
            color: #1a1a1a !important;
            font-size: 0.85rem;
            padding: 0.75rem 1rem;
            transition: all 0.25s ease;
        }
        .input-oriental:focus {
            background-color: #ffffff !important;
            border-color: #1a1a1a !important;
            box-shadow: none !important;
        }
        .input-oriental::placeholder {
            color: #b5b3ac;
            font-size: 0.8rem;
        }

        /* Primary Button (Save) */
        .btn-oriental-dark {
            background-color: #1a1a1a;
            color: #ffffff;
            border: 1px solid #1a1a1a;
            border-radius: 0;
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            transition: all 0.25s ease;
        }
        .btn-oriental-dark:hover {
            background-color: #ffffff;
            color: #1a1a1a;
            border-color: #1a1a1a;
        }

        /* Secondary Button (Cancel) */
        .btn-oriental-outline {
            background-color: transparent;
            color: #555554;
            border: 1px solid #dcdad4;
            border-radius: 0;
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            transition: all 0.25s ease;
        }
        .btn-oriental-outline:hover {
            background-color: #1a1a1a;
            color: #ffffff;
            border-color: #1a1a1a;
        }

        /* Close Button (X) */
        .btn-oriental-danger {
            background-color: transparent;
            color: #c93b2b;
            border: 1px solid #f2dedc;
            border-radius: 0;
            font-size: 0.7rem;
            transition: all 0.25s ease;
        }
        .btn-oriental-danger:hover {
            background-color: #c93b2b;
            color: #ffffff;
            border-color: #c93b2b;
        }
    </style>
@endsection
