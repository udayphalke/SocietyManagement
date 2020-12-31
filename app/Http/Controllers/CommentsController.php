<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\comment;

use App\Models\reply;

use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
     public function store(Request $request)
    {
        if (Auth::check()) {
            Comment::create([
                'name' => Auth::user()->name,
                'comment' => $request->input('comment'),
                'date1'=> $request->input('date1'),
                'user_id' => Auth::user()->id
            ]);

            // return redirect()->route('\forum')->with('success','Comment Added successfully..!');
            return redirect('forum');
        }else{
            return back()->withInput()->with('error','Something wrong');
        }
	}



	public function destroy(Comment $comment)
    {
        if (Auth::check()) {

            $reply = Reply::where(['comment_id'=>$comment->id]);
            $comment = Comment::where(['user_id'=>Auth::user()->id, 'id'=>$comment->id]);
            if ($reply->count() > 0 && $comment->count() > 0) {
                $reply->delete();
                $comment->delete();
                return 1;
            }else if($comment->count() > 0){
                $comment->delete();
                return 2;
            }else{
                return 3;
            }

        }    
    }

}