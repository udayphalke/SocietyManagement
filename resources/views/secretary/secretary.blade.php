

@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .navbar-default{
    background-color:#0f1442;
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="secretary"><b>Home </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/schedule-meeting">Schedule Meetings</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/secretary-notice">Notices</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/admin-maintenance">Audit Provisions</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/amenities">Insurance</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="/secretary_report">Reports</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="/Inventory">Member Objections</a>
      </li> -->
      
      <li class="nav-item active">
        <a class="nav-link" href="">Upload Documents</a>
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
    <h1>{{__(Auth::user()->society_id)}}</h1>
  
   </div>
  <div class="card-body card-color">
    

  <div class="row">
  <div class="col-sm-8">
    <div class="card" style="height:26rem;">
      <div class="card-body shadow p-3  rounded">
        <h5 class="card-title">Secretary</h5>
        



      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="height:24rem;">
      <div class="card-body shadow p-3  rounded">
        <h5 class="card-title">Notice</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
  
 
  
  </div>
</div>



@endsection

</body>
</html>
