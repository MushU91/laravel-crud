<?php

namespace App\Http\Controllers\OJT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all(); //fetch all rows from DB
        return view('students.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('The Result are:', $request->all());
        // 1. Validate form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
        ]);
        
        //2. insert data into database using eloquent

        Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
        ]);

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
    public function edit(string $id)
{
    $student= Student::findOrFail($id);
    return view('students.edit', compact('student'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
        ]);

        $student= Student::findOrFail($id);   //single student model
        $student->update($request->only(['name','age','address']));

        return redirect()->route('students.index')->with('success','Student updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student= Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
