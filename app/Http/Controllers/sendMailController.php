<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str;
use Mail;

class sendMailController extends Controller
{
    public function getFormReset()
    {
        return view('auths.formResetPassword');
    }
    public function postFormReset(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|exists:users'
        ],
        [
            'email.required' => 'Bạn cần nhập email',
            'email.exists' => 'Email đã nhập không tồn tại trên hệ thống'
        ]);
        $email = $request->email;
        $check_email = User::where('email', $email)->first();
        if(!$check_email){
            return response([
                'status' => 500,
                'messages' => 'Error'
            ]);
        }
        $token = Str::random(30);
        $check_email->update([
            'token' => $token,
        ]);
        dd($token);
        $data = [
            'name' => $check_email->name,
            'email' => $check_email->email,
            'gender' => $check_email->gender,
        ];
        Mail::send('auths.email', $data, function($message) use($check_email){
            $message->subject('Xin chao' .$check_email->name);
            $message->to($check_email->email, $check_email->name);
        });
    }
}
