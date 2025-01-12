<?php

namespace App\Http\Controllers\api\Dashboard\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\EmpCategory;

class EmpCategoryController extends Controller
{
    /**
     * Display a listing of the employee categories.
     */
    public function index()
    {
        $empCategories = EmpCategory::all();
        return response()->json([
            'message' => 'Employee categories retrieved successfully',
            'data' => $empCategories,
        ], 200);
    }

    /**
     * Show the form for creating a new employee category.
     * (For web-based interfaces; currently not used for APIs.)
     */
    public function create()
    {
        return view('dashboard.employee_categories.create');
    }

    /**
     * Store a newly created employee category in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'emp_cat_name' => 'required|string|max:255|unique:emp_categories,emp_cat_name',
            'exception' => 'required|integer|min:0',
        ]);

        $empCat = EmpCategory::create($validatedData);

        return response()->json([
            'message' => 'Employee category added successfully',
            'data' => $empCat,
        ], 201); // 201 Created
    }

    /**
     * Display the specified employee category.
     */
    public function show(string $id)
    {
        $empCategory = EmpCategory::find($id);

        if (!$empCategory) {
            return response()->json([
                'message' => 'Employee category not found',
            ], 404); // 404 Not Found
        }

        return response()->json([
            'message' => 'Employee category retrieved successfully',
            'data' => $empCategory,
        ], 200); // 200 OK
    }

    /**
     * Show the form for editing the specified employee category.
     * (For web-based interfaces; currently not used for APIs.)
     */
    public function edit(string $id)
    {
        $empCategory = EmpCategory::find($id);

        if (!$empCategory) {
            return redirect()->route('employee_categories.index')->with('error', 'Employee category not found.');
        }

        return view('dashboard.employee_categories.edit', compact('empCategory'));
    }

    /**
     * Update the specified employee category in storage.
     */
    public function update(Request $request, string $id)
    {
        $empCategory = EmpCategory::find($id);

        if (!$empCategory) {
            return response()->json([
                'message' => 'Employee category not found',
            ], 404); // 404 Not Found
        }

        $validatedData = $request->validate([
            'emp_cat_name' => 'required|string|max:255|unique:emp_categories,emp_cat_name,' . $empCategory->id,
            'exception' => 'required|integer|min:0',
        ]);

        $empCategory->update($validatedData);

        return response()->json([
            'message' => 'Employee category updated successfully',
            'data' => $empCategory,
        ], 200); // 200 OK
    }

    /**
     * Remove the specified employee category from storage.
     */
    public function destroy(string $id)
    {
        $empCategory = EmpCategory::find($id);

        if (!$empCategory) {
            return response()->json([
                'message' => 'Employee category not found',
            ], 404); // 404 Not Found
        }

        $empCategory->delete();

        return response()->json([
            'message' => 'Employee category deleted successfully',
        ], 200); // 200 OK
    }
}
