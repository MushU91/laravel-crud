<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentsTemplateExport implements FromArray, WithStyles, WithEvents
{
    public function array(): array
    {
        return [
            ['name', 'age', 'address'],   // Header
            ['Hlaing', 28, 'Yangon'],    // Example row
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Make header bold
            1 => ['font' => ['bold' => true]],

            // Light yellow background
            'A1:C1' => [
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => 'FFFFCC'],
                    'endColor'   => ['rgb' => 'FFFFCC'],
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                // Dropdown list for "class" column
                for ($row = 2; $row <= 100; $row++) {
                    $event->sheet->getDelegate()
                        ->getCell("C$row")
                        ->getDataValidation()
                        ->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST)
                        ->setShowDropDown(true)
                        ->setFormula1('"Yangon,Mandalay,Naypyitaw,Bago"') // dropdown values
                        ->setAllowBlank(true);
                }
            },
        ];

    }
}
