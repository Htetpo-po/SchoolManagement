@extends('layouts.app')
@section('topic','Edit Student')
@section('content')

<div class="card p-4">
    <h4 class="mb-3">Edit Student</h4>

    <form method="POST" action="/students/update/{{ $student->id }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Student Name</label>
            <input type="text" name="name" id="name" 
                value="{{ old('name', $student->name) }}" 
                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Student Name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="father" class="form-label">Father Name</label>
            <input type="text" name="father" id="father" 
                value="{{ old('father', $student->father) }}" 
                class="form-control @error('father') is-invalid @enderror" placeholder="Enter Father Name">
            @error('father')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mother" class="form-label">Mother Name</label>
            <input type="text" name="mother" id="mother" 
                value="{{ old('mother', $student->mother) }}" 
                class="form-control @error('mother') is-invalid @enderror" placeholder="Enter Mother Name">
            @error('mother')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="classroom_id" class="form-label">Class</label>
            <select name="classroom_id" id="classroom_id" 
                class="form-select @error('classroom_id') is-invalid @enderror">
                <option value="">-- Select Class --</option>

                @foreach($classes as $class)
                    <option value="{{ $class->id }}" 
                        {{ old('classroom_id', $student->classroom_id) == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>

            @error('classroom_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone_no" class="form-label">Phone Number</label>
            <input type="text" name="phone_no" id="phone_no" 
                value="{{ old('phone_no', $student->phone_no) }}" 
                class="form-control @error('phone_no') is-invalid @enderror" placeholder="Enter Phone Number">
            @error('phone_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" 
                class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address">{{ old('address', $student->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Update Student
        </button>
    </form>
</div>

@endsection