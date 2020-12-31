<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\note;
use App\Models\User;
use Auth;
// use App\Models\book;

class admcontroller extends Controller
{
    
    function showflatinfotoadmin()
    {
      $soc_id = Auth::user()->society_id;
      $data= User::where('society_id',$soc_id)->simplepaginate(3);
      return view('admin/flat_management', ['users'=>$data]);
    }


    function delete($id)
    {
      $data= User::find($id);
      $data->delete();
      return redirect('flat_management');
    }

    function showData($id)
    {
      $data= User::find($id);
      return view('admin/edit1', ['data'=>$data]);

    }

    function update(Request $req)
    {
    
      $data= User::find($req->id);
      $data->name=$req->name;
      $data->flat_no=$req->flat_no;
      $data->contact_no=$req->contact_no;
      $data->occupant=$req->occupant;
      $data->tenant_name=$req->tenant_name;
      $data->tenant_contact=$req->tenant_contact;
      $data->save();
      return redirect('flat_management');
    }

    function MemberReportOnAdmin()
    {
       $soc_id = Auth::user()->society_id;
      $data= User::all()
      ->where('society_id',$soc_id);
      return view('admin/member_reports', ['users'=>$data])->with('no',1);
    }

}