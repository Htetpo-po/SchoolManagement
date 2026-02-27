@extends('layouts.app')
@section('topic', 'Student List')
@section('content')

<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card p-4 shadow-sm">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Student List</h4>
                    <a href="{{ url('/students/create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add Student
                    </a>
                </div>

                <!-- Buttons: Export, Import, Download Format -->
                <div class="row mb-3 g-2">
                    <div class="col-md-4">
                        <a href="{{ route('students.export', [
                                'name' => request('name'),
                                'classroom_id' => request('classroom_id')
                            ]) }}" 
                           class="btn btn-success w-100">
                            <i class="bi bi-download me-1"></i> Export Students
                        </a>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data" class="d-flex gap-2">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload me-1"></i> Import Students
                            </button>
                        </form>
                     @if (session('import_errors'))
                        <div class="alert alert-danger mt-2">
                            <ul class="mb-0">
                                @foreach (session('import_errors') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger mt-2">
                            {{ session('error') }}
                        </div>
                    @endif
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('students.export-format') }}" class="btn btn-warning w-100">
                            <i class="bi bi-file-earmark-spreadsheet me-1"></i> Download Format
                        </a>
                    </div>
                </div>

                <!-- Search Form -->
                <form method="GET" action="{{ url('/students') }}" class="row g-3 mb-4">
                    <div class="col-md-4">
                        <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Search by student name">
                    </div>
                    <div class="col-md-4">
                        <select name="classroom_id" class="form-select">
                            <option value="">Select Class</option>
                            @foreach ($classrooms as $class)
                                <option value="{{ $class->id }}" {{ request('classroom_id') == $class->id ? 'selected' : '' }}>
                                    {{ $class->class_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1">Search</button>
                        <a href="{{ url('/students') }}" class="btn btn-secondary flex-grow-1">Reset</a>
                    </div>
                </form>

                <!-- Student Table -->
                <div class="table-responsive shadow-sm">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="text-start">Name</th>
                                <th>Father</th>
                                <th>Mother</th>
                                <th>Class</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $index => $s)
                                <tr>
                                    <td>{{ $students->firstItem() + $index }}</td>
                                    <td class="text-start">{{ $s->name }}</td>
                                    <td>{{ $s->father }}</td>
                                    <td>{{ $s->mother }}</td>
                                    <td>{{ $s->classroom->class_name }}</td>
                                    <td>{{ $s->phone_no }}</td>
                                    <td class="d-flex justify-content-center gap-1">
                                        <a href="{{ url('/students/edit/' . $s->id) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="{{ url('/students/delete/' . $s->id) }}" class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Are you sure you want to delete this student?');">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-muted">No students found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($students->hasPages())
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $students->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection