@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .navbar-default{
    background-color:#0F1442;
    border-color: white;
  }
    </style>
</head>
<body>
    

@section('content')

<!-- navbar -->
<div>
  <nav class="navbar fixed-top navbar-default navbar-expand-lg navbar-dark ">
  <a class="navbar-brand" href="">Society</a>
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="flat_management"><b>Manage Flats</b></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/accounts">Accounts</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/admin-maintenance">Maintenance & Utility Bills</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/amenities">Amenities</a>
      </li>
     
      <li class="nav-item active">
        <a class="nav-link" href="">Parking</a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="/notice">Notice</a>
      </li> -->

      <li class="nav-item active">
        <a class="nav-link" href="/usercomplaints1">Complaints</a>
      </li>

      <li class="nav-item active">
      <a class="nav-link" href="/files/create">Upload Documents</a>
      </li>
      
        
     
     
      </ul>
    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__(Auth::user()->name)}} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
  </div>
  </nav>
<!-- navbar -->


<br>
<div class="card">
  <div class="card-header">
  <img src="/images/softcare.png" alt="">
  </div>
   
  <div class="card-body card-color">
    

  <div class="row">
  <div class="col-sm-12">
    <div class="card" style="height:26rem;">
      <div class="card-body shadow p-3  rounded">
        <!-- <h5 class="card-title"><b>Update Member Records</b></h5> -->
        
        <div class="card-header" style="text-align: center; background-color:#0F1442; color: white"><h5>Update Members Record</h5></div>
        <div class="container">
<form action="/edit1" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{$data['id']}}"><br>
  <div class="form-row">
    <div class="col">
      <label><small>User Name</small> </label>
      <input type="text" class="form-control"  name="name" value="{{$data['name']}}" readonly="">
    </div>
    <div class="col">
      <label><small>Flat Number</small> </label>
      <input type="text" class="form-control"  name="flat_no" value="{{$data['flat_no']}}" readonly="">
    </div>
  </div>
<br>
<div class="form-row">
    <div class="col">
      <label><small>Contact No (Owner)</small> </label>
      <input type="text" class="form-control" name="contact_no" value="{{$data['contact_no']}}">
    </div>
    <div class="col">
      <label><small>Occupant(Owner/Tenant)</small> </label>
      <input type="text" class="form-control" name="occupant" value="{{$data['occupant']}}">
      
    </div>
  </div>
  <br>
  <div class="form-row">
     <div class="col">
      <label><small>Tenant Name</small> </label>
      <input type="text" class="form-control" name="tenant_name" value="{{$data['tenant_name']}}">
    </div>

    <div class="col">
      <label><small>Contact No (Tenant)</small> </label>
      <input type="text" class="form-control" name="tenant_contact" value="{{$data['tenant_contact']}}">
    </div>
   
  </div>
  <br>
  <button type="submit" class="btn btn-success">Update</button>

</form>

</div>
        
        </div>
    </div>
  </div>
  
</div>
  
 
  
  </div>
</div>








<div class="card">
<!-- <div class="container shadow p-3 mb-5 bg-white rounded" > -->
  
@endsection

</body>
</html>