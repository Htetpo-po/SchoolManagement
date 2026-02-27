<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     <link rel="stylesheet" href="{{ asset('./css/common/style.css') }}">
    <style>
        body { background-color: #f4f6f9; min-height: 100vh; }
        .sidebar { background: #fff; min-height: 100vh; padding: 20px; border-radius: 10px; }
        .sidebar .nav-link { color: #343a40; margin-bottom: 5px; }
        .sidebar .nav-link.active { background: #eef2f7; border-radius: 6px; }
        .header { background: linear-gradient(45deg,#1d3557,#457b9d); color:white; padding:15px; border-radius: 10px 10px 0 0; }
        .card { border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        footer { background:#1d3557; color:white; padding:10px; text-align:center; margin-top:20px; }
        /* Sidebar */
.sidebar {
    background: #fff;
    min-height: 100vh;
    padding: 25px 20px;
    border-radius: 10px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    transition: all 0.3s ease;
}

.sidebar h5 {
    letter-spacing: 0.5px;
    font-size: 18px;
}

.sidebar .nav-link {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    font-size: 16px;
    color: #343a40;
    border-radius: 8px;
    margin-bottom: 8px;
    transition: 0.3s;
}

.sidebar .nav-link i {
    font-size: 18px;
}

.sidebar .nav-link:hover {
    background: #e3f2fd;
    color: #0d6efd;
    text-decoration: none;
    transform: translateX(3px);
}

.sidebar .nav-link.active {
    background: #0d6efd;
    color: white;
    font-weight: 500;
}
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
<div class="col-md-3 mt-4">
    <div class="sidebar p-3">
        <h5 class="mb-4 fw-bold text-primary">School Management</h5>
        {{-- <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            <i class="bi bi-house-door-fill me-2"></i> Dashboard
        </a> --}}
        @if(auth()->check() && auth()->user()->role_id === 1)
            <a href="/students" class="nav-link {{ request()->is('students*') ? 'active' : '' }}">
                <i class="bi bi-people-fill me-2"></i> Students
            </a>
            <a href="/teachers" class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}">
                <i class="bi bi-person-badge-fill me-2"></i> Teachers
            </a>
            <a href="/classrooms" class="nav-link {{ request()->is('classrooms*') ? 'active' : '' }}">
                <i class="bi bi-building me-2"></i> Classrooms
            </a>
            <a href="/courses" class="nav-link {{ request()->is('courses*') ? 'active' : '' }}">
                <i class="bi bi-journal-bookmark-fill me-2"></i> Courses
            </a>
        @endif
        @if(auth()->check() && in_array(auth()->user()->role_id, [1,2]))
            <a href="/enrollments" class="nav-link {{ request()->is('enrollments*') ? 'active' : '' }}">
                <i class="bi bi-card-checklist me-2"></i> Enrollments
            </a>
        @endif
    </div>
</div>

        <!-- Main Content -->
        <div class="col-md-9 mt-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<footer>
    © 2026 School Management System
</footer>

</body>
</html>