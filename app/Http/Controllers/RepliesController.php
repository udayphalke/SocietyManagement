<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Reply;



class RepliesController extends Controller
{
     public function store(Request $request)
    {
        if (Auth::check()) {
            Reply::create([
                'comment_id' => $request->input('comment_id'),
                'name' => $request->input('name'),
                'date1'=> $request->input('date1'),
                'reply' => $request->input('reply'),
                'user_id' => Auth::user()->id
            ]);

            // return redirect()->route('forum')->with('success','Reply added');
            return redirect('forum');
        }

        return back()->withInput()->with('error','Something wronmg');
        
    }



     public function destroy(Reply $reply)
    {
        if (Auth::check()) {
            $reply = Reply::where(['id'=>$reply->id,'user_id'=>Auth::user()->id]);
            if ($reply->delete()) {
                return 1;
            }else{
                return 2;
            }
        }else{

        }
        return 3;
    }


}