@extends('layouts.app')
@section('topic','Teacher List')
@section('content')

<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Teacher List</h4>
        <a href="/teachers/create" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Add Teacher
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle table-hover table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Salary</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($teachers as $index => $t)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $t->name }}</td>
                    <td>{{ $t->role }}</td>
                    <td>{{ $t->classroom->class_name}}</td>
                    <td>{{ $t->subject }}</td>
                    <td>{{ $t->salary }}</td>
                    <td>{{ $t->phone_no }}</td>
                    <td>
                        <a href="/teachers/edit/{{ $t->id }}" class="btn btn-sm btn-outline-warning me-1">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a href="/teachers/delete/{{ $t->id }}" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @if(count($teachers) == 0)
                <tr>
                    <td colspan="8" class="text-center text-muted">No teachers found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection