<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance_bill;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
class MaintenanceController extends Controller
{
    //to display users maintenance record for current month
   public function displaymonthlybilltouser()
   {
    // $today = date("Y-m-d");     
    $data= Maintenance_bill::all();
    // ->where('entry_date',date("Y-m-d"))->simplepaginate(3);
    return view('maintenance/maintenance',['bills'=>$data])->with('no', 1);
   }

   
   
   function AddMaintenance(Request $request)
    {
        $username = $request->input('username');
        $All_Municipal_Dues = $request->input('All_Municipal_Dues');
        $Administrative_and_General_Expenses=$request->input('Administrative_and_General_Expenses');
        $sinking_fund=$request->input('sinking_fund');
        $Periodic_Building_Maintenance=$request->input('Periodic_Building_Maintenance');
        $Common_Area_Utilization_Parking=$request->input('Common_Area_Utilization_Parking');
        $Non_Occupancy_Charges=$request->input('Non_Occupancy_Charges');
        $Past_Arrears_of_Contribution=$request->input('Past_Arrears_of_Contribution');
        $Interest_Due=$request->input('Interest_Due');
        $Total_Due=$request->input('Total_Due');
        $bill_month=$request->input('bill_month');
        $bill_date=$request->input('bill_date');
        $due_date=$request->input('due_date');

        $data = array(
            'username' =>$username,
            'All_Municipal_Dues' => $All_Municipal_Dues,
            'Administrative_and_General_Expenses' => $Administrative_and_General_Expenses,
            'sinking_fund' => $sinking_fund,
            'Periodic_Building_Maintenance' => $Periodic_Building_Maintenance,
            'Common_Area_Utilization_Parking' => $Common_Area_Utilization_Parking,
            'Non_Occupancy_Charges' => $Non_Occupancy_Charges,
            'Past_Arrears_of_Contribution' => $Past_Arrears_of_Contribution,
            'Interest_Due' => $Interest_Due,
            'Total_Due' => $Total_Due,
            'bill_month' => $bill_month,
            'bill_date' => $bill_date,
            'due_date' => $due_date,
        );
            
        $count = DB::table('Maintenance_bills')->where('username', $username)
            ->where('bill_month',$bill_month)
            ->count();
        
    
        if($count >= 1){
            $request->session()->flash('status1','Bill Generated Already!');
        }

        else{
            DB::table('Maintenance_bills')->insert($data);
            $request->session()->flash('status','Bill Generated successfully');
        }

        return redirect('admin-maintenance');

    }   
        
        
        
        
        
        
        
        // $m= new Maintenance_bill;
        // $m->username=$req->username;
        // $m->All_Municipal_Dues=$req->All_Municipal_Dues;
        // $m->Administrative_and_General_Expenses=$req->Administrative_and_General_Expenses;
        // $m->sinking_fund=$req->sinking_fund;
        // $m->Periodic_Building_Maintenance=$req->Periodic_Building_Maintenance;
        // $m->Common_Area_Utilization_Parking=$req->Common_Area_Utilization_Parking;
        // $m->Non_Occupancy_Charges=$req->Non_Occupancy_Charges;
        
    	// $m->Past_Arrears_of_Contribution=$req->Past_Arrears_of_Contribution;
        // $m->Interest_Due=$req->Interest_Due;
        // $m->Total_Due=$req->Total_Due;
        // $m->bill_month=$req->bill_month;
        // $m->save();
        // $req->session()->flash('status','Meeting Scheduled Successfully');
    	// return redirect('admin-maintenance');
    


  
    public function displaybills()
    {
        
        
        
        $user_name=Auth::User()->name;
        $month = date("F Y");
         $data= DB::table('maintenance_bills')          
         ->where('username',$user_name)
         ->where('bill_month',$month)
         ->get(); 
         
         $data1= DB::table('users')
         ->where('name',$user_name)
         ->get(); 
         return view('maintenance/maintenance',['allbills'=>$data],['allbills1'=>$data1])->with('no', 1);
 
     }

     public function show_username()
     {
         
         $data= User::all();
         return view('admin/admin-maintenance',['users'=>$data]);
     }

}
