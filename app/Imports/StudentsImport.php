<?php 

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public function model(array $row)
    {
        return new Student([
            'name' => $row['name'],
            'age' => $row['age'],
            'address' => $row['address'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name' => 'required|string|max:255',
            '*.age'  => 'required|integer',
            '*.address' => 'required|string|max:255',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.name.required' => 'Name is required.',
            '*.age.integer' => 'Age must be an integer.',
        ];
    }
}
