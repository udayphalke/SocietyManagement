<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memberrecord;
// use App\Models\staff_attendance;
use Session;

class MemberController extends Controller
{
    	
		public function Member_Entry(Request $req)
		{
            $member=new Memberrecord;
            $member ->name=$req->input('name');
            $member ->vehicle_no=$req->input('vehicle_no');
            $member ->entry_date=$req->input('entry_date');
            $member ->entry_time=$req->input('entry_time');
                       
            $member->save();
            $req->session()->flash('status','Entry Submitted successfully');
            return redirect('/member_entryform');
		}

		public function showmemberentryrecord()
    {
        $member=Memberrecord::all()
        ->where('exit_time', null);
        return view('member/member_record',['records'=>$member]);
    }

    // //To update staff_attendances table  for exit record
    public function showData($id)
    {
      $data=Memberrecord::find($id);
    return view('member/member_exit',['member'=>$data]);
   
    }

    // //To update vistior table  for exit record
    public function Update(Request $request)
    {
        $member=Memberrecord::find($request->id);
                    
            
        $member->name= $request->name;
        $member->vehicle_no= $request->vehicle_no;
        $member->entry_date= $request->entry_date;
        $member->entry_time= $request->entry_time;
        $member->exit_date= $request->exit_date;
        $member->exit_time=$request->exit_time;
        
        $member->save();
        $request->session()->flash('status','Entry Submitted successfully');
        return redirect('/member_record');
    } 

    // show members on member_record 
    // public function Showmembers()
    // {
    //         $data = Memberrecord::all()
    //         ->where('exit_time', null);
    //         return view('member/member_record',['member'=>$data]);
    // }

}
