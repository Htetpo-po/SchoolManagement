<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\ClassroomRequest;
use App\Models\Teacher;
use App\Models\Student;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::withCount('students')->get();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(ClassroomRequest $request)
    {
        Classroom::create($request->validated());
        return redirect('/classrooms')->with('success','Classroom Created Successfully');
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(ClassroomRequest $request, $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->validated());

        return redirect('/classrooms')->with('success','Classroom Updated Successfully');
    }

      public function delete($id)
{
    $classroom = Classroom::findOrFail($id);

    // Check teachers
    $hasTeachers = Teacher::where('classroom_id', $id)->exists();

    // Check students
    $hasStudents = Student::where('classroom_id', $id)->exists();

    if ($hasTeachers || $hasStudents) {
        return redirect('/classrooms')
            ->with('error', 'Cannot delete! This classroom is already assigned to teachers or students.');
    }

    $classroom->delete();

    return redirect('/classrooms')
        ->with('success', 'Classroom Deleted Successfully');
}
}