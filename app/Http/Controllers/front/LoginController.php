<?php

namespace App\Http\Controllers\front;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{



    public function index()
    {

        $turler = DB::select('select * from turler order by id');

        if (Auth::check())
            return redirect('/user/profile');
        else
            return view('front.login', compact('turler'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'user', 'active' => 'True'])) {

                return redirect('/user/profile');
            } else {

                return redirect('/user/login')->with('message', 'Hatalı e-mail ya da şifre!');
            }
        }
    }


    public function register_save(Request $request)
    {


        DB::table('users')->insert([

            'name' => $request->get('registername'),
            'password' => Hash::make($request->get('registerpassword')),
            'email' => $request->get('registeremail'),
            'remember_token' => Str::random(100)


        ]);

        return redirect('/user/login')->with('rmessage', $request->get('registername') . ' kullanıcısı oluşturuldu!');
    }


    public function logout()
    {
        $user = Auth::user()->name;
        Auth::logout();
        return redirect('/user/login')->with('message', $user . ' oturumundan çıkış yapıldı!');
    }
}
