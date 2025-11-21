<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFamilyRequest;
use Illuminate\Support\Facades\Log;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $family = Family::all();//fetch all
        return response()->json([
            'status' => 'OK',
            'count' => $family->count(),
            'family' => $family,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        return response()->json([
            'message' => 'create family successfully',
            'status' => 'OK',
        ],201);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFamilyRequest $request)
    {
        //
        $family = $request->validated();

        Log::info($family);
        
        Family::create($family);
        
        return response()->json([
            'message' => 'Family Added successfully',
            'status' => 'OK',
            'family_data' => $family,
        ],201);
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
    public function edit(Request $request,string $id)
    {
        //
        $family = Family::findOrFail($id);

        return response()->json([
            'message' => 'Edit successfully',
            'status' => 'OK',
            'family_data' => $family,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $url = $request -> fullUrl();
        Log::info('Full URL is '. $url);

        $family = Family::findOrFail($id);
        $family->update($request->only(['name','age','address']));

        return response()->json([
            'message' => 'Updated Successfully',
            'status' => 'OK',
            'family_data' => $family,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $family = Family::findOrFail($id);
        $family->delete();

        return response()->json([
            'message' => 'Deleted Successfully',
            'status' => 'OK',
        ],200);
    }
}
