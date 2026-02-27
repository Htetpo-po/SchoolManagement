@extends('layouts.app')
@section('topic','Add Course')
@section('content')

<div class="card p-4">
    <h4 class="mb-3">Add Course</h4>

    <form method="POST" action="/courses/store">
        @csrf

        <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" name="course_name" value="{{ old('course_name') }}"
                class="form-control @error('course_name') is-invalid @enderror" placeholder="Enter Course Name">
            @error('course_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Select Teacher</label>
            <select name="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                <option value="">Select Teacher</option>
                @foreach($teachers as $t)
                <option value="{{ $t->id }}" {{ old('teacher_id') == $t->id ? 'selected' : '' }}>
                    {{ $t->name }} ({{ $t->subject }})
                </option>
                @endforeach
            </select>
            @error('teacher_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle me-1"></i> Add Course
        </button>
    </form>
</div>

@endsection