<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;




class LoginController extends Controller
{
    //

    public function showLoginForm(){

    return view('auth.login');
    }

//    public function login(Request $request)
// {
//     try {
//         $validator = Validator::make($request->all(), [
//             'email'    => 'required|email',
//             'password' => 'required|string|min:6',
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Validation error.',
//                 'errors' => $validator->errors()
//             ], 422);
//         }

//         $credentials = $request->only('email', 'password');
//         $remember = $request->boolean('remember');

//         if (Auth::attempt($credentials, $remember)) {
//             $request->session()->regenerate();

//             return response()->json([
//                 'success' => true,
//                 'message' => 'Login successful!',
//                 'redirect' => route('user.home') // Adjust route as needed
//             ], 200);
//         }

//         return response()->json([
//             'success' => false,
//             'message' => 'Invalid credentials.',
//             'errors' => [
//                 'email' => [trans('auth.failed')]
//             ]
//         ], 422);

//     } catch (\Throwable $e) {
//         \Log::error('Login error: ' . $e->getMessage());

//         return response()->json([
//             'success' => false,
//             'message' => 'An error occurred during login. Please try again.',
//             'error' => config('app.debug') ? $e->getMessage() : null
//         ], 500);
//     }
// }




public function login(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error.',
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Check if user exists and is verified
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials.',
                'errors' => [
                    'email' => [trans('auth.failed')]
                ]
            ], 422);
        }

        if ($user->is_verified != 1) {
            return response()->json([
                'success' => false,
                'message' => 'Your account is not verified. Please check your email for the verification code.',
                'errors' => [
                    'email' => ['Your account is not verified.']
                ]
            ], 403); // 403 = Forbidden
        }

        // Attempt login
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'redirect' => route('user.home') // Adjust route as needed
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials.',
            'errors' => [
                'email' => [trans('auth.failed')]
            ]
        ], 422);

    } catch (\Throwable $e) {
        \Log::error('Login error: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'An error occurred during login. Please try again.',
            'error' => config('app.debug') ? $e->getMessage() : null
        ], 500);
    }
}



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
