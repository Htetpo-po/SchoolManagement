@extends('layouts.app')
@section('topic','Edit Teacher')
@section('content')

<div class="card p-4">
    <h4 class="mb-3">Edit Teacher</h4>

    <form method="POST" action="/teachers/update/{{ $teacher->id }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Teacher Name</label>
            <input type="text" name="name" value="{{ old('name', $teacher->name) }}"
                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Teacher Name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <input type="text" name="role" value="{{ old('role', $teacher->role) }}"
                class="form-control @error('role') is-invalid @enderror" placeholder="Enter Role">
            @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="mb-3">
                <label class="form-label">Class</label>

                <select name="classroom_id"
                    class="form-select @error('classroom_id') is-invalid @enderror">

                    <option value="">-- Select Class --</option>

                    @foreach($classes as $class)
                        <option value="{{ $class->id }}"
                            {{ old('classroom_id', $teacher->classroom_id) == $class->id ? 'selected' : '' }}>
                            {{ $class->class_name }}
                        </option>
                    @endforeach

                </select>

                @error('classroom_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" value="{{ old('subject', $teacher->subject) }}"
                class="form-control @error('subject') is-invalid @enderror" placeholder="Enter Subject">
            @error('subject')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="number" name="salary" value="{{ old('salary', $teacher->salary) }}"
                class="form-control @error('salary') is-invalid @enderror" placeholder="Enter Salary">
            @error('salary')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone_no" value="{{ old('phone_no', $teacher->phone_no) }}"
                class="form-control @error('phone_no') is-invalid @enderror" placeholder="Enter Phone Number">
            @error('phone_no')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address">{{ old('address', $teacher->address) }}</textarea>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Update Teacher
        </button>
    </form>
</div>

@endsection