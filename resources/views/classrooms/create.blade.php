@extends('layouts.app')
@section('content')

<div class="card p-4">
    <h4>Add Classroom</h4>

    <form method="POST" action="/classrooms/store">
        @csrf

        <div class="mb-3">
            <label>Class Name</label>
            <input type="text" name="class_name"
                class="form-control @error('class_name') is-invalid @enderror"
                value="{{ old('class_name') }}">

            @error('class_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">
            <i class="bi bi-check-circle me-1"></i> Save
        </button>
    </form>
</div>

@endsection