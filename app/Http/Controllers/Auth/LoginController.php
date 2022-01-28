<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username'=> ['required'],
            'password' => ['required'],
        ]);
        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) 
        {
            $request->session()->regenerate();
            $user=Auth::user();
            \Log::info($user->is_active);
            if ($user->is_active ==1) 
            {
                return redirect('/');
            }
            \Log::info('nope');
            // Auth::logout();
            // $request->session()->invalidate();
            // $request->session()->regenerateToken();
            return back()->withErrors([
                'is_active'=>'555',
            ]);
            
        }
        return back()->withErrors([
            'username' => 'กรุณาตรวจสอบชื่อและรหัสผ่านให้ถูกต้อง',
        ]);

        
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
