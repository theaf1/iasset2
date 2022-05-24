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
    public function login(Request $request) //ดำเนินการ login
    {
        //ตรวจสอบว่า มี username และ password ใน request หรือไม่
        $credentials = $request->validate([
            'username'=> ['required'],
            'password' => ['required'],
        ]);
        $remember = $request->remember; //รับค่า remember login จาก request

        //ตรวจสอบว่า user password ตรงกับที่ลงทะเบียนไว้หรือไม่
        if (Auth::attempt($credentials, $remember)) 
        {
            $request->session()->regenerate(); //สร้าง session ให้ user
            $user=Auth::user();
            \Log::info($user->is_active);
            //ตรวจสอบว่า user มีสิทธ์ใช้งานระบบหรือไม่
            if ($user->is_active ==1) 
            {
                \Log::info('ok');
                return redirect('/'); //ส่ง user ไปหน้าหลัก    
            }
            \Log::info('nope');
            Auth::logout(); //นำ user ที่ไม่มีสิทธิออกจากระบบ
            $request->session()->invalidate(); //ล้ม session ของ user ที่ไม่มีสิทธิ
            $request->session()->regenerateToken(); //ล้ม token ของ user ที่ไม่มีสิทธิ
            return redirect('/denied');
            
            
        }

        //แจ้งให้ตรวจสอบ username password
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
