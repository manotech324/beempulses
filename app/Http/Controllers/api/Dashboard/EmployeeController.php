<?php

namespace App\Http\Controllers\api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('dashboard.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        return view('dashboard.employees.create');
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255|unique:employees',
            'password' => ['required', Password::defaults()],
            'employee_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'designation_id' => 'required|string|max:255',
            'cnic' => 'required|string|max:15',
            'postal_addr' => 'required|string|max:500',
            'contact_numb' => 'required|string|max:15',
            'department_id' => 'required|string|max:255',
            'user_category_id' => 'required|string|max:255',
            'region_id' => 'required|string|max:255',
            'city_id' => 'required|string|max:255',
            'employee_status' => 'required|string|max:50',
            'group' => 'required|string|max:255',
            'vehicle_id' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'week_of_days' => 'required|array',
            'week_of_days.*' => 'string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        // Hash the password before saving
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Convert `week_of_days` array into a JSON string for database storage
        $validatedData['week_of_days'] = json_encode($validatedData['week_of_days']);

        // Create the employee in the database
        $employee = Employee::create($validatedData);

        // Return a success response with the created employee details
        return response()->json([
            'message' => 'Employee created successfully',
            'employee' => $employee
        ], 201); // 201 Created status code
    }

    /**
     * Display the specified employee.
     */
    public function show(Employee $employee)
    {
        return view('dashboard.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit', compact('employee'));
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255|unique:employees,user_name,' . $employee->id,
            'employee_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'designation_id' => 'required|string|max:255',
            'cnic' => 'required|string|max:15',
            'postal_addr' => 'required|string|max:500',
            'contact_numb' => 'required|string|max:15',
            'department_id' => 'required|string|max:255',
            'user_category_id' => 'required|string|max:255',
            'region_id' => 'required|string|max:255',
            'city_id' => 'required|string|max:255',
            'employee_status' => 'required|string|max:50',
            'group' => 'required|string|max:255',
            'vehicle_id' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'week_of_days' => 'required|array',
            'week_of_days.*' => 'string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        // Convert `week_of_days` array into a JSON string for database storage
        $validatedData['week_of_days'] = json_encode($validatedData['week_of_days']);

        // Update the employee
        $employee->update($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
