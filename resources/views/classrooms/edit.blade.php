@extends('layouts.app')
@section('content')

<div class="card p-4">
    <h4>Edit Classroom</h4>

    <form method="POST" action="/classrooms/update/{{ $classroom->id }}">
        @csrf

        <div class="mb-3">
            <label>Class Name</label>
            <input type="text" name="class_name"
                class="form-control @error('class_name') is-invalid @enderror"
                value="{{ old('class_name',$classroom->class_name) }}" required>

            @error('class_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Update
        </button>
    </form>
</div>

@endsection