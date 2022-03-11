<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
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

    // Route::post('/forgot-password', function (Request $request) {
    //     $request->validate(['email' => 'required|email']);
     
    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );
     
    //     return $status === Password::RESET_LINK_SENT
    //                 ? back()->with(['status' => __($status)])
    //                 : back()->withErrors(['email' => __($status)]);
    // })->middleware('guest')->name('password.email');
}
