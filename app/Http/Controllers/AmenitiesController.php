<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\amenities_master;
use App\Models\amenity_booking;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class AmenitiesController extends Controller
{
    function RegisterAmenity(Request $req)
    {
        $this->validate($req, [
            'amenity_name'=>'required|max:50',
        ]);
        
        $amenity_name = $req->input('amenity_name');
        
        $data = array(
            'amenity_name' =>$amenity_name
        );
        
        $count = DB::table('amenities_masters')->where('amenity_name', $amenity_name)
        ->count();
        
        if($count >= 1){
            $req->session()->flash('status1','Already Registered !');
        }

        else{
            DB::table('amenities_masters')->insert($data);
            $req->session()->flash('status','Registered successfully');
        }
        return redirect('amenities');

        
        
        // $data= new amenities_master;
    	// $data->amenity_name=$req->amenity_name;
        // $data->save();
        // $req->session()->flash('status','Amenity Registered successfully');
    	// return redirect('/amenities');
    }


    //display registered amenities on admin-amenities page
    public function ShowAmenities()
    {
          $data = amenities_master::all();
          return view('admin/amenities',['amenities'=>$data])->with('no', 1);
    }


    public function ShowAmenitybookingstoAdmin()
    {
        $data = amenity_booking::simplepaginate(4);
        return view('admin/all_amenity_bookings',['amenities'=>$data]);
    }
   
      



    public function amenity_booking(Request $request)
    {   
       

        $user_id = $request->input('user_id');
        $amenity_name = $request->input('amenity_name');
        $booking_date = $request->input('booking_date');
        $booking_slot = $request->input('booking_slot');
        
        $data = array(
            'user_id' =>$user_id,
            'amenity_name' => $amenity_name,
            'booking_date' => $booking_date,
            'booking_slot' => $booking_slot,
        );

        $count = DB::table('amenity_bookings')->where('amenity_name', $amenity_name)
                                ->where('booking_date',$booking_date)
                                ->where('booking_slot',$booking_slot)
                                ->count();
        
          

        if($count >= 1){
            $request->session()->flash('status1','Booked it Already!');
        }
        
        
        else{
            DB::table('amenity_bookings')->insert($data);
            $request->session()->flash('status','Booked successfully');
        }

    
        return redirect('amenity_bookings');
    }


    //to display todays bookings on user-amenity_bookings
   public function displaycurrentbooking()
   {
        $data= amenity_booking::all();
    //    ->where('booking_date',date("Y-m-d"));
       return view('amenity_bookings',['xyz'=>$data]);
   }

    
    
    
    //display 
    public function display_booking_amenity()
    {
        $data= amenity_booking::all();
        
        return view('display_booking_amenity',['dd'=>$data]);
    }
//display bookings on user

    public function display_bookingson_user()
    {
        $data= amenity_booking::all()
        ->where('booking_date',date("Y-m-d"));
        $data1= amenities_master::all();

        return view('amenity_bookings',['booking'=>$data,'amenity'=>$data1]);
    }

    // public function amenity_list()
    // {
    //     $data= amenities_master::all();
   	//     return view('amenity_bookings',['amenity'=>$data]);
    // }
    
}
