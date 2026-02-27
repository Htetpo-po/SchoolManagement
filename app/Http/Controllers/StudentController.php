<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentRequest;
use App\Models\Classroom;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Exports\StudentsFormatExport;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Http\Requests\StudentImportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
     public function index()
{
    // Get classrooms for the dropdown
    $classrooms =Classroom::orderBy('class_name')->get();

    $query = Student::with('classroom');

    // Filter by student name
    if ($name = request('name')) {
        $query->where('name', 'like', "%{$name}%");
    }

    // Filter by classroom
    if ($classroom_id = request('classroom_id')) {
        $query->where('classroom_id', $classroom_id);
    }

    // Paginate 20 per page
    $students = $query->orderBy('id', 'desc')->paginate(20);

    return view('students.index', compact('students', 'classrooms'));
}
    public function create()
    {
        $classes = Classroom::orderBy('class_name')->get();
        return view('students.create', compact('classes'));
    }

    public function store(StudentRequest $request)
    {
        Student::create($request->validated());
        return redirect('/students')->with('success','Student Added Successfully');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes= Classroom::orderBy('class_name')->get();
        return view('students.edit', compact('student','classes'));
    }
    public function update(StudentRequest $request, $id)
{
    $student = Student::findOrFail($id);

    $student->update($request->validated());

    return redirect('/students')->with('success','Student Updated Successfully');
}
    public function delete($id)
    {
        Student::destroy($id);
        return redirect('/students')->with('success','Student Deleted Successfully');
    }

     public function export()
{
    // Start the query
    $query = Student::with('classroom');

    // Apply filters from request
    if ($name = request('name')) {
        $query->where('name', 'like', "%{$name}%");
    }

    if ($classroom_id = request('classroom_id')) {
        $query->where('classroom_id', $classroom_id);
    }

    // Get all filtered students
    $students = $query->orderBy('id', 'desc')->get();

    // Pass filtered data to the export class
    return Excel::download(new StudentsExport($students), 'students.xlsx');
}
  public function downloadFormat(){
    return Excel::download(new StudentsFormatExport, 'students_format.xlsx');
  }

       public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv|max:5120',
    ]);

    $import = new StudentsImport;

    try {
        Excel::import($import, $request->file('file'));

        if (!empty($import->errors)) {
            return back()->with('import_errors', $import->errors);
             foreach ($import->errors as $error) {
                Log::warning("[Student Import Validation] " . $error);
            }

        }

        return back()->with('success', 'Students imported successfully!');

    } catch (\Throwable $e) {
        return back()->with('error', 'Critical Error: ' . $e->getMessage());
    }
}

}