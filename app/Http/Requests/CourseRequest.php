<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    // Only allow logged-in users if needed
    public function authorize()
    {
        return true; // Set to false if you want to restrict access
    }

    // Validation rules
    public function rules()
    {
        return [
            'course_name' => 'required|string|max:255',
            'teacher_id'  => 'required|exists:teachers,id',
        ];
    }

    // Custom error messages (optional)
    public function messages()
    {
        return [
            'course_name.required' => 'Course name is required.',
            'course_name.string'   => 'Course name must be a valid text.',
            'course_name.max'      => 'Course name cannot exceed 255 characters.',
            'teacher_id.required'  => 'Please select a teacher for this course.',
            'teacher_id.exists'    => 'Selected teacher does not exist.',
        ];
    }
}