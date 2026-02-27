@extends('layouts.app')
@section('topic','Edit Enrollment')
@section('content')

<div class="card p-4">
    <h4 class="mb-3">Edit Enrollment</h4>

    <form method="POST" action="/enrollments/update/{{ $enrollment->id }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Select Student</label>
            <select name="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                <option value="">Select Student</option>
                @foreach($students as $s)
                <option value="{{ $s->id }}" {{ old('student_id', $enrollment->student_id) == $s->id ? 'selected' : '' }}>
                    {{ $s->name }} ({{ $s->class }})
                </option>
                @endforeach
            </select>
            @error('student_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Select Course</label>
            <select name="course_id" class="form-control @error('course_id') is-invalid @enderror" required>
                <option value="">Select Course</option>
                @foreach($courses as $c)
                <option value="{{ $c->id }}" {{ old('course_id', $enrollment->course_id) == $c->id ? 'selected' : '' }}>
                    {{ $c->course_name }}
                </option>
                @endforeach
            </select>
            @error('course_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Update Enrollment
        </button>
    </form>
</div>

@endsection