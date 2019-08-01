<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if(Auth::user()->type=='member')
     {
       return view('welcome');
     }
     else
     {
       //return view('adminmiddleware');
       $data = DB::select('select * from products');

        return view('adminmiddleware', compact('data'));
     }
     }

    public function admin(Request $req)
    {
        //return view('middleware');
    }
    public function member(Request $req)
    {
        return view('middleware');
    }
}
