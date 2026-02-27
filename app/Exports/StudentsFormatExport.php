<?php

namespace App\Exports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentsFormatExport implements FromArray, WithHeadings, WithStyles, WithEvents
{
    protected $classMap;

    public function __construct()
    {
        // Get classroom names and IDs
        $this->classMap = Classroom::pluck('id', 'class_name')->toArray();
        // ['Class A' => 1, 'Class B' => 2, ...]
    }

    public function array(): array
    {
        return []; // empty template
    }

    public function headings(): array
    {
        return ['name', 'father', 'mother', 'classroom_name', 'phone_no', 'address'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '0d6efd']
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                // Dropdown list of classroom names
                $classNames = array_keys($this->classMap);
                $classList = implode(',', $classNames);

                // Apply dropdown to column D (classroom_name)
                for ($row = 2; $row <= 100; $row++) {
                    $validation = $sheet->getCell("D{$row}")->getDataValidation();
                    $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                    $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                    $validation->setAllowBlank(true);
                    $validation->setShowDropDown(true);
                    $validation->setFormula1('"'.$classList.'"'); // show names to user
                }
            }
        ];
    }

    /**
     * Helper: Get Classroom ID from name
     */
    public function getClassroomId(string $className): ?int
    {
        return $this->classMap[$className] ?? null;
    }
}