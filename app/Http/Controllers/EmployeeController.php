<?php

namespace App\Http\Controllers;

use App\Models\DriverDetail;
use App\Models\Employee;
use App\Models\ViewEmployee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Retrieve all employees from the database
        $employees = ViewEmployee::all();
        
        // Pass the employees data to the view
        return view('Employees.employee', ['employees' => $employees]);
    }
    public function create($id = null)
    {
        // Check if $id is not null and contains a number
        if (!is_null($id) && is_numeric($id)) {
            // Fetch the employee data with the given ID
            $employee = Employee::find($id);
            if ($employee) {
                // If employee exists, return the edit view with the employee data
                return view('Employees.add_employee', compact('employee'));
            } else {
                // If employee does not exist, redirect to the add employee form
                return redirect()->route('add_employee')->with('error', 'Employee not found.');
            }
        } else {
            // If $id is null or not numeric, treat it as a new employee and return the add employee form
            return view('Employees.add_employee');
        }
    }
    public function store(Request $request)
    {
            // Validate form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                // Add validation rules for other fields
            ]);
    
            // Create a new employee using Eloquent's create method
            $employee = Employee::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'position' => $request->position,
                'department' => $request->department,
                // Add other fields here
            ]);
    
            return redirect()->route('employee')->with('success', 'Employee added successfully!');
        }
        public function show($id)
        {
            $employee = Employee::findOrFail($id);
            return view('Employees.show', ['employee' => $employee]);
        }
        public function storeDrivingLicense(Request $request)
        {
            // Validate the uploaded file
            $request->validate([
                'driving_license' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
            ]);
            
            // Store the uploaded image in the storage directory
            $imagePath = $request->file('driving_license')->store('public/images');
            
            // Find the DriverDetail record by employee_id
            $employeeId = auth()->id(); // Assuming you are storing the user's employee ID with an authenticated user
            $employee = DriverDetail::where('employee_id', $employeeId)->first();
        
            if ($employee) {
                // Update the employee's driving_license_number field with the image path
                $employee->driving_license_number = $imagePath;
                $employee->save();
        
                // Redirect back with a success message or any other action
                return redirect()->back()->with('success', 'Driving License uploaded successfully.');
            } else {
                // Handle the case where the DriverDetail record is not found for the authenticated user
                return redirect()->back()->with('error', 'Employee record not found.');
            }
        }
        public function edit($id)
        {
            // Find the employee by ID
            $employee = Employee::findOrFail($id);
    
            // Return the view for editing with the employee data
            return view('employees.edit', compact('employee'));
        }
    
        public function update(Request $request, $id)
        {
            // Validate form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                // Add validation rules for other fields
            ]);
    
            // Find the employee by ID
            $employee = Employee::findOrFail($id);
    
            // Update the employee data
            $employee->update($validatedData);
    
            // Redirect back to the employee list with a success message
            return redirect()->route('employee')->with('success', 'Employee updated successfully!');
        }
    
        public function destroy($id)
        {
            // Find the employee by ID and delete it
            Employee::findOrFail($id)->delete();
    
            // Redirect back to the employee list with a success message
            return redirect()->route('employee')->with('success', 'Employee deleted successfully!');
        }
    }

        

