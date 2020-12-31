<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;
use App\Models\notice;
use App\Models\User;
use App\Models\meeting;
use App\Models\Society;
use Session;
use Auth;

class VisitorsController extends Controller
{
    // public function visitors()
    // {
    //     return view('/visitors.visitors');
    
    // }
    public function AddVisitors(Request $request)
    {
        $society_id=Auth::User()->society_id;
        $visitor = new Visitor;
        $visitor->society_id= $society_id;
        $visitor->name= $request->name;
        $visitor->contact_no= $request->contact_no;
        $visitor->address= $request->address;
        $visitor->visit_from=$request->visit_from;
        $visitor->visit_to=$request->visit_to;
        $visitor->temperature=$request->temperature;
        $visitor->vehicle_no=$request->vehicle_no;
        $visitor->entry_date=$request->entry_date;
        $visitor->entry_time=$request->entry_time;
        $visitor->save();
        $request->session()->flash('status','entry Submitted successfully');
        return redirect('/visitors_entryform');
        
    }

//To update vistior table  for exit record
    public function showData($id)
    {
      $data=Visitor::find($id);
    return view('edit',['visitor'=>$data]);
   
    }
//To update vistior table  for exit record
    public function Update(Request $request)
    {
        $visitor=Visitor::find($request->id);
                    
            
        $visitor->name= $request->name;
        $visitor->contact_no= $request->contact_no;
        $visitor->address= $request->address;
        $visitor->visit_from=$request->visit_from;
        $visitor->visit_to=$request->visit_to;
        $visitor->temperature=$request->temperature;
        $visitor->vehicle_no=$request->vehicle_no;
        $visitor->entry_date=$request->entry_date;
        $visitor->entry_time=$request->entry_time;
        $visitor->exit_date=$request->exit_date;
        $visitor->exit_time=$request->exit_time;
        $visitor->save();
        $request->session()->flash('status','Entry Submitted successfully');
        return redirect('/visitors_record');
    } 

    // show visitors on visitors_record 
    public function ShowVisitors()
    {
            $society_id=Auth::User()->society_id;
            $data = Visitor::all()
            ->where('exit_time', null)
            ->where('society_id',$society_id);
            return view('visitors/visitors_record',['visitors'=>$data]);
            
        }


        
  

    //show visitors record through api
    public function VisitorsData()
    {
        return Visitor::all();
        
    }

    //show flat n user name on visitors entry form
    public function show_flatusername()
   {
       
       $data= User::all();
       return view('visitors/visitors_entryform',['users'=>$data]);
   }



   //to display todays visitors on
   public function displayonhome()
   {
    // $today = date("Y-m-d"); 
    $society_id=Auth::User()->society_id;    
    $data= visitor::where('entry_date',date("Y-m-d"))->where('society_id',$society_id)->simplepaginate(3);
    
       
    $a = notice::max('id'); 
    $data1= notice::all()
    ->where('id','=',$a)
    ->where('society_id',$society_id);

    $b = meeting::max('id'); 
    $data2= meeting::all()
    ->where('id','=',$b)
    ->where('society_id',$society_id);

    $societyid= Auth::User()->society_id;
    $data3= Society::all()
    ->where('society_id', $societyid);
      
    
    return view('home',[ 'visitors'=>$data,'notice'=>$data1, 'meeting'=>$data2,'society'=>$data3])->with('no', 1);
   }

   public function displaysocietynametowatchman()
   {
        $societyid= Auth::User()->society_id;
        $data3= Society::all()
        ->where('society_id', $societyid);

        return view('watchman',['society'=>$data3])->with('no', 1);
   }

   
   public function displayonadmin()
   {
    $data= visitor::where('entry_date',date("Y-m-d"))->simplepaginate(3);
    
    $a1 = notice::max('id'); 
    $data1= notice::all()
    ->where('id','=',$a1);

    $b1 = meeting::max('id'); 
    $data2= meeting::all()
    ->where('id','=',$b1);

    $societyid= Auth::User()->society_id;
    $data4= Society::all()
    ->where('society_id', $societyid);

    return view('admin/admin',['visitors'=>$data,'notice'=>$data1, 'meeting'=>$data2,'society1'=>$data4])->with('no', 1);
   
    }

    public function ShowVisitors2()
    {
            $data = Visitor::all();
            return view('admin/visitor_reports',['visitors'=>$data])->with('no',1);
            
        }

}
