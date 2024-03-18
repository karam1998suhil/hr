<?php

namespace App\Http\Controllers;

use App\Models\ApprovalProcess;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function submitForApproval(Request $request)
    {
        if (auth()->check()) {
            $approval = new ApprovalProcess();
            $approval->driver_id = 1; 
            $approval->submitted_by = auth()->user()->id; 
            $approval->save();       
         } else {
            // Handle the case where the user is not authenticated
            // For example, redirect the user to the login page
            return redirect()->route('login')->with('error', 'Please log in to submit for approval.');
        }
       
        
        // Redirect or return a response as needed
    }
}
