<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }



// public function register(Request $request)
// {
//     $request->validate([
//         'first_name' => 'required|string|max:255',
//         'last_name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'phone' => 'required|string|max:255',
//         'company' => 'required|string|max:255',
//         'country' => 'required|string|max:255',
//         'password' => 'required|string|min:8|confirmed',
//     ]);

  
//     $user = User::create([
//         'first_name' => $request->first_name,
//         'last_name' => $request->last_name,
//         'email' => $request->email,
//         'phone' => $request->phone,
//         'company' => $request->company,
//         'country' => $request->country,
//         'password' => Hash::make($request->password),
//     ]);

//     // Send welcome email
//     // Mail::to($user->email)->send(new WelcomeMail($user));

//     auth()->login($user);

//     return redirect('login')->with('success', 'Registration successful! Please check your email for account details.');
// }




public function register(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'  => 'required|string|max:255',
            'country'  => 'required|string|max:255',
            'company'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'country'  => $request->input('country'),
            'company'  => $request->input('company'),
            'phone'  => $request->input('phone'),
            'email'      => $request->input('email'),
            'password'   => bcrypt($request->input('password')),
        ]);

        Auth::login($user); // Optional: remove if you don’t want auto-login

        return response()->json([
            'message' => 'Registration successful!',
            'redirect' => route('login') // or use route('login') if you're not auto-logging in
        ], 200);

    } catch (\Throwable $e) {
    \Log::error('Registration error:', [
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => $e->getTraceAsString()
    ]);
    
    return response()->json([
        'error' => 'Registration failed. Please try again.',
        'details' => config('app.debug') ? $e->getMessage() : null
    ], 500);

    }
}
}

