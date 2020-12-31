<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    
    //to get records to display
    public function list()
    {
        $data = Http::get('https://jsonplaceholder.typicode.com/users')->json();
        return view('test', ['data'=>$data]);
    }
}
