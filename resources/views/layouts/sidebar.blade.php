<div class="app-sidebar">
    <h5 class="mb-3">Navigation</h5>
    <div class="list-group">
        {{-- <a href="/" class="list-group-item list-group-item-action {{ request()->is('/') ? 'active' : '' }}">Dashboard</a> --}}
        @if(auth()->check() && auth()->user()->role_id === 1)
            <a href="/students" class="list-group-item list-group-item-action {{ request()->is('students*') ? 'active' : '' }}">Students</a>
            <a href="/teachers" class="list-group-item list-group-item-action {{ request()->is('teachers*') ? 'active' : '' }}">Teachers</a>
            <a href="/classrooms" class="list-group-item list-group-item-action {{ request()->is('classrooms*') ? 'active' : '' }}">
                <i class="bi bi-building me-1"></i> Classrooms
            </a>
            <a href="/courses" class="list-group-item list-group-item-action {{ request()->is('courses*') ? 'active' : '' }}">Courses</a>
        @endif

        @if(auth()->check() && in_array(auth()->user()->role_id, [1,2]))
            <a href="/enrollments" class="list-group-item list-group-item-action {{ request()->is('enrollments*') ? 'active' : '' }}">Enrollments</a>
        @endif
    </div>
</div>
