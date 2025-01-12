<?php

namespace App\Http\Controllers\api\Dashboard\Area;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area\AreaGroup;

class AreaGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areaGroups = AreaGroup::all();
        return response()->json([
            'message' => 'Area Groups retrieved successfully',
            'data' => $areaGroups
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'region_id' => 'required|integer',
            'area_id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        $areaGroup = AreaGroup::create($validatedData);

        return response()->json([
            'message' => 'Area Group created successfully',
            'data' => $areaGroup
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $areaGroup = AreaGroup::find($id);

        if (!$areaGroup) {
            return response()->json([
                'message' => 'Area Group not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Area Group retrieved successfully',
            'data' => $areaGroup
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'region_id' => 'sometimes|required|integer',
            'area_id' => 'sometimes|required|integer',
            'name' => 'sometimes|required|string|max:255',
        ]);

        $areaGroup = AreaGroup::find($id);

        if (!$areaGroup) {
            return response()->json([
                'message' => 'Area Group not found'
            ], 404);
        }

        $areaGroup->update($validatedData);

        return response()->json([
            'message' => 'Area Group updated successfully',
            'data' => $areaGroup
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $areaGroup = AreaGroup::find($id);

        if (!$areaGroup) {
            return response()->json([
                'message' => 'Area Group not found'
            ], 404);
        }

        $areaGroup->delete();

        return response()->json([
            'message' => 'Area Group deleted successfully'
        ], 200);
    }
}
