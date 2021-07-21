<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }
    
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function validateEmailAddress(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users']
        ]);

        return response()->json([
            'message' => true
        ], 200);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function attemptToAuthenticateMobile(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('is_active', true)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return LogoutResponse
     */
    public function attemptToLogout(Request $request): LogoutResponse
    {
        $user_agent = $request->user()->sessions()->where('id', session()->getId())->first()->pluck('user_agent')[0];

        $request->user()->tokens()->where('name', $user_agent)->delete();

        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}
