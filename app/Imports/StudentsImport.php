<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentsImport implements ToCollection, WithStartRow
{
    public array $errors = [];
    protected array $classMap;

    public function __construct()
    {
        // class_name => id
        $this->classMap = Classroom::pluck('id', 'class_name')
            ->mapWithKeys(fn ($id, $name) => [trim(preg_replace('/\s+/', ' ', $name)) => $id])
            ->toArray();
    }

    public function startRow(): int
    {
        // Skip header row
        return 2;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {

            $rowNumber = $index + 2;

            // Skip completely empty rows
            if (!isset($row[0]) || trim((string)$row[0]) === '') {
                continue;
            }

            // Map numeric Excel columns → named fields
            $data = [
                'name'           => $row[0] ?? '',
                'father'         => $row[1] ?? '',
                'mother'         => $row[2] ?? '',
                'classroom_name' => $row[3] ?? '',
                'phone_no'       => $row[4] ?? '',
                'address'        => $row[5] ?? '',
            ];

            // Safe classroom lookup
            $classId = $this->classMap[$data['classroom_name']] ?? null;

            $validator = Validator::make($data, [
                'name' => 'required|max:255',
                'father' => 'required|max:255',
                'mother' => 'required|max:255',
                'classroom_name' => [
                    'required',
                    function ($attr, $value, $fail) use ($classId) {
                        if (!$classId) {
                            $fail("Classroom '{$value}' does not exist.");
                        }
                    },
                ],
                'phone_no' => 'required|digits_between:7,15',
            ]);

            // Collect validation errors
            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $msg) {
                    $this->errors[] = "Row {$rowNumber}: {$msg}";
                }
                continue;
            }

            //  Save to database
            Student::create([
                'name'         => $data['name'],
                'father'       => $data['father'],
                'mother'       => $data['mother'],
                'classroom_id' => $classId,
                'phone_no'     => $data['phone_no'],
                'address'      => $data['address'],
            ]);
        }
    }
}