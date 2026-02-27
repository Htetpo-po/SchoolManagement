<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = DB::table('courses')
            ->join('teachers','courses.teacher_id','=','teachers.id')
            ->select(
                'courses.id',
                'courses.course_name',
                'teachers.name as teacher_name'
            )
            ->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('courses.create', compact('teachers'));
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->validated());
        return redirect('/courses')->with('success','Course Added Successfully');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $teachers = Teacher::all();

        return view('courses.edit', compact('course','teachers'));
    }

    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->validated());

        return redirect('/courses')->with('success','Course Updated Successfully');
    }

    public function delete($id)
    {
        Course::destroy($id);
        return redirect('/courses')->with('success','Course Deleted Successfully');
    }
}