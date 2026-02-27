<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;
use App\Models\Classroom;
use Illuminate\Support\Facades\Log;


class TeacherController extends Controller
{
    public function index()
{
    $teachers = Teacher::with('classroom')->get();
    return view('teachers.index', compact('teachers'));
}

    public function create()
    { 
        $classes = ClassRoom::orderBy('class_name')->get();
        return view('teachers.create', compact('classes'));
    }

    public function store(TeacherRequest $request)
    {
        Teacher::create($request->validated());
        return redirect('/teachers')->with('success','Teacher Added Successfully');
    }

      public function edit($id)
{
    $teacher = Teacher::findOrFail($id);
    $classes = Classroom::orderBy('class_name')->get();

    return view('teachers.edit', compact('teacher','classes'));
}
    public function update(TeacherRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->validated());

        return redirect('/teachers')->with('success','Teacher Updated Successfully');
    }

    public function delete($id)
    {
        Teacher::destroy($id);
        return redirect('/teachers')->with('success','Teacher Deleted Successfully');
    }
}