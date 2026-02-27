@extends('layouts.app')
@section('topic','Enrollment List')
@section('content')

<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Enrollments</h4>
        <a href="/enrollments/create" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Enroll Student
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle table-hover table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Student</th>
                    <th>Class</th>
                    <th>Course</th>
                    <th>Teacher</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($enrollments as $index => $e)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $e->student_name }}</td>
                    <td>{{ $e->class_name }}</td>
                    <td>{{ $e->course_name }}</td>
                    <td>{{ $e->teacher_name }}</td>
                    <td>{{ $e->subject }}</td>
                    <td>
                        <a href="/enrollments/edit/{{ $e->id }}" class="btn btn-sm btn-outline-warning me-1">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a href="/enrollments/delete/{{ $e->id }}" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @if(count($enrollments) == 0)
                <tr>
                    <td colspan="7" class="text-center text-muted">No enrollments found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection