<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
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
    public function redirectTo() 
    {
      $role = Auth::user()->role; 
      switch ($role) {
        case 'admin':
          return '/index';
          break;
        case 'student':
          return '/dashboard';
          break; 
      }
        //   default:
        //     return '/home'; 
        //   break;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function hasTooManyLoginAttempts(Request $request)
	{
    return $this->limiter()->tooManyAttempts(
        $this->throttleKey($request), 99990, 0
    );
  }
}
