<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerEmployeeController extends Controller
{
    //
    public function index()
    {
        $employers = Employer::with('employees')->get();
        return view('employers.index', compact('employers'));
    }
}
