<!-- Dynamic Task Card (Mapped with migration) -->
<div class="col-md-6 col-xl-4">
    <div
        class="card h-100 border border-secondary border-opacity-25 bg-white p-4 rounded-3 position-relative transition-all hover-shadow shadow-sm">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="d-flex align-items-start gap-3 w-100">
                <!-- Checkbox to complete task -->
                <input
                    class="form-check-input mt-1 cursor-pointer border-secondary flex-shrink-0"
                    type="checkbox" value="" id="taskCheck_{{ $task['id'] }}"
                    style="width: 1.25em; height: 1.25em;">
                <div class="w-100 overflow-hidden">
                    <!-- Example of display based on migration priority -->
                    <span class="badge
                     @if($task['priority'] == 0) bg-secondary
                     @elseif($task['priority'] == 1) bg-danger
                     @elseif($task['priority'] == 2) bg-success
                     @endif
                     fw-bold mb-2 px-2 py-1" style="font-size: 0.75rem;">
                        Priority: <span style="font-size: 0.75rem;">{{ $task->priority_label }}</span>
                    </span>
                    <h4 class="h5 fw-bold text-dark text-truncate mb-0">{{ $task['title'] }}</h4>
                </div>
            </div>
            <div class="dropdown flex-shrink-0 ms-2">
                <button class="btn btn-link text-dark p-0 text-decoration-none shadow-none"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end border shadow">
                    <li><a class="dropdown-item py-2 fw-medium"
                           href="{{ route('editTasks', ['id' => Crypt::encrypt($task['id'])]) }}"><i
                                class="fa-regular fa-pen-to-square me-2 text-primary"></i>Edit</a>
                    </li>
                    <li><a class="dropdown-item py-2 text-danger fw-medium"
                           href="{{ route('deleteConfirm', ['id' => Crypt::encrypt($task['id'])]) }}"><i
                                class="fa-regular fa-trash-can me-2"></i>Delete</a></li>
                </ul>
            </div>
        </div>

        <p class="text-secondary mb-4 flex-grow-1"
           style="font-size: 0.9rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
            {{ $task['description'] }}
        </p>

        <div
            class="d-flex align-items-center justify-content-between pt-3 border-top border-secondary border-opacity-25 text-dark fw-semibold"
            style="font-size: 0.8rem;">
            @if($task['date_limited'] == null)
                <span><i class="fa-regular fa-clock me-1 text-muted"></i></span>
            @else
                <span><i class="fa-regular fa-clock me-1 text-muted"></i> Due Date: {{ date('Y-m-d', strtotime($task['date_limited']))}}</span>
            @endif
        </div>
    </div>
</div>
<!-- End of Dynamic Card -->
