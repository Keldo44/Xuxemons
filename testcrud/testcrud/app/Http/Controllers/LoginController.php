<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Add this line
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function login(Request $request)
    {               
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }

            // Check if the provided password matches the hashed password in the database
            if (!Hash::check($request->password, $user->password)) {
                return response()->json(['error' => 'Contraseña incorrecta'], 401);
            }

            // Additional checks or actions can be performed here before updating user data

            // Uncomment the following line if you want to update user data
            $sessionToken = Str::random(60);
            $user->session_token = $sessionToken;
            $user->save();  

            return response()->json(['message' => 'Inicio de sesión exitoso','session_token' => $sessionToken], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user', // Assuming a default role for the user
                'email_verified_at' => now(), // Assuming the email is verified at the time of creation
                'remember_token' => Str::random(10), // Generate a random remember token
            ]);

            return response()->json(['message' => 'Usuario registrado correctamente'], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al registrar el usuario'.$e], 500);
        }
    }

    public function getRole(Request $request){
        

        $user = User::where('session_token', $request->token)->first();
        if ($user === null) {
            // User not found, return a specific response
            return response()->json(['error' => 'User not found'], 404);
        }
    
        return response()->json(['role' => $user->role], 200);
    }
}
