<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;


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
        // $tweet= Tweet::where('user_id',$this->id)->latest()->get();
        return view('home',[
            'tweets'=> auth()->user()->timeline()
        ]);
    }
}
