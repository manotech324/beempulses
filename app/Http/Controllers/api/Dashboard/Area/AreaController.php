<?php

namespace App\Http\Controllers\api\Dashboard\Area;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all areas
        $areas = Area::all();

        // Return a JSON response
        return response()->json([
            'message' => 'Areas retrieved successfully',
            'areas' => $areas
        ], 200); // 200 OK status code
    }

    /**
     * Show the form for creating a new resource.
     * (Not used in API context, can be removed if unused)
     */
    public function create()
    {
        return response()->json([
            'message' => 'This endpoint is not supported in the API'
        ], 405); // 405 Method Not Allowed
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'region_id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        // Create the area in the database
        $area = Area::create($validatedData);

        // Return a success response with the created area details
        return response()->json([
            'message' => 'Area created successfully',
            'area' => $area
        ], 201); // 201 Created status code
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the area by ID
        $area = Area::find($id);

        if (!$area) {
            return response()->json([
                'message' => 'Area not found'
            ], 404); // 404 Not Found
        }

        return response()->json([
            'message' => 'Area retrieved successfully',
            'area' => $area
        ], 200); // 200 OK status code
    }

    /**
     * Show the form for editing the specified resource.
     * (Not used in API context, can be removed if unused)
     */
    public function edit(string $id)
    {
        return response()->json([
            'message' => 'This endpoint is not supported in the API'
        ], 405); // 405 Method Not Allowed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the area by ID
        $area = Area::find($id);

        if (!$area) {
            return response()->json([
                'message' => 'Area not found'
            ], 404); // 404 Not Found
        }

        // Validate incoming request
        $validatedData = $request->validate([
            'region_id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        // Update the area's information
        $area->update($validatedData);

        return response()->json([
            'message' => 'Area updated successfully',
            'area' => $area
        ], 200); // 200 OK status code
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the area by ID
        $area = Area::find($id);

        if (!$area) {
            return response()->json([
                'message' => 'Area not found'
            ], 404); // 404 Not Found
        }

        // Delete the area
        $area->delete();

        return response()->json([
            'message' => 'Area deleted successfully'
        ], 200); // 200 OK status code
    }
}
