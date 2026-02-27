<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'class_name' => 'required|string|max:100|unique:classrooms,class_name,' . $this->id,
        ];
    }

    public function messages(): array
    {
        return [
            'class_name.required' => 'Class name is required.',
            'class_name.unique'   => 'This class already exists.',
        ];
    }
}