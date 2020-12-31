<?php

namespace App\Http\Controllers;
use App\Models\complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ComplaintController extends Controller
{
    function addData(Request $req)
    {
    	$complaint= new complaint;
        $complaint->user_id=Auth::user()->id;
        $complaint->complaint_type=$req->complaint_type;
        $complaint->description=$req->description;
    	$complaint->complaint_date=$req->complaint_date;
    	$complaint->save();
    	return redirect('complaints');
    }

      
   
    public function displayonadmin()
    {
               
        $data= complaint::all()
        ->where('status','Pending')
        ->whereIn('complaint_type',["High Maintainance Charges","Safety Neglation","Staff Issues","Corrupt Committee Members"]);

        // ->where('Exit_time',  '2020-11-25');
        return view('admin/usercomplaints1',['complaints'=>$data]);
    }
    public function displayonsecretary()
    {
               
        $data= complaint::all()
        ->where('status','Pending')
        ->whereIn('complaint_type',["Staff Issues","Incomplete/Fraudulent Audits","Water Issues","Nuisances caused By Residents","Electricity Issues","Others"]);

        // ->where('Exit_time',  '2020-11-25');
        return view('secretary/usercomplaints2',['complaints'=>$data]);
    }
    public function displayontreasurer()
    {
        $data= complaint::all()
        ->where('status','Pending')
        ->whereIn('complaint_type',["Non-Occupancy Charges","Maintainance Due Issues"]);
        return view('treasurer/usercomplaints',['complaints'=>$data]);
    }


    public function showData1($id)
    {
       $data=complaint::find($id);
     return view('admin/solve1',['complaint'=>$data]);
    
   // return complaint::find($id);
    }

    public function showData2($id)
    {
       $data=complaint::find($id);
     return view('secretary/solve2',['complaint'=>$data]);
    
   // return complaint::find($id);
    }
    public function showData3($id)
    {
       $data=complaint::find($id);
     return view('treasurer/solve',['complaint'=>$data]);
    
   // return complaint::find($id);
    }

    function update(Request $req)
    {
        //$complaint= new complaint;
        $complaint=complaint::find($req->id);
        $complaint->user_id=$req->user_id;
        $complaint->complaint_type=$req->complaint_type;
        $complaint->description=$req->description;
        $complaint->complaint_review=$req->complaint_review;
        $complaint->complaint_date=$req->complaint_date;
        $complaint->status=$req->status;
         $complaint->resolved_date=$req->resolved_date;
        $complaint->save();
        return redirect('/usercomplaints1');
    }

    function update2(Request $req)
    {
        //$complaint= new complaint;
        $complaint=complaint::find($req->id);
        $complaint->user_id=$req->user_id;
        $complaint->complaint_type=$req->complaint_type;
        $complaint->description=$req->description;
        $complaint->complaint_review=$req->complaint_review;
        $complaint->complaint_date=$req->complaint_date;
        $complaint->status=$req->status;
         $complaint->resolved_date=$req->resolved_date;
        $complaint->save();
        return redirect('/usercomplaints2');
    }
    function update3(Request $req)
    {
        $complaint=complaint::find($req->id);
        $complaint->user_id=$req->user_id;
        $complaint->complaint_type=$req->complaint_type;
        $complaint->description=$req->description;
        $complaint->complaint_review=$req->complaint_review;
        $complaint->complaint_date=$req->complaint_date;
        $complaint->status=$req->status;
         $complaint->resolved_date=$req->resolved_date;
        $complaint->save();
        return redirect('/usercomplaints');
    }



     public function displayonuser()
    {
               
        $user_id = Auth::user()->id;
        $data= complaint::all()
        ->where('user_id', $user_id);
        return view('complaints/complaints',['complaints'=>$data])->with('no', 1);
    }

    public function userdetails($id)
    {
   
        $data=user::find($id);
        return view('admin/view1',['user'=>$data]);
   
    }

    public function userdetails1($id)
    {
   
        $data=user::find($id);
        return view('secretary/view2',['user'=>$data]);
   
    }
    public function userdetails2($id)
    {
   
        $data=user::find($id);
        return view('treasurer/view',['user'=>$data]);
   
    }

    public function Complaint_Report()
    {
            
        $data= complaint::all();
        $Resolved= complaint::all()
    ->where('status','Resolved')->count();
        $Pending= complaint::all()
     ->where('status','Pending')->count();

    return view('admin/complaints_report',compact('Resolved','Pending'), ['complaints'=>$data])->with('no',1);

    }
}
