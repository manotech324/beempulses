<?php

namespace App\Http\Controllers\api\Dashboard\Region;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $region = Region::all();
        return response()->json([
            'message' => 'Regions retrieved successfully',
            'regions' => $region
        ], 200); // 200 OK status code
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.region.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);



        // Create the employee in the database
        $region = Region::create($validatedData);

        // Return a success response with the created employee details
        return response()->json([
            'message' => 'Region created successfully',
            'employee' => $region
        ], 201); // 201 Created status code
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the region by ID
        $region = Region::find($id);

        // Check if the region exists
        if (!$region) {
            return response()->json([
                'message' => 'Region not found',
            ], 404); // 404 Not Found status code
        }

        // Return the region data
        return response()->json([
            'message' => 'Region retrieved successfully',
            'region' => $region,
        ], 200); // 200 OK status code
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the region by its ID
        $region = Region::find($id);

        // Check if the region exists
        if (!$region) {
            return response()->json([
                'message' => 'Region not found'
            ], 404); // 404 Not Found status code
        }

        return response()->json([
            'message' => 'Region retrieved successfully for editing',
            'region' => $region
        ], 200); // 200 OK status code
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Fetch the region by its ID
        $region = Region::find($id);

        // Check if the region exists
        if (!$region) {
            return response()->json([
                'message' => 'Region not found'
            ], 404); // 404 Not Found status code
        }

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the region's information
        $region->update([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Region updated successfully',
            'region' => $region
        ], 200); // 200 OK status code
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fetch the region by its ID
        $region = Region::find($id);

        // Check if the region exists
        if (!$region) {
            return response()->json([
                'message' => 'Region not found'
            ], 404); // 404 Not Found status code
        }

        // Delete the region
        $region->delete();

        return response()->json([
            'message' => 'Region deleted successfully'
        ], 200); // 200 OK status code
    }
}
