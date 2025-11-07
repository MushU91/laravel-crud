<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class TestController extends Controller
{
    //
    public function show() 
    {
        return view('testing');    
    }

    public function submit(StoreFormRequest $request)
    {
        // $validated = $request->validated();
        

        return back()->with('success', 'form submitted successfully');
    }
}
