<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function index()
    {
        return view('Auth.users');
    }
    public function register(Request $request)
    {
        try {
            if (!auth()->check()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6',
                'role_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => $request->input('role_id'),

            ]);

            $token = auth()->attempt($request->only('email', 'password'));

            return response()->json([
                'message' => 'User successfully created',
                'user' => $user,
                'token' => $this->respondWithToken($token),
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating user: ' . $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
    
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
    
            // Redirect to the dashboard route upon successful authentication
            return redirect()->route('dashboard');
          
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error logging in: ' . $e->getMessage()], 500);
        }
    }
    
    

    public function refresh()
    {
        try {
            if (!auth()->check()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken(auth()->refresh());
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'Token has expired'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error refreshing token: ' . $e->getMessage()], 500);
        }
    }

    public function logout()
    {
        try {
            // Check if the user is authenticated
            if (Auth::check()) {
                $user = Auth::user();

                // Revoke the current user's access token if available
                if ($user->currentAccessToken()) {
                    $user->currentAccessToken()->delete();
                }

                // Logout the user
                auth()->logout();

                return response()->json(['message' => 'Successfully logged out']);
            }

            // If the user is not authenticated, still respond with a success message
            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error logging out: ' . $e->getMessage()], 500);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user(),
            'status' => auth()->check(),
        ]);
    }
}
