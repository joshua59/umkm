<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
// use App\Mail\Office\WelcomeMail;
use Exception;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function index()
    {
        return view('auth.main');
    }
    public function do_login(Request $request)
    {
        Validator::extend('username', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        try {
            $this->validate($request, [
                'username' => 'required|username',
                'password' => 'required|min:8'
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, tolong lengkapi username dan password anda.',
            ]);
        }
        if(Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        {
            return response()->json([
                'alert' => 'success',
                'message' => 'Selamat datang '. Auth::guard('web')->user()->username,
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, username atau password anda salah, silahkan coba lagi.',
            ]);
        }
    }
    public function do_register(Request $request)
    {
        Validator::extend('username', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        // Validator::extend('phone_number', function($attribute, $value, $parameters)
        // {
        //     return substr($value, 0, 2) == '01';
        // });
        try {
            $this->validate($request, [
                'username' => 'required|string|max:20|username|unique:users',
                'phone' => 'required|string|max:14|unique:users',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8'
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, tolong lengkapi seluruh data yang tersedia dengan benar.',
            ]);
        }
        $request['password'] = Hash::make($request->password);
        User::create($request->all());
        // Mail::to($request->email)->send(new WelcomeMail($user));
            
        return response()->json([
            'alert' => 'success',
            'message' => $request->username . ' Akun anda telah berhasil didaftarkan',
        ]);
    }
    public function do_logout()
    {
        $employee = Auth::guard('web')->user();
        Auth::logout($employee);
        return redirect()->route('auth');
    }
}
