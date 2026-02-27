@extends('layouts.app')
@section('content')

<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Classrooms</h4>
        <a href="/classrooms/create" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Add Classroom
        </a>
    </div>
        @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
            </div>
     @endif
    <table class="table table-hover table-striped text-center">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Class Name</th>
                <th>Total Students</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classrooms as $index => $c)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $c->class_name }}</td>
                <td>{{ $c->students_count }}</td>
                <td>
                    <a href="/classrooms/edit/{{ $c->id }}" class="btn btn-sm btn-outline-warning me-1">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a href="/classrooms/delete/{{ $c->id }}" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection