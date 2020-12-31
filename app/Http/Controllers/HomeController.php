<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;
use Auth;
use App\Models\comment;
use App\Models\reply;


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
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

    }

    public function index1()
    {
        $data = comment::latest('created_at')->get();
        return view('/forum', ['comments' => $data]);
    }

    
}
