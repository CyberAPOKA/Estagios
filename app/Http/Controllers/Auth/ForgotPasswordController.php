<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function forgetPassword()
    {
        return view('auth.passwords.forgot-password');
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users',
            ],
            [
                'email.required' => 'Insira seu email.',
                'email.exists' => 'Este email não está cadastrado.',
                'email.email' => 'Insira um email Válido.'
            ]
        );

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.passwords.email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
    
        return view('auth.passwords.message');
    }

    public function resetPassword($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function resetPasswordPost(ForgotPasswordRequest $request) 
    {
       
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('login')->with('passwordChanged', 'Senha alterada com sucesso!');
    }
}
