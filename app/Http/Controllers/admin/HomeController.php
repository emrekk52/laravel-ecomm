<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {


        $user = DB::select('select * from users where id=? ', [Auth::user()->id]);
        
        $adres = DB::select('select * from  adres  where user_id=? ', [Auth::user()->id]);


        return view('admin.home',compact('user', 'adres'));
    }


    public function __construct()
    {
        $this->middleware('admin');
    }
}
