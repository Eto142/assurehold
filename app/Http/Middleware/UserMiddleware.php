<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use App\Mail\VerifyAccountMail;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not logged in
        }

        $user = Auth::user();

        // If user is not verified
        if ($user->is_verified == 0) {
            // Generate new verification code
            $newCode = rand(100000, 999999);
            $user->verification_code = $newCode;
            $user->save();

            // Send verification email
            Mail::to($user->email)->send(new VerifyAccountMail($newCode));

            // Logout the user to prevent access
            Auth::logout();

            // Redirect to verification page with email prefilled
            return redirect()->route('verify.form', ['email' => $user->email])
                ->with('message', 'Your account is not verified. A new verification code has been sent to your email.');
        }

        return $next($request);
    }
}
