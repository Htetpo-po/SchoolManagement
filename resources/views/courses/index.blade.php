@extends('layouts.app')
@section('topic','Course List')
@section('content')

<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Courses</h4>
        <a href="/courses/create" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Add Course
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle table-hover table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Course Name</th>
                    <th>Teacher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($courses as $index => $c)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $c->course_name }}</td>
                    <td>{{ $c->teacher_name }}</td>
                    <td>
                        <a href="/courses/edit/{{ $c->id }}" class="btn btn-sm btn-outline-warning me-1">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a href="/courses/delete/{{ $c->id }}" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @if(count($courses) == 0)
                <tr>
                    <td colspan="4" class="text-center text-muted">No courses found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection