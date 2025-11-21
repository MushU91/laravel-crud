<?php

namespace App\Http\Controllers\OJT;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateRequest;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

use Maatwebsite\Excel\Facades\Excel;

use App\Exports\StudentsExport;
use App\Exports\StudentsTemplateExport;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $students = Student::all(); //fetch all rows from DB

        //if API request (POSTMAN/Axios/mobile app)
        if ($request->wantsJson()){
            return response()->json([
                'status' => 'OK',
                'count' => $students->count(),
                'students' => $students
            ], 200);
        }
        //web request
        return view('students.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->wantsJson()){
            return response()->json([
                'message' => 'OK'
            ],201);
        }
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPost $request)
    {
        // $url = $request->fullUrl();
        // Log::info('current url:' . $url);
        // Log::info('The Result are:', $request->all());

        // 1. Validate form inputs
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'age' => 'required|integer',
        //     'address' => 'required|string|max:255',
        // ]);

        $data = $request->validated();
        
        //2. insert data into database using eloquent
        Log::info($data);

        Student::create($data);

        if ($request->wantsJson()){
            return response()->json([
                'message' => 'Added successfully',
                'status' => 'OK',
                'student_data' => $data,
            ],201);
        }

        //3. redirect back to list page
        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request ,string $id)
{
    $url = $request->fullUrl();
    Log::info('full url is :' . $url);

    $url = $request->url();
    Log::info(' url is :' . $url);

    
    
    
    $student= Student::findOrFail($id);

    if($request->wantsJson()){
        return response()->json([
            'status'=> 'OK',
            'student_data' => $student,
        ],200);
    }
    return view('students.edit', compact('student'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'age' => 'required|integer',
        //     'address' => 'required|string|max:255',
        // ]);
    

        $student= Student::findOrFail($id);   //single student model
        $student->update($request->only(['name','age','address']));

        if($request->wantsJson()){
            return response()->json([
                'message' => 'updated successfully',
                'status' => 'OK',
                'update_student_data' => $student,
            ],200);
        }

        return redirect()->route('students.index')->with('success','Student updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $student= Student::findOrFail($id);
        $student->delete();

        if($request->wantsJson()){
            return response()->json([
                'message' => 'delete successfully',
                
            ],200);
        }

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

   public function import(Request $request)
    {
        // Validate file type
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            
            $import = new StudentsImport;
            Excel::import($import, $request->file('file'));


            // If import has validation errors
            if ($import->failures()->isNotEmpty()) {

                $errors = [];

                foreach ($import->failures() as $failure) {
                    $errors[] = "Row {$failure->row()} - " . implode(', ', $failure->errors() ?? []);
                }


                // Return errors to Blade
                return back()->with('import_errors', $errors);
            }

            return redirect()
                ->route('students.index')
                ->with('success', 'Students imported successfully!');

        } catch (\Exception $e) {

            return back()
                ->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }


    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function template()
    {
        return Excel::download(new StudentsTemplateExport, 'students_template.xlsx');
    }
}
