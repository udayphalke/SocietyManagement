<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\meeting;
use Session;
use DB;
use Auth;
class NoticeController extends Controller
{
    //
    function show()
    {
      $data= notice::all();
      return view('notice_list', ['notice'=>$data]);
    }

    function addNotice(Request $req)
    {
      $society_id=Auth::User()->society_id;
      $username=Auth::User()->name;
      $n= new Notice;
      $n->society_id= $society_id;
      $n->username= $username;
     // $n->society_id=$req->society_id; 
      $n->notice_type=$req->notice_type;
      $n->description=$req->description;
    	$n->notice_date=$req->notice_date;
    	$n->expiry_date=$req->expiry_date;
      $n->save();
      $req->session()->flash('status','Notice Created Successfully');
    	return redirect('secretary-notice');
    }

    function addNotice1(Request $req)
    {
      $society_id=Auth::User()->society_id;
      $username=Auth::User()->name;
    	$n= new Notice;
      $n->society_id=$society_id; 
      $n->username= $username;
      $n->notice_type=$req->notice_type;
      $n->description=$req->description;
    	$n->notice_date=$req->notice_date;
    	$n->expiry_date=$req->expiry_date;
      $n->save();
      $req->session()->flash('status','Notice Created Successfully');
    	return redirect('treasurer-notice');
    }

    public function displaytosecretarynotice()
    {
        $today = date("Y-m-d");      
        $data= notice::all()
        // $data = DB::table('notices')->paginate(5);


        
        ->where('expiry_date','>=' , $today);
        return view('secretary/secretary-notice',['notice'=>$data]);
    }

    public function displaytotreasurernotice()
    {
        $today = date("Y-m-d");      
        $data= notice::all()
        // $data = DB::table('notices')->paginate(5);


        
        ->where('expiry_date','>=' , $today);
        return view('treasurer/treasurer-notice',['notice1'=>$data]);
    }

    public function displayallnoticestoadmin()
    {
        $data= notice::simplepaginate(4);
        // $data = DB::table('notices')->paginate(5);
        return view('admin/allnotices_admin',['notice'=>$data])->with('no', 1);
    }

    public function displayallmeetingstoadmin()
    {
        $data= meeting::simplepaginate(2);
        // $data = DB::table('notices')->paginate(2);
        return view('admin/allmeetings_admin',['meeting'=>$data])->with('no', 1);
    }

    public function displayallnoticestomember()
    {
        $data= notice::simplepaginate(4);
        // $data = DB::table('notices')->paginate(5);
        return view('allnotices_member',['notice'=>$data])->with('no', 1);
    }

    public function displayallmeetingstomember()
    {
        $data= meeting::simplepaginate(2);
        // $data = DB::table('notices')->paginate(2);
        return view('allmeetings_member',['meeting'=>$data])->with('no', 1);
    }


    
    function ScheduleMeeting(Request $req)
    {
    	$m= new meeting;
       // $notice->user_id=Auth::user()->id;
      $m->agenda=$req->agenda;
      $m->description=$req->description;
    	$m->date=$req->date;
    	$m->time=$req->time;
      $m->save();
      $req->session()->flash('status','Meeting Scheduled Successfully');
    	return redirect('schedule-meeting');
    }

    public function displaymeetingstosecretary()
    {
    	$schedule=meeting::all();
      
        return view('secretary/schedule-meeting',['schedulemeeting'=>$schedule]);
    }

   


    //  function addData(Request $req)
    // {
    //   $notice= new notice;
    //   $notice->id=$req->id;
    //   $notice->name=$req->name;
    //   $notice->date=$req->date;
    //   $notice->notice_type=$req->notice_type;
    //   $notice->recipient_name=$req->recipient_name;
    //   $notice->description=$req->description;
    //   $notice->save();
    //   return redirect('notice');
    // }

    public function displaymeetingstosecretary1()
    {
        $schedule=meeting::all()
        ->where('minutes_of_meeting','empty');
       
      
        return view('secretary/minutesofmeeting',['schedulemeeting'=>$schedule]);
    }

    function edit2($id)
    {
      $data= meeting::find($id);
      return view('secretary/editMeetings', ['data'=>$data]);

    }

    function ScheduleMeeting2(Request $req)
    {
        $m= meeting::find($req->id);
       // $notice->user_id=Auth::user()->id;
      $m->agenda=$req->agenda;
      $m->description=$req->description;
        $m->date=$req->date;
        $m->time=$req->time;
        $m->minutes_of_meeting=$req->minutes_of_meeting;
        $m->points_discussed=$req->points_discussed;

      $m->save();
      // $req->session()->flash('status','Meeting Scheduled Successfully');
        return redirect('minutesofmeeting');
    }
    //report on secretary
    
    public function displaymeetingstosecretary2()
    {
        $schedule=meeting::all();
      
        return view('secretary/secretary_report',['schedulemeeting'=>$schedule]);
    }

}
