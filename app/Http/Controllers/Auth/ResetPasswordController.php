<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //เรียกหน้า reset password และส่ง reset token
    {
        return view('/Auth/passwords/newreset')->with([
            'token'=>'1',
        ]);
    }

    //ทำการ reset password
    public function execute(Request $request)
    {
       
        //$this->validate_reset($request);
        //return $request->all(); //troubleshooting
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
    private function validate_reset ($data)
    {
        $rules = [
            'email'=>'required|email',
            'password'=>'required|min:8|confirmed',
            'security_a'=>'required',
        ];

        $message = [
            'email.required'=>'1',
            'email.email'=>'2',
            'password.required'=>'3',
            'password.min'=>'4',
            'password.confirmed'=>'5',
            'security_a.required'=>'6'
        ];
        return $this->validate($data, $rules, $message);
    }
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
