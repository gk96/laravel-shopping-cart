<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index()
    {
        $data = DB::select('select * from products');

        return view('menu', compact('data'));
    }
}
