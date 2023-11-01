<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'phone_number';
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
    */
    protected function credentials(Request $request)
    {
        $username = $request->input($this->username());
        if ($this->username() == 'phone_number') {
            $user = User::where('phone_number', $request->phone_number)->first();
            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return back()->withErrors([
                    'error' => 'The provided credentials do not match our records.',
                ]);
            } elseif ($user->system_status != User::USER_SYS_STATUS_ACTIVE) {
                return redirect()->back()->withErrors([
                    'error' => 'User is not activated, address the system manager to solve the issue.',
                ]);
            }

            return [$this->username() => $username, 'password' => $request->input('password')];
        }
    }
}
