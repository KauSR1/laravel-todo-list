<!-- Dynamic Task Card (Clean & Permission-Ready) -->
<div class="col-md-6 col-xl-4">
    <div class="card h-100 border border-secondary border-opacity-25 bg-white p-4 rounded-3 position-relative transition-all hover-shadow shadow-sm">

        <!-- Header & Priority / Checkbox -->
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="d-flex align-items-start gap-3 w-100">

                {{-- Permission to display the completion checkbox --}}
                @can('complete', $task)
                    @if($task->priority != 2)
                        <form action="{{ route('tasks.complete', ['id' => Crypt::encrypt($task->id)]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input class="form-check-input mt-1 cursor-pointer border-secondary shadow-none shrink-0"
                                   type="checkbox"
                                   value=""
                                   id="taskCheck_{{ $task->id }}"
                                   style="width: 1.25em; height: 1.25em;"
                                   onchange="this.form.submit()">
                        </form>
                    @endif
                @endcan

                <div class="w-100 overflow-hidden">
                    <!-- Priority Badge -->
                    <span class="badge fw-bold mb-2 px-2 py-1 fs-7
                        @if($task->priority == 0) bg-secondary
                        @elseif($task->priority == 1) bg-danger
                        @elseif($task->priority == 2) bg-success
                        @endif" style="font-size: 0.75rem;">
                        Priority: <span style="font-size: 0.75rem;">{{ $task->priority_label }}</span>
                    </span>

                    <h4 class="h5 fw-bold text-dark text-truncate mb-0">{{ $task->title }}</h4>
                </div>
            </div>

            <!-- Actions Dropdown (Protected by Permission) -->
            @can('manage-tasks', $task)
                <div class="dropdown flex-shrink-0 ms-2">
                    <button class="btn btn-link text-dark p-0 text-decoration-none shadow-none"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border shadow">
                        <li>
                            <a class="dropdown-item py-2 fw-medium"
                               href="{{ route('editTasks', ['id' => Crypt::encrypt($task->id)]) }}">
                                <i class="fa-regular fa-pen-to-square me-2 text-primary"></i>Edit
                            </a>
                        </li>

                        @can('delete', $task)
                            @if($task->priority != 2)
                                <li>
                                    <a class="dropdown-item py-2 text-danger fw-medium"
                                       href="{{ route('deleteConfirm', ['id' => Crypt::encrypt($task->id)]) }}">
                                        <i class="fa-regular fa-trash-can me-2"></i>Delete
                                    </a>
                                </li>
                            @endif
                        @endcan
                    </ul>
                </div>
            @endcan
        </div>

        <!-- Description -->
        <p class="text-secondary mb-4 flex-grow-1"
           style="font-size: 0.9rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
            {{ $task->description }}
        </p>

        <!-- Footer with Dates -->
        <div class="d-flex align-items-center justify-content-between pt-3 border-top border-secondary border-opacity-25 text-dark fw-semibold"
             style="font-size: 0.8rem;">

            {{-- Due Date (Only shown if NOT completed and date exists) --}}
            @if(!$task->completed_at && $task->date_limited)
                <span>
                    <i class="fa-regular fa-clock me-1 text-muted"></i>
                    Due Date: {{ date('Y-m-d', strtotime($task->date_limited)) }}
                </span>
            @endif

            {{-- Completed Date --}}
            @if($task->completed_at)
                <span>
                    <i class="fa-regular fa-clock me-1 text-muted"></i>
                    Completed Date: {{ date('Y-m-d', strtotime($task->completed_at)) }}
                </span>
            @endif

            {{-- Updated Date --}}
            @if($task->updated_at)
                <span>
                    <i class="fa-regular fa-clock me-1 text-muted"></i>
                    Updated Date: {{ date('Y-m-d', strtotime($task->updated_at)) }}
                </span>
            @endif

        </div>
    </div>
</div>
<!-- End of Dynamic Card -->
