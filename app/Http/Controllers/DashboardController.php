<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Retrieve the authenticated user
            $user = Auth::user();
            
            if (!$user) {
                // If user is not authenticated, redirect to login page
                return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
            }

            // Pass user data to the dashboard view
            return view('Auth.dashboard', ['user' => $user]);
        } catch (\Exception $e) {
            return back()->with('error', 'Error accessing dashboard: ' . $e->getMessage());
        }
    }
}
