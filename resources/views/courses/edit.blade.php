@extends('layouts.app')
@section('topic','Edit Course')
@section('content')

<div class="card p-4">
    <h4 class="mb-3">Edit Course</h4>

    <form method="POST" action="/courses/update/{{ $course->id }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" name="course_name" value="{{ old('course_name', $course->course_name) }}"
                class="form-control @error('course_name') is-invalid @enderror" placeholder="Enter Course Name" required>
            @error('course_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Select Teacher</label>
            <select name="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror" required>
                <option value="">Select Teacher</option>
                @foreach($teachers as $t)
                <option value="{{ $t->id }}" {{ old('teacher_id', $course->teacher_id) == $t->id ? 'selected' : '' }}>
                    {{ $t->name }} ({{ $t->subject }})
                </option>
                @endforeach
            </select>
            @error('teacher_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Update Course
        </button>
    </form>
</div>

@endsection