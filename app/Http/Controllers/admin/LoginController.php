<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin', 'active' => 'True'])) {

                return redirect('/admin');
            } else {

                return redirect('/admin/login')->with('message', 'Hatalı e-mail ya da şifre!');
            }
        }
    }



    public function logout()
    {
        $user = Auth::user()->name;
        Auth::logout();
        return redirect('/admin/login')->with('message', $user . ' oturumundan çıkış yapıldı!');
    }


    public function register()
    {
        return view('admin.register');
    }

    public function register_save(Request $request)
    {


        if ($request->hasFile('profile')) {

            $file = $request->file('profile');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/userimage/', $name);
        }




        DB::table('users')->insert([

            'name' => $request->get('name'),
            'password' => Hash::make($request->get('password')),
            'email' => $request->get('email'),
            'images' => $name,
            'remember_token' => Str::random(100)

        ]);

        return redirect('/admin/login')->with('success', $request->get('name') . ' kullanıcısı oluşturuldu!');
    }
}
