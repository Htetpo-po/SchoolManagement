<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\EnrollmentRequest;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = DB::table('enrollments')
            ->join('students','enrollments.student_id','=','students.id')
            ->join('courses','enrollments.course_id','=','courses.id')
            ->join('teachers','courses.teacher_id','=','teachers.id')
            ->join('classrooms','students.classroom_id','=','classrooms.id')
            ->select(
                'enrollments.id',
                'students.name as student_name',
                'classrooms.class_name',
                'courses.course_name',
                'teachers.name as teacher_name',
                'teachers.subject'
            )
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();

        return view('enrollments.create', compact('students','courses'));
    }

    public function store(EnrollmentRequest $request)
    {
        Enrollment::create($request->validated());
        return redirect('/enrollments')->with('success','Student Enrolled Successfully');
    }

    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();

        return view('enrollments.edit', compact('enrollment','students','courses'));
    }

    public function update(EnrollmentRequest $request, $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->validated());

        return redirect('/enrollments')->with('success','Enrollment Updated Successfully');
    }

    public function delete($id)
    {
        Enrollment::destroy($id);
        return redirect('/enrollments')->with('success','Enrollment Deleted Successfully');
    }
}